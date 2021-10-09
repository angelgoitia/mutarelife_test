$(document).ready(function () {
    $('#spanEyeSlash').hide();
    $('#spanEyeSlash2').hide();
    $("#basic-addon1").click(function () { 
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

    $("#basic-addon2").click(function () { 
        var x = document.getElementById("passwordConfirm");
        if (x.type === "password"){
            x.type = "text";
            $('#spanEyeSlash2').show();
            $('#spanEye2').hide();
        } else {
            x.type = "password";
            $('#spanEye2').show();
            $('#spanEyeSlash2').hide();
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

    $("#password").keyup(function(){
        if($('#password').val().length > 0 && $('#password').val().length <8 )
            $('#errorPassword').text('Este valor es muy corto. La longitud mínima es de 8 caracteres.');
        else
            $('#errorPassword').text('');
    });


    $("#passwordConfirm").keyup(function(){
        if($('#passwordConfirm').val().length >0 && $('#password').val() != $('#passwordConfirm').val() )
            $('#errorPasswordConfirm').text('La contraseña no coinciden');
        else if($('#passwordConfirm').val().length > 0 && $('#passwordConfirm').val().length <8 )
            $('#errorPasswordConfirm').text('Este valor es muy corto. La longitud mínima es de 8 caracteres.');
        else
            $('#errorPasswordConfirm').text('');
    });

    $('.submit').click(function(e){
        e.preventDefault();
        if($('#password').val() == $('#passwordConfirm').val())
            $('.contact-form').parsley().whenValidate({
                group: 'block-' + curIndex()
            }).done(function(){

                $("#register-form").submit();
                $('.submit').hide();
                $('#loading').removeClass("hide");
                $('#loading').addClass("show");
            });
    });
});