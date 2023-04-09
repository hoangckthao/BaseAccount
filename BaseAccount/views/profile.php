<?php
use app\core\Application; 
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                </li>

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
                        <a class="nav-link" aria-current="page" href="/profile">Profile</a>
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