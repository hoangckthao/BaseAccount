<div class="container-fluid" style="display: flex;">
    <div name="loginPage" style="display: block; width: 40%; padding: 15px; margin: 15px">
        <div class="auth-logo" style="text-align: center; padding-bottom: 0px;padding-top: 20px;">
            <a href="https://base.vn/">
                <img src="https://share-gcdn.basecdn.net/brand/logo.full.png">
            </a>
        </div>
        <div class="loginBox">
            <form id="authForm" action="">
                <h1 style="padding: 35px 0px 8px 0px; text-align: center; font-size: 24px; font-weight: 500;">Login</h1>
                <div class="auth-sub-title" style="color: #888; font-size: 14px; text-align: center; padding-bottom: 20px; border-bottom: 2px solid #eee;">
                    Welcome back. Login to start working.</div>
                <div class="form" style="padding:9px;">
                    <div class="row">
                        <div class="label" style="margin-left: -10px; margin-top: 10px;padding-bottom: 10px; font-weight: bold; font-size: 15px;">
                            Email
                        </div>
                        <input class="form-control" type="email" name="email" placeholder="Your email" id="email" style="font-size: 16px; padding: 6px; border-top: 1px solid #d3d3d3; border-right: 1px solid #ccc; border-left: 1px solid #d3d3d3; border-bottom: 1px solid #ccc;" required>
                        <span id="email-warning" style="color:red"></span>
                    </div>

                    <div class="row" style="padding-bottom: 20px;">
                        <div class="label" style="margin-left: -10px; margin-top: 17px;padding-bottom: 10px; font-weight: bold; font-size: 15px; ">
                            Password
                            <div class="float-end" style="font-weight: normal !IMPORTANT; font-size: 14px; font-size: bold;">
                                <a href="/forgotPassword" style="text-decoration: none; " class="link-primary">Forget your password?</a>
                            </div>

                        </div>

                        <input class="form-control" type="password" name="password" placeholder="Your password" id="password" minlength="8" maxlength="30" style="font-size: 16px; padding: 6px; border-top: 1px solid #d3d3d3; border-right: 1px solid #ccc; border-left: 1px solid #d3d3d3; border-bottom: 1px solid #ccc;" required>
                        <span id="password-warning" style="color:red"></span>
                    </div>



                    <div class="row relative xo" style="position: relative; padding-bottom: 30px;">
                        <div class="checkbox" style="position: absolute;font-size: 13px; color: #888; left: 0px; top: 0px;">
                            <input type="checkbox" checked="" name="saved"> &nbsp; Keep me logged in
                        </div>
                        <button id="submitLoginForm" type="button" style="background-color: #2bd14e; font-size: 14px;font-weight: bold;color: #fff;cursor: pointer;text-align: center;padding: 11px 25px; border-radius: 3px; margin-top: 40px; border: hidden;">Login to start working</button>
                    </div>

                    <div style="display: flex; flex-direction: column; padding-bottom: 50px; border-bottom:2px solid #eee;  margin: 0 -9px;">                        
                        <div class="auth-sub-title" style="display: flex; color: #888; font-size: 14px; text-align: center; margin-bottom: 10px">
                            <div style="margin-bottom: 10px; border-bottom: 2px solid #eee; content: ''; flex: 1"></div>
                            
                            <div style="padding: 3px;"> Or, login via single sign-on </div>
                            <div style="margin-bottom: 10px; border-bottom: 2px solid #eee; content: ''; flex: 1"></div>
                        </div>

                        <div style="float: left; text-align: center;">
                            <button style="background-color: #f3f3f3; border: 1px solid rgba(0,0,0,0.05); font-size: 13px; font-weight: normal; font-weight: 500; cursor: pointer; text-align: center; box-sizing: border-box; color: #267cde; padding: 10px 10px; border-radius: 3px; margin-top: 20px; width: 49%;" type="button" class="btn btn-outline-primary">Login with Google</button>
                            <button style="background-color: #f3f3f3; border: 1px solid rgba(0,0,0,0.05); font-size: 13px; font-weight: normal; font-weight: 500; cursor: pointer; text-align: center; box-sizing: border-box; color: #267cde; padding: 10px 10px; border-radius: 3px; margin-top: 20px; width: 49%;" type="button" class="btn btn-outline-primary">Login with Microsoft</button>
                        </div>
                        <div style="float: left; text-align: center;">
                            <button style="background-color: #f3f3f3; border: 1px solid rgba(0,0,0,0.05); font-size: 13px; font-weight: normal; font-weight: 500; cursor: pointer; text-align: center; box-sizing: border-box; color: #267cde; padding: 10px 10px; border-radius: 3px; margin-top: 20px; width: 49%;" type="button" class="btn btn-outline-primary">Login with AppleID</button>
                            <button style="background-color: #f3f3f3; border: 1px solid rgba(0,0,0,0.05); font-size: 13px; font-weight: normal; font-weight: 500; cursor: pointer; text-align: center; box-sizing: border-box; color: #267cde; padding: 10px 10px; border-radius: 3px; margin-top: 20px; width: 49%;" type="button" class="btn btn-outline-primary">Login with SAML</button>
                        </div>

                    </div>

                    <div class="row" style="margin-top: 16px; font-size: 14px;">
                        <a style="text-decoration: none; text-align: center; font-weight: normal;color: #267cde;" href="/register">Not have an account yet? Go to register</a>
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

    $(document).ready(function() {
        $('#submitLoginForm').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: 'login',
                type: 'POST',
                data: {
                    email: $('#email').val(),
                    password: $('#password').val(),                    
                },

                dataType: 'json',
                success: function(data) {
                    //data =JSON.parse(data);                    
                    if (data['errors'].length != 0) {                        
                        if (data['errors']['email']) {
                            document.getElementById("email-warning").innerHTML = data['errors']['email'];
                            
                        } 
                        else {
                            document.getElementById("email-warning").innerHTML = '';
                        }
                        if (data['errors']['password']) 
                        {                            
                            document.getElementById("password-warning").innerHTML = data['errors']['password'];
                        }
                        else {
                            document.getElementById("password-warning").innerHTML = '';
                        }
                    }
                    else {                                                
                        alert("Login successfull!")
                        window.location.href = "http://localhost:8080/profile";
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