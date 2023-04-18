
$(document).ready(function (e) {

    $('#buttonAjax').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'register',
            type: 'POST',
            data: {
                firstName: $('#firstName').val(),
                lastName: $('#lastName').val(),
                email: $('#email').val(),
                password: $('#password').val(),
                passwordConfirm: $('#passwordConfirm').val(),
                phone: $('#phone').val(),
                address: $('#address').val(),
            },

            dataType: 'json',
            success: function (data) {
                if (data['errors'].length != 0) {
                    if (data['errors']['firstName']) {
                        document.getElementById("firstName-warning").innerHTML = data['errors']['firstName'];
                    }
                    else {
                        document.getElementById("firstName-warning").innerHTML = '';
                    }

                    if (data['errors']['lastName']) {
                        document.getElementById("lastName-warning").innerHTML = data['errors']['lastName'];
                    }
                    else {
                        document.getElementById("lastName-warning").innerHTML = '';
                    }

                    if (data['errors']['email']) {
                        document.getElementById("email-warning").innerHTML = data['errors']['email'];
                    }
                    else {
                        document.getElementById("email-warning").innerHTML = '';
                    }

                    if (data['errors']['password']) {
                        document.getElementById("password-warning").innerHTML = data['errors']['password'];
                    }
                    else {
                        document.getElementById("password-warning").innerHTML = '';
                    }

                    if (data['errors']['passwordConfirm']) {
                        document.getElementById("passwordConfirm-warning").innerHTML = data['errors']['passwordConfirm'];
                    }
                    else {
                        document.getElementById("passwordConfirm-warning").innerHTML = '';
                    }

                    if (data['errors']['phone']) {
                        document.getElementById("phone-warning").innerHTML = data['errors']['phone'];
                    }
                    else {
                        document.getElementById("phone-warning").innerHTML = '';
                    }

                    if (data['errors']['address']) {
                        document.getElementById("address-warning").innerHTML = data['errors']['address'];
                    }
                    else {
                        document.getElementById("address-warning").innerHTML = '';
                    }

                } else {
                    alert("Register successfull!")
                    window.location.href = "/login";
                }


            },
            error: function (xhr, status, error) {
                console.log(error);
            },
            finally: function () {

            }
        });
    });
});