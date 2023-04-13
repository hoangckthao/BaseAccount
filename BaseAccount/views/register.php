<div class="container-fluid" style="display: flex;">
    <div name="registerPage" style="display: block; width: 40%;  padding: 15px; margin: 15px; overflow: auto;">
        <div class="auth-logo" style="text-align: center; padding-bottom: 0px;padding-top: 20px;">
            <a href="https://base.vn/">
                <img src="https://share-gcdn.basecdn.net/brand/logo.full.png">
            </a>
        </div>
        <div class="registerBox">
            
            <form id="authform" action="" method="post" >
                <h1 style="padding: 35px 0px 8px 0px; text-align: center; font-size: 24px; font-weight: 500;">Register</h1>                
                <div class="form">

                    <div class="row">
                        <div class="label" style="margin-top: 10px;padding-bottom: 10px; font-weight: bold; font-size: 13px;">First name</div>
                        <input class="form-control <?php echo $model->hasError('firstName') ? 'is-invalid' : '' ?>" type="text" name="firstName"  placeholder="Your first name"  style="font-size: 16px; padding: 6px"  required>
                        <div class="invalid-feedback">
                            <?php echo $model->getFirstError('firstName') ?> 
                        </div>
                    </div>

                    <div class="row">
                        <div class="label" style="margin-top: 10px;padding-bottom: 10px; font-weight: bold; font-size: 13px;">Last name</div>
                        <input class="form-control <?php echo $model->hasError('lastName') ? 'is-invalid' : '' ?>" type="text" name="lastName" placeholder="Your last name" style="font-size: 16px; padding: 6px" required >
                        <div class="invalid-feedback">
                            <?php echo $model->getFirstError('lastName') ?> 
                        </div>
                    </div>

                    <div class="row">
                        <div class="label" style="margin-top: 10px;padding-bottom: 10px; font-weight: bold; font-size: 13px;">Email</div>
                        <input class="form-control <?php echo $model->hasError('email') ? 'is-invalid' : '' ?>" type="text" name="email" placeholder="Your email" style="font-size: 16px; padding: 6px" required>
                        <div class="invalid-feedback">
                            <?php echo $model->getFirstError('email') ?> 
                        </div>
                    </div>

                    <div class="row">
                        <div class="label" style="margin-top: 10px;padding-bottom: 10px; font-weight: bold; font-size: 13px;">Phone</div>
                        <input class="form-control <?php echo $model->hasError('phone') ? 'is-invalid' : '' ?>" type="number" name="phone" placeholder="Your phone" style="font-size: 16px; padding: 6px" >
                        <div class="invalid-feedback">
                            <?php echo $model->getFirstError('phone') ?> 
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="label" style="margin-top: 10px;padding-bottom: 10px; font-weight: bold; font-size: 13px;">Password</div>
                        <input class="form-control <?php echo $model->hasError('password') ? 'is-invalid' : '' ?>" type="password" name="password" placeholder="Your password" style="font-size: 16px; padding: 6px" required>
                        <div class="invalid-feedback">
                            <?php echo $model->getFirstError('password') ?> 
                        </div>
                    </div>

                    <div class="row">
                        <div class="label" style="margin-top: 10px;padding-bottom: 10px; font-weight: bold; font-size: 13px;">Confirm Password</div>
                        <input class="form-control <?php echo $model->hasError('passwordConfirm') ? 'is-invalid' : '' ?>" type="password" name="passwordConfirm" placeholder="Your confirm password" style="font-size: 16px; padding: 6px" required>
                        <div class="invalid-feedback">
                            <?php echo $model->getFirstError('passwordConfirm') ?> 
                        </div>
                    </div>
                    
                    <div class="row" style="padding-bottom: 20px;">
                        <div class="label" style="margin-top: 10px;padding-bottom: 10px; font-weight: bold; font-size: 13px;">Address</div>
                        <input class="form-control <?php echo $model->hasError('address') ? 'is-invalid' : '' ?>" type="text" name="address" placeholder="Your address" style="font-size: 16px; padding: 6px" >
                        <div class="invalid-feedback">
                            <?php echo $model->getFirstError('address') ?> 
                        </div>
                    </div>
        

                    <div class="row relative xo" style="position: relative;">
                    <!-- captcha -->                            
                        <div class="checkbox" style="position: absolute;font-size: 13px; color: #888; left: 0px; top: 0px;">
                            <input  type="checkbox" checked="" name="saved"> &nbsp; Verify you are not robot
                        </div>
                        <button class="submit" style="background-color: #2bd14e; font-size: 14px;font-weight: bold;color: #fff;cursor: pointer;text-align: center;padding: 11px 25px; border-radius: 3px; margin-top: 40px;">Register to start working</button>                       
                    </div>

                    <div class="row" style="margin-top: 16px; font-size: 14px;">
                        <a href="/login">Already have an account? Go back to login</a>
                    </div>
                </div>

            </form>
        </div>
       
    </div>  
    <div >
        <img style="max-width: 100%; height: auto;" src="https://static-gcdn.basecdn.net/account/image/background.png" alt="Hinh anh minh hoa">
    </div> 
</div>