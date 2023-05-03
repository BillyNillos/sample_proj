(function() 
{

    var app = {
        initialize: function () 
        {
            this.signup.initialize();
            this.login.initialize();
        },
        signup: {
            initialize: function() 
            {
                this.registerNewUser();
                this.preventSpecialChars();
            },
            registerNewUser: function() 
            {
                var btnsignup = jQuery('#btn-signup');

                btnsignup.click(function() {
                    var allfields = jQuery('.signup-form-field input'),
                        firstname = jQuery('#firstname').val(),
                        lastname = jQuery('#lastname').val(),
                        username = jQuery('#username').val(),
                        password = jQuery('#password').val(),
                        confirmedpassword = jQuery('#confirmpassword').val(),
                        validation_message = jQuery('.signup-form-message');

                    // Check blank fields
                    var all_fields_valid = false,   
                        blank_fields_counter = 0;

                    allfields.each(function() 
                    {
                        var value = jQuery(this).val();
                        if (value == '') blank_fields_counter++;

                        if (blank_fields_counter >= 1) all_fields_valid = false;
                        else all_fields_valid = true;
                    });

                    // Refresh warning message appearance
                    validation_message.removeClass('warning success');

                    if (all_fields_valid) {
                        // Check password
                        if (password == confirmedpassword) {
                            // Send details to DB
                            jQuery.ajax({
                                url: "modules/register-user.php",
                                type: "post",
                                data: {
                                    firstname : firstname,
                                    lastname : lastname,
                                    username : username,
                                    password : password
                                },
                                success: function(data) {
                                    if (data) {
                                        validation_message.addClass('success').removeClass('warning');
                                        validation_message.html('Account successfully created. You will be redirected to the log in page!');
                                        setTimeout(function() {
                                            window.location.href = 'log-in.php';
                                        }, 4000);
                                    } else {
                                        validation_message.html('An unexpected error occured. Please contact site admin.');
                                        validation_message.addClass('warning').removeClass('success');
                                    }
                                }
                            });
                        } else {
                            validation_message.html('Password did not match. Please try again.');
                            validation_message.addClass('warning').removeClass('success');
                        }
                    } else {
                        validation_message.html('One or more fields have an error. Please check and try again.');
                        validation_message.addClass('warning').removeClass('success');
                    }
                });
            },
            preventSpecialChars: function() {
                var fields = jQuery('.signup-form-field input');
                fields.on('keypress', function (event) {
                    var regex = new RegExp("^[a-zA-Z0-9]+$");
                    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                    if (!regex.test(key)) {
                       event.preventDefault();
                       return false;
                    }
                });
            }
        },
        login: {
            initialize: function() {
                this.checkUserLogin();
            },
            checkUserLogin: function() {
                var btnlogin = jQuery('#btn-login');

                btnlogin.click(function() {
                    var username = jQuery('#username').val(),
                        password = jQuery('#password').val(),
                        validation_message = jQuery('.log-in-form-message');

                    // Refresh warning message appearance
                    validation_message.removeClass('warning success');

                    // Check blank fields
                    if (username == "" || password == "") {
                        validation_message.addClass('warning');
                        validation_message.html('One or more fields have an error. Please check and try again.');
                    } else {
                        // Send details to DB
                        jQuery.ajax({
                            url: "modules/user-login.php",
                            type: "post",
                            data: {
                                username : username,
                                password : password
                            },
                            success: function(data) {
                                if (data) {
                                    validation_message.hide();
                                    window.location.href = 'dashboard.php?username=' + data;
                                } else {
                                    validation_message.addClass('warning');
                                    validation_message.html('The username and password you entered isn’t connected to an account. Please try again.');
                                }
                            }
                        });
                    }
                });
            }
        }
    }

    jQuery(document).ready( function() {
		app.initialize();
	});

})();