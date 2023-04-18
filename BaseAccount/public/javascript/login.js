

$(document).ready(function () {
    $('#submitLoginForm').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'login',
            type: 'POST',
            data: {
                email: $('#email').val(),
                password: $('#password').val(),
            },

            dataType: 'json',
            success: function (data) {
                //data =JSON.parse(data);                    
                if (data['errors'].length != 0) {
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
                }
                else {
                    alert("Login successfull!")
                    window.location.href = "/profile";
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