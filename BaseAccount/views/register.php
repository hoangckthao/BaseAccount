<link rel="stylesheet" href="../css/register.css">
</head>

<body>
    <div class="container-fluid" style="display: flex;">
        <div id="registerForm" name="registerPage">
            <div class="auth-logo">
                <a href="https://base.vn/">
                    <img src="../images/logo.full.png">
                </a>
            </div>
            <div class="registerBox">

                <form id="authform" action="" method="post">
                    <h1>Register</h1>
                    <div class="auth-sub-title">
                        Register to start working.
                    </div>
                    <div class="form">

                        <div class="row">
                            <div class="label">First name</div>
                            <input id="firstName" class="form-control" type="text" name="firstName" placeholder="Your first name" required>
                            <span id="firstName-warning" style="color:red"></span>
                        </div>

                        <div class="row">
                            <div class="label">Last name</div>
                            <input id="lastName" class="form-control" type="text" name="lastName" placeholder="Your last name" required>
                            <span id="lastName-warning" style="color:red"></span>
                        </div>

                        <div class="row">
                            <div class="label">Email</div>
                            <input id="email" class="form-control " type="text" name="email" placeholder="Your email" required>
                            <span id="email-warning" style="color:red"></span>
                        </div>

                        <div class="row">
                            <div class="label">Phone</div>
                            <input id="phone" class="form-control " type="number" name="phone" placeholder="Your phone" >
                            <span id="phone-warning" style="color:red"></span>
                        </div>

                        <div class="row">
                            <div class="label">Password</div>
                            <input id="password" class="form-control " type="password" name="password" placeholder="Your password" required>
                            <span id="password-warning" style="color:red"></span>
                        </div>

                        <div class="row">
                            <div class="label">Confirm Password</div>
                            <input id="passwordConfirm" class="form-control" type="password" name="passwordConfirm" placeholder="Your confirm password" required>
                            <span id="passwordConfirm-warning" style="color:red"></span>
                        </div>

                        <div class="row" style="padding-bottom: 20px;  ">
                            <div class="label">Address</div>
                            <input id="address" class="form-control" type="text" name="address" placeholder="Your address" >
                            <span id="address-warning" style="color:red"></span>
                        </div>


                        <div class="row relative xo" style="position: relative;">
                            <!-- captcha -->
                            <div class="checkbox">
                                <input type="checkbox" checked="" name="saved"> &nbsp; Verify you are not robot
                            </div>
                            <button id="buttonAjax" class="button" >Register to start working</button>
                        </div>

                        <div class="row" style="margin-top: 16px; text-align: center;">
                            <a style="font-size: 14px; text-decoration: none;" href="/login">Already have an account? Go back to login</a>
                        </div>
                    </div>

                </form>
            </div>

        </div>
        <div>
            <img style="max-width: 100%; height: auto;" src="../images/background.png" alt="Hinh anh minh hoa">
        </div>
    </div>

    <script type="text/javascript" src="../javascript/register.js"></script>