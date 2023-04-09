<?php
use app\core\Application;
//var_dump($userP);
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: lightgray;">
    <div class="container-fluid" >
        <a class="navbar-brand" href="/logout"><-</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <?php
                        if (!Application::isGuest()) {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page">Account</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" >
                                    <?php echo Application::$app->user->getDisplayName() ?>
                                </a>
                            </li>
                        <?php } ?>

                    </ul>
                    <?php
                    if (Application::isGuest()) {

                        ?>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0"
                            style="padding-top: 10px; padding-right: 10px; ; position: absolute; top: 0; right: 0;">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/login">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/register">Register</a>
                            </li>
                        </ul>
                    <?php } else {

                        ?>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0"
                            style="padding-top: 10px; padding-right: 10px; ; position: absolute; top: 0; right: 0;">
                            <li class="nav-item">
                                <button type="button" class="btn btn-success" href="/editProfile">Edit Profile</button>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/logout">Welcome
                                    <?php echo Application::$app->user->getDisplayName() ?>
                                    (Logout)
                                </a>
                            </li>

                        </ul>
                    <?php } ?>
                </div>
    </div>
</nav>
<div class="container-fluid" style="display: flex; margin-top:30px">
    <div class="container" style="width: 30%;">
        
    </div>
    <div class="container" style="display: flex;">        
        <!-- avatar -->
        <div class="container" style="width: 20%;">
            <img style="object-fit: cover; width: 100%; height: auto;" src="<?php echo $userP->getImage() ?? 'https://share-gcdn.basecdn.net/brand/logo.full.png' ?>" alt="Loading Picture">
        </div>
        <!-- content -->
        <div class="container" style="display: flex; flex-direction:column">
            <div style="font-size: 28px;font-weight: 700;"><?php echo $userP->getDisplayName() ?></div>
            <div style="font-size: 16px;font-weight: 200;">Owner</div>
            <div style="display: flex; flex-direction:row">
                <div style="padding-right: 30px; width:20%; font-weight:300">Email address</div>  
                <div><?php echo $userP->getEmail(); ?></div>
            </div>
            <div style="display: flex; flex-direction:row">
                <div style="padding-right: 30px; width:20%; font-weight:300">Phone</div>  
                <div><?php echo $userP->getPhone(); ?></div>
            </div>
            <div style="display: flex; flex-direction:row">
                <div style="padding-right: 30px; width:20%; font-weight:300">Address</div>  
                <div><?php echo $userP->getAddress(); ?></div>
            </div>
        </div>

        
    </div>    
</div>