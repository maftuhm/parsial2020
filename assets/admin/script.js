(function ($) {

    /*==================================================================
    [ Focus Contact2 ]*/
    $('input').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })
    // if ($(input).next('.help-block').children('.message').first().text().trim() != '') {
    //     return false;
    // }
    /*==================================================================
    [ Validate ]*/
    var input       = $('.validate-input input');
    $('.validate-form').on('submit',function(){
        var val = true
        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                val = false;
            }
        }
        return val;
    });

    $('.validate-form input').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    $('.validate-form input').each(function(){
        if($(this).next('.help-block').children('.message').text().trim() != ''){
            showValidate(this);
        }
    });

    function validate (input) {
        var name = $(input).parents('.validate-input').children('label').text();
        var message = $(input).next('.help-block').children('.message');
        if($(input).val().trim() == ''){
            $(message).text(name + ' field is required');
            return false;
        }
        else{
            if($(input).attr('type') == 'password') {
                if($(input).val().match(/\s/g) != null) {
                    $(message).text(name + ' cannot contain space character.')
                    return false;
                }
            }
        }

    }

    function showValidate(input) {
        var thisAlert = $(input).next('.help-block');
        $(thisAlert).css('visibility', 'visible');
        $(thisAlert).parents('.form-group').addClass('has-error');
    }

    function hideValidate(input) {
        var thisAlert = $(input).next('.help-block');
        $(thisAlert).css('visibility', 'hidden');
        $(thisAlert).parents('.form-group').removeClass('has-error')
    }
})(jQuery);