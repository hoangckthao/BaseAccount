

$(document).ready(function () {
    $('#submitPasswordRecoveryForm').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'forgotPassword',
            type: 'POST',
            data: {
                email: $('#email').val(),
            },
            dataType: 'json',
            success: function (data) {
                //data =JSON.parse(data);                    

                if (data['errors'].length != 0) {
                    if (data['errors']['email']) {
                        document.getElementById("email-warning").innerHTML = data['errors']['email'];
                    }
                    else {
                        document.getElementById("email-warning").innerHTML = data['errors']['email'];
                    }
                }
                else {
                    alert("Change password successfull!")
                    window.location.href = "http://localhost:8080/login";
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