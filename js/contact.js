$(function(){
    $('#send-contact').click(function(){
        AJAXGlobal({
            url: '/contact.php',
            data: {
                name: $('#name').val(),
                email: $('#email').val(),
                phone: $('#phone').val(),
                message: $('#message').val()
            },
            success: function(data){
                console.log(data);
            }
        });
    });
});