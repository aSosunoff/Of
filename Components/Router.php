<?php
class Router
{
    // Массив в котором будут храниться маршруты
    private $_routes;

    public function __construct()
    {
        $this->_routes = include(ROOT.'/Config/routes.php');
    }

    // Возвращаем путь запроса страницы
    private function getURI(){
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    /*
     * $segmentsArray
     * [0] - viewFolder, controllerName
     * [1] - viewLayout, actionName
     * [2] - parametersArray
     * return - array
     * */
    private function _setArray($segmentsArray){

        $viewFolder = ucfirst(array_shift($segmentsArray));
        $controllerName = $viewFolder . "Controller";
        $viewLayout = ucfirst(array_shift($segmentsArray));
        $actionName = $viewLayout;
        $parametersArray = $segmentsArray;

        $array = [];
        $array['View'] = ([
            'folder' => $viewFolder,
            'layout' => $viewLayout,
            'path' => ROOT . '/View/' . $viewFolder . '/' . $viewLayout . '.php'
        ]);

        $array['Controller'] = ([
            'name' => $controllerName,
            'action' => $actionName,
            'path' => ROOT . "/Controller/" . $controllerName . ".php"
        ]);

        $array['Parameter'] = $parametersArray;
        return $array;
    }

    // Метод Run который будет принимать управление от FRONT CONTROLLER
    public function Run(){

        // Получить строку запроса
        $url = $this->getURI();

        // Проверить наличие такого запроса а routes.php
        foreach ($this->_routes as $urlPattern => $path){
            // Срвавниваем есть ли такой путь в наших роутах
            if(preg_match("~$urlPattern~", $url)){
                $internalRoute = preg_replace("~$urlPattern~", $path, $url);

                $array = $this->_setArray(explode('/', $internalRoute));

                // Подключить файл класса контроллера
                if (file_exists($array['Controller']['path'])) {
                    include_once($array['Controller']['path']);
                }

                // Создаём объект класса контроллера который подключили ранее и вызываем метод
                $controllerObject = new $array['Controller']['name'];

                $result = call_user_func_array(
                    array(
                        $controllerObject,
                        $array['Controller']['action']
                    ),
                    $array['Parameter']);!

                define('RENDER_BODY', $array['View']['path']);

                define("LAYOUT", ROOT . "/View/Layout/Layout.php");



                if ($result != null) {
                    break;
                }
            }else{
                define("LAYOUT", ROOT . "/View/Error/404.php");
            }

            if(file_exists(MASTER_PAGE)){
                include_once(MASTER_PAGE);
            } else { echo 'Ошибочка отображения'; }


        }
    }
}