<div class="container-fluid" style="display: flex;">
    <div name="loginPage" style="display: block; width: 40%; padding: 30px;">
        <div class="auth-logo" style="text-align: center; padding-bottom: 0px;padding-top: 20px;">
            <a href="https://base.vn/">
                <img src="https://share-gcdn.basecdn.net/brand/logo.full.png">
            </a>
        </div>
        <div class="loginBox">
            <form id="authform" action="" method="post">
                <h1 style="padding: 35px 0px 8px 0px; text-align: center; font-size: 24px; font-weight: 500;">Password Recovery</h1>
                <div class="auth-sub-title"
                    style="color: #888; font-size: 14px; text-align: center; padding-bottom: 20px; border-bottom: 2px solid #eee;">
                    Please enter your information. A password recovery hint will be sent to your email</div>
                <div class="form">
                    <div class="row">
                        <div class="label" style="margin-top: 10px;padding-bottom: 10px; font-weight: bold; font-size: 15px;">Email</div>
                        <input id="email" class="form-control" type="text" name="email" placeholder="Your email" style="font-size: 16px; padding: 6px" required>
                        <span id="email-warning" style="color:red"></span>
                    </div>
                                        
        

                    <div class="row relative xo" style="position: relative;">
                        
                        <button id="submitPasswordRecoveryForm" class="button" style="background-color: #2bd14e; font-size: 14px;font-weight: bold;color: #fff;cursor: pointer;text-align: center;padding: 11px 25px; border-radius: 3px; margin-top: 40px;">Recover password</button>                       
                    </div>

                    <div class="row" style="margin-top: 16px; font-size: 14px;">
                        <a href="/login">Login now if your company was already on Base Account</a>
                    </div>
                </div>

            </form>
        </div>
       
    </div>  
    <div >
        <img style="max-width: 100%; height: auto;" src="https://static-gcdn.basecdn.net/account/image/background.png" alt="Hinh anh minh hoa">
    </div> 
</div>

<script>    

    $(document).ready(function() {
        $('#submitPasswordRecoveryForm').click(function(e) {            
            e.preventDefault();
            $.ajax({
                url: 'forgotPassword',
                type: 'POST',
                data: {
                    email: $('#email').val(),                               
                },
                dataType: 'json',
                success: function(data) {
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
                error: function(xhr, status, error) {
                    
                    console.log(error);
                },
                finally: function() {
                    
                    
                }
            });
        });
    });
</script>