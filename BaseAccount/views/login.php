    <link rel="stylesheet" href="../css/login.css">
</head>

<body>  
<div class="container-fluid fullBox" >
    <div id="loginBox" name="loginPage">
        <div class="auth-logo" >
            <a href="https://base.vn/">
                <img src="../images/logo.full.png">
            </a>
        </div>
        <div class="loginBox">
            <form id="authForm" action="">
                <h1 class="login-title">Login</h1>
                <div class="auth-sub-title1">
                    Welcome back. Login to start working.</div>
                <div class="form" >
                    <div class="row">
                        <div class="label">
                            Email
                        </div>
                        <input class="form-control" type="email" name="email" placeholder="Your email" id="email" required>
                        <span id="email-warning" style="color:red"></span>
                    </div>

                    <div class="row" style="padding-bottom: 20px;">
                        <div class="label" >
                            Password
                            <div class="float-end">
                                <a href="/forgotPassword" style="text-decoration: none; " class="link-primary">Forget your password?</a>
                            </div>

                        </div>

                        <input class="form-control" type="password" name="password" placeholder="Your password" id="password" minlength="8" maxlength="30" required>
                        <span id="password-warning" style="color:red"></span>
                    </div>



                    <div class="row relative xo">
                        <div class="checkbox">
                            <input type="checkbox" checked="" name="saved"> &nbsp; Keep me logged in
                        </div>
                        <button id="submitLoginForm" type="button">Login to start working</button>
                    </div>

                    <div id="loginWays">                        
                        <div class="auth-sub-title">
                            <div class="fench"></div>
                            
                            <div style="padding: 3px;"> Or, login via single sign-on </div>
                            <div class="fench"></div>
                        </div>

                        <div class="loginWays" >
                            <button type="button" class="btn btn-outline-primary">Login with Google</button>
                            <button type="button" class="btn btn-outline-primary">Login with Microsoft</button>
                        </div>
                        <div class="loginWays">
                            <button type="button" class="btn btn-outline-primary">Login with AppleID</button>
                            <button type="button" class="btn btn-outline-primary">Login with SAML</button>
                        </div>

                    </div>

                    <div class="rowRegister">
                        <a href="/register">Not have an account yet? Go to register</a>
                    </div>
                </div>

            </form>
        </div>

    </div>
    <div>
        <img style="max-width: 100%; height: auto;" src="../images/background.png" alt="Hinh anh minh hoa">
    </div>
</div>

<script type="text/javascript" src="../javascript/login.js"></script>  