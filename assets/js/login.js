$(document).ready(function () {
    $('#spanEyeSlash').hide();
    $("#basic-addon2").click(function () { 
        var x = document.getElementById("password");
        if (x.type === "password"){
            x.type = "text";
            $('#spanEyeSlash').show();
            $('#spanEye').hide();
        } else {
            x.type = "password";
            $('#spanEye').show();
            $('#spanEyeSlash').hide();
        }
    });

    $('#loading').removeClass("show");
    $('#loading').addClass("hide");
    
    var $sections = $('.form-section');

    function navigateTo(index){
        $sections.removeClass('current').eq(index).addClass('current');
        var arTheEnd = index >= $sections.length -1;
        $('.form-navigation [type=submit]').toggle(arTheEnd);
    }

    function curIndex()
    {
        return $sections.index($sections.filter('.current'));
    }

    $sections.each(function(index, section){
        $(section).find(':input').attr('data-parsley-group', 'block-'+index);
    })

    navigateTo(0);

    $('.submit').click(function(e){
        e.preventDefault();
        $('.contact-form').parsley().whenValidate({
            group: 'block-' + curIndex()
        }).done(function(){
            if($('#password').val().length >0){
                
                /* var user = $('#usernameEmail').val();
                var pass = $('#password').val();
                $('#iframe_wordpress').contents().find('#user_login').attr('value', user);
                $('#iframe_wordpress').contents().find('#user_pass').attr('value', pass);
                $('#iframe_wordpress').contents().find('#wp-submit').trigger( "click" );
                setTimeout(
                    function() 
                    {
                      //do something special
                    }, 5000); */
                $("#login-form").submit();
                $('.submit').hide();
                $('#loading').removeClass("hide");
                $('#loading').addClass("show");
            } 
        });
    });
});