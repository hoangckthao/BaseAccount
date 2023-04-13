<div class="container-fluid" style="display: flex;">
    <div name="loginPage" style="display: block; width: 40%; padding: 15px; margin: 15px">
        <div class="auth-logo" style="text-align: center; padding-bottom: 0px;padding-top: 20px;">
            <a href="https://base.vn/">
                <img src="https://share-gcdn.basecdn.net/brand/logo.full.png">
            </a>
        </div>
        <div class="loginBox">
            <form id="authform" action="" method="post">
                <h1 style="padding: 35px 0px 8px 0px; text-align: center; font-size: 24px; font-weight: 500;">Login</h1>
                <div class="auth-sub-title" style="color: #888; font-size: 14px; text-align: center; padding-bottom: 20px; border-bottom: 2px solid #eee;">
                    Welcome back. Login to start working.</div>
                <div class="form">
                    <div class="row">
                        <div class="label" style="margin-top: 10px;padding-bottom: 10px; font-weight: bold; font-size: 15px;">Email</div>
                        <input class="form-control <?php echo $model->hasError('email') ? 'is-invalid' : '' ?>" type="text" name="email" placeholder="Your email" style="font-size: 16px; padding: 6px" required>
                        <div class="invalid-feedback">
                            <?php echo $model->getFirstError('email') ?? '' ?>
                        </div>
                    </div>

                    <div class="row" style="padding-bottom: 20px;">
                        <div class="label" style="margin-top: 10px;padding-bottom: 10px; font-weight: bold; font-size: 15px;">
                            Password
                            <div class="float-end" style="font-weight: normal !IMPORTANT; font-size: 13px;">
                                <a href="/forgotPassword" class="link-underline-primary">Forgot password? Click here</a>
                            </div>

                        </div>

                        <input class="form-control <?php echo $model->hasError('password') ? 'is-invalid' : '' ?>" type="password" name="password" placeholder="Your password" style="font-size: 16px; padding: 6px" required>
                        <div class="invalid-feedback">
                            <?php echo $model->getFirstError('password') ?? '' ?>
                        </div>
                    </div>



                    <div class="row relative xo" style="position: relative; padding-bottom: 30px;">
                        <div class="checkbox" style="position: absolute;font-size: 13px; color: #888; left: 0px; top: 0px;">
                            <input type="checkbox" checked="" name="saved"> &nbsp; Keep me logged in
                        </div>
                        <button class="submit" style="background-color: #2bd14e; font-size: 14px;font-weight: bold;color: #fff;cursor: pointer;text-align: center;padding: 11px 25px; border-radius: 3px; margin-top: 40px;">Login to start working</button>
                    </div>

                    <div style="display: flex; flex-direction: column; padding-bottom: 50px; border-bottom:2px solid #eee">
                        <div class="auth-sub-title" style="color: #888; font-size: 14px; text-align: center; border-bottom: 2px solid #eee; margin-bottom: 10px">
                            Or, login via single sign-on</div>
                        <div style="float: left; text-align: center;">
                            <button style="background-color: #f3f3f3; border: 1px solid rgba(0,0,0,0.05); font-size: 13px; font-weight: normal; font-weight: 500; cursor: pointer; text-align: center; box-sizing: border-box; color: #267cde; padding: 10px 10px; border-radius: 3px; margin-top: 20px; width: 49%;" type="button" class="btn btn-outline-primary">Login with Google</button>
                            <button style="background-color: #f3f3f3; border: 1px solid rgba(0,0,0,0.05); font-size: 13px; font-weight: normal; font-weight: 500; cursor: pointer; text-align: center; box-sizing: border-box; color: #267cde; padding: 10px 10px; border-radius: 3px; margin-top: 20px; width: 49%;" type="button" class="btn btn-outline-primary">Login with Microsoft</button>
                        </div>
                        <div style="float: left; text-align: center;">
                            <button style="background-color: #f3f3f3; border: 1px solid rgba(0,0,0,0.05); font-size: 13px; font-weight: normal; font-weight: 500; cursor: pointer; text-align: center; box-sizing: border-box; color: #267cde; padding: 10px 10px; border-radius: 3px; margin-top: 20px; width: 49%;" type="button" class="btn btn-outline-primary">Login with AppleID</button>
                            <button style="background-color: #f3f3f3; border: 1px solid rgba(0,0,0,0.05); font-size: 13px; font-weight: normal; font-weight: 500; cursor: pointer; text-align: center; box-sizing: border-box; color: #267cde; padding: 10px 10px; border-radius: 3px; margin-top: 20px; width: 49%;" type="button" class="btn btn-outline-primary">Login with SAML</button>
                        </div>

                    </div>

                    <div class="row" style="margin-top: 16px; font-size: 14px;" >
                        <a style="text-align: center; font-weight: normal;color: #267cde;" href="/register">Not have an account yet? Go to register</a>
                    </div>
                </div>

            </form>
        </div>

    </div>
    <div>
        <img style="max-width: 100%; height: auto;" src="https://static-gcdn.basecdn.net/account/image/background.png" alt="Hinh anh minh hoa">
    </div>
</div>