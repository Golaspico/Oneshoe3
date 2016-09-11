/**
 * Created by VanHyori on 6/24/2016.
 One shoe
 */

$(function(){

    $.validator.setDefaults({
        errorClass: 'help-block',
        highlight: function(element){
            $(element)
                .closest('.form-group')
                .addClass('has-error');
        },
        unhighlight: function(element){
            $(element)
                .closest('.form-group')
                .removeClass('has-error');
        }


    });

    $.validator.addMethod('strongPassword',function(value,element){
        return this.optional(element)
        || value.length >= 6
        && /\d/.test(value)
        && /[a-z]/i.test(value);
    },'Your password must be at least 6 characters long and contain at least one number and a char\'.')







    $("#loginForm").validate({
        submitHandler: function(form) {
            if ($(form).valid())
                form.submit();
            return false; // prevent normal form posting
        },
        rules:{
            Email:{
                required:true,
                email:true,

                remote:
                {
                    url: '../Controller/Authentication/ValidateUser.php',
                    type: "post",
                    data:
                    {
                        email: function()
                        {
                            return $('#loginForm :input[name="Email"]').val();
                        }
                    }
                }

            },
            Password:{
                required:true,
                strongPassword:true
            },
            Password2:{
                required:true,
                equalTo:"#Password"
            },

            FullName:{
                required:true,
                minlength: 4
            },

            UserName:{
                required:true,
                minlength: 4
            }


        },

            messages:{
                Email:{
                    required: 'Please enter an email address',
                    email:'Please enter a <em>valid</em> email',
                    remote: $.validator.format("{0} is already associated with an account")

                },

                Address:{
                    minlength: 'Address is too short'
                }
            }



    });




});