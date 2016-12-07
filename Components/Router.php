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
    private function _getURI(){
        if(!empty($_SERVER['REQUEST_URI'])){
            $lineNameValue = "";

            if(count($_POST) > 0){
                foreach ($_POST as $name => $value){
                    $lineNameValue .= $name . "=" . $value . "&";
                }
                $lineNameValue = "/" . trim($lineNameValue, '&');
            }

            return trim($_SERVER['REQUEST_URI'], '/') . $lineNameValue;
        }
    }

    /*
     * $segmentsArray
     * [0] - viewFolder, controllerName
     * [1] - viewLayout, actionName
     * [2] - parametersArray
     * */
    private function _setArray($segmentsArray){

        $viewFolder = ucfirst(array_shift($segmentsArray));
        $controllerName = $viewFolder . "Controller";
        $viewLayout = ucfirst(array_shift($segmentsArray));
        $actionName = $viewLayout;

        if(count($segmentsArray) > 0){
            $segmentsArray = explode('&', $segmentsArray[0]);
        }

        $array = ([
            'View' => [
                'folder' => $viewFolder,
                'layout' => $viewLayout,
                'path' => ROOT . '/View/' . $viewFolder . '/' . $viewLayout . '.php'
            ],
            'Controller' => [
                'name' => $controllerName,
                'action' => $actionName,
                'path' => ROOT . "/Controller/" . $controllerName . ".php"
            ],
            'Parameter' => $segmentsArray
        ]);

        return $array;
    }

    private function _goMasterLayout(){
        if(file_exists(MASTER_PAGE)){
            include_once(MASTER_PAGE);
        } else { echo 'Ошибочка отображения'; }
    }

    // Метод Run который будет принимать управление от FRONT CONTROLLER
    public function Run(){
        // Получить строку запроса
        $url = $this->_getURI();

        // Проверить наличие такого запроса а routes.php
        foreach ($this->_routes as $urlPattern => $path){
            $result = null;
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

                // Инициализируем класс с его методом и получаем результат
                $result = call_user_func_array(
                    array(
                        $controllerObject,
                        $array['Controller']['action']
                    ),
                    $array['Parameter']);


                if ($result != null) {

                    if($result['result'] != ResultViewEnum::JSON_RESULT){
                        define('RENDER_BODY', $array['View']['path']);
                        $this->_goMasterLayout();
                    }else{
                        echo $result['data'];
                    }
                    break;
                }
            }
        }
    }
}