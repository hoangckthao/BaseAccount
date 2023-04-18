
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
                        $("#firstName-warning").html(data['errors']['firstName']);
                    }
                    else {
                        $("#firstName-warning").html('');
                    }

                    if (data['errors']['lastName']) {
                        $("#lastName-warning").html(data['errors']['lastName']);
                    }
                    else {
                        $("#lastName-warning").html('');
                    }

                    if (data['errors']['email']) {
                        $("#email-warning").html(data['errors']['email']);
                    }
                    else {
                        $("#email-warning").html('');
                    }

                    if (data['errors']['password']) {
                        $("#password-warning").html(data['errors']['password']);
                    }
                    else {
                        $("#password-warning").html('');
                    }

                    if (data['errors']['passwordConfirm']) {
                        $("#passwordConfirm-warning").html(data['errors']['passwordConfirm']);
                    }
                    else {
                        $("#passwordConfirm-warning").html('');
                    }

                    if (data['errors']['phone']) {
                        $("#phone-warning").html(data['errors']['phone']);
                    }
                    else {
                        $("#phone-warning").html();
                    }

                    if (data['errors']['address']) {
                        $("#address-warning").html(data['errors']['address']);
                    }
                    else {
                        $("#address-warning").html('');
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