<link rel="stylesheet" href="../css/forgotPassword.css">
</head>

<body>  
<div class="container-fluid" style="display: flex;">
    <div class="forgotPasswordForm" name="loginPage">
        <div class="auth-logo" >
            <a href="https://base.vn/">
                <img src="<?php use app\core\Controller; $controller = new Controller; echo $controller->getPathRelative('images/logo.full.png') ?>">
            </a>
        </div>
        <div class="loginBox">
            <form id="authform" action="" method="post">
                <h1>Password Recovery</h1>
                <div class="auth-sub-title">
                    Please enter your information. A password recovery hint will be sent to your email</div>
                <div class="form">
                    <div class="row">
                        <div class="label">Email</div>
                        <input id="email" class="form-control" type="text" name="email" placeholder="Your email"required>
                        <span id="email-warning" style="color:red"></span>
                    </div>
                                        
        

                    <div class="row relative xo" style="position: relative;">                        
                        <button id="submitPasswordRecoveryForm" class="button">Recover password</button>                       
                    </div>

                    <div class="row" style="margin-top: 16px; font-size: 14px; text-align: center;">
                        <a href="/login" style=" text-decoration: none;">Login now if your company was already on Base Account</a>
                    </div>
                </div>

            </form>
        </div>
       
    </div>  
    <div >
        <img style="max-width: 100%; height: auto;" src="<?php echo $controller->getPathRelative('images/background.png') ?>" alt="Hinh anh minh hoa">
    </div> 
</div>

<script type="text/javascript" src="<?php echo $controller->getPathRelative('javascript/for.js') ?>"></script>  