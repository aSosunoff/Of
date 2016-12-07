$(function(){
    $('#send-contact').click(function(){
        $(".load-gif").addClass("load-gif-show");
        AJAXGlobal({
            url: '/Contact/',
            data: {
                name: $('#projectInputName').val(),
                email: $('#projectInputEmail').val(),
                phone: $('#projectInputPhone').inputmask('unmaskedvalue'),
                message: $('#projectInputMessage').val()
            },
            success: function(data){},
            complete: function(){
                $(".load-gif").removeClass("load-gif-show");
            }
        });
    });
});