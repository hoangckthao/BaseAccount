<div class="container-fluid" style="display: flex;">
    <div name="registerPage" style="display: block; width: 40%;  padding: 15px; margin: 15px; overflow: auto;">
        <div class="auth-logo" style="text-align: center; padding-bottom: 0px;padding-top: 20px;">
            <a href="https://base.vn/">
                <img src="https://share-gcdn.basecdn.net/brand/logo.full.png">
            </a>
        </div>
        <div class="registerBox">

            <form id="authform" action="" method="post">
            <h1 style="padding: 35px 0px 8px 0px; text-align: center; font-size: 24px; font-weight: 500;">Register</h1>
                <div class="auth-sub-title" style="color: #888; font-size: 14px; text-align: center; padding-bottom: 20px; border-bottom: 2px solid #eee;">
                    Register to start working.</div>
                <div class="form">

                    <div class="row" style="margin: 0 -2px">
                        <div class="label" style="margin-top: 10px;padding-bottom: 10px; font-weight: bold; font-size: 15px; margin-left: -10px;">First name</div>
                        <input id="firstName" class="form-control" type="text" name="firstName" placeholder="Your first name" style="font-size: 16px; padding: 6px" required>
                        <span id="firstName-warning" style="color:red"></span>
                    </div>

                    <div class="row" style="margin: 0 -2px">
                        <div class="label" style="margin-top: 10px;padding-bottom: 10px; font-weight: bold; font-size: 15px; margin-left: -10px;">Last name</div>
                        <input id="lastName" class="form-control" type="text" name="lastName" placeholder="Your last name" style="font-size: 16px; padding: 6px" required>
                        <span id="lastName-warning" style="color:red"></span>
                    </div>

                    <div class="row" style="margin: 0 -2px">
                        <div class="label" style="margin-top: 10px;padding-bottom: 10px; font-weight: bold; font-size: 15px; margin-left: -10px;">Email</div>
                        <input id="email" class="form-control " type="text" name="email" placeholder="Your email" style="font-size: 16px; padding: 6px" required>
                        <span id="email-warning" style="color:red"></span>
                    </div>

                    <div class="row" style="margin: 0 -2px">
                        <div class="label" style="margin-top: 10px;padding-bottom: 10px; font-weight: bold; font-size: 15px; margin-left: -10px;">Phone</div>
                        <input id="phone" class="form-control " type="number" name="phone" placeholder="Your phone" style="font-size: 16px; padding: 6px">
                        <span id="phone-warning" style="color:red"></span>
                    </div>

                    <div class="row" style="margin: 0 -2px">
                        <div class="label" style="margin-top: 10px;padding-bottom: 10px; font-weight: bold; font-size: 15px; margin-left: -10px;">Password</div>
                        <input id="password" class="form-control " type="password" name="password" placeholder="Your password" style="font-size: 16px; padding: 6px" required>
                        <span id="password-warning" style="color:red"></span>
                    </div>

                    <div class="row" style="margin: 0 -2px">
                        <div class="label" style="margin-top: 10px;padding-bottom: 10px; font-weight: bold; font-size: 15px; margin-left: -10px;">Confirm Password</div>
                        <input id="passwordConfirm" class="form-control" type="password" name="passwordConfirm" placeholder="Your confirm password" style="font-size: 16px; padding: 6px" required>
                        <span id="passwordConfirm-warning" style="color:red"></span>
                    </div>

                    <div class="row" style="padding-bottom: 20px; margin: 0 -2px; ">
                        <div class="label" style="margin-top: 10px;padding-bottom: 10px; font-weight: bold; font-size: 15px;  margin-left: -9px;">Address</div>
                        <input id="address" class="form-control" type="text" name="address" placeholder="Your address" style="font-size: 16px; padding: 6px">
                        <span id="address-warning" style="color:red"></span>
                    </div>


                    <div class="row relative xo" style="position: relative;">
                        <!-- captcha -->
                        <div class="checkbox" style="position: absolute;font-size: 13px; color: #888; left: 0px; top: 0px;">
                            <input type="checkbox" checked="" name="saved"> &nbsp; Verify you are not robot
                        </div>
                        <button id="buttonAjax" class="button" style="background-color: #2bd14e; font-size: 14px;font-weight: bold;color: #fff;cursor: pointer;text-align: center;padding: 11px 25px; border-radius: 3px; margin-top: 40px; border:hidden; width: 97%; margin-left: 8px;">Register to start working</button>
                    </div>

                    <div class="row" style="margin-top: 16px; text-align: center;">
                        <a style="font-size: 14px; text-decoration: none;" href="/login">Already have an account? Go back to login</a>
                    </div>
                </div>

            </form>
        </div>

    </div>
    <div>
        <img style="max-width: 100%; height: auto;" src="https://static-gcdn.basecdn.net/account/image/background.png" alt="Hinh anh minh hoa">
    </div>
</div>

<script>
    $(document).ready(function(e) {

        $('#buttonAjax').click(function(e) {
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
                success: function(data) {
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
                        window.location.href = "http://localhost:8080/login";
                    }


                },
                error: function(xhr, status, error) {
                    console.log(error);
                },
                finally: function() {

                }
            });
        });
    });
</script>