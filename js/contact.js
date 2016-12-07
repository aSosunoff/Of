$(function(){
    $('#send-contact').click(function(){
        AJAXGlobal({
            url: '/Contact/',
            data: {
                name: $('#name').val(),
                email: $('#email').val(),
                phone: $('#projectInputPhone').inputmask('unmaskedvalue'),
                message: $('#message').val()
            },
            success: function(data){
                console.log(data);
            }
        });
    });
});