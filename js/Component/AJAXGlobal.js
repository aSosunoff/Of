/*version 1.0*/
; (function (win) {
    var callSuccess = function () { };
    var callError = function () { };
    var callComplete = function () { };

    var Option = {
        url: '/',
        type: 'POST',
        dataType: 'json',
        data: {},
        success: function (data) {

            if (data.success) {
                if (typeof callSuccess === 'function') {
                    callSuccess(data);
                } else {
                    console.error('Parameter "Success" is not a function');
                }
            }

            if (data.message) {
                if (data.message.Error) {
                    Message({
                        MessageText: data.message.Error || 'Неизвестная ошибка',
                        Delay: 4000
                    }).Error().consoleError(data.consoleMessage || 'Неизвестная ошибка');
                }
                if (data.message.Info) {
                    Message({
                        MessageText: data.message.Info || 'Информация'
                    }).Info();
                }
                if (data.message.Success) {
                    Message({
                        MessageText: data.message.Success || 'Успех'
                    }).Success();
                }
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {

            if (typeof callError === 'function') {
                callError();
            } else {
                console.error('Parameter "Error" is not a function');
            }

            var error = thrownError.length == 0 ? "Обрыв соединения" : thrownError + ". Обрыв соединения";
            Message({
                MessageText: error,
                Delay: 4000
            }).Error().consoleError(error);
        },
        complete: function (jqXHR, textStatus) {
            if (typeof callComplete === 'function') {
                callComplete();
            } else {
                console.error('Parameter "Complete" is not a function');
            }
        }
    };

    var ex = {};

    win.AJAXGlobal = function (option) {

        callSuccess = option.success || function () { };
        callError = option.error || function () { };
        callComplete = option.complete || function () { };

        $.ajax({
            url: option.url || Option.url,
            type: option.type || Option.type,
            dataType: option.dataType || Option.dataType,
            data: option.data || Option.data,
            success: Option.success,
            error: Option.error,
            complete: Option.complete
        });

        return ex;
    };

})(this);