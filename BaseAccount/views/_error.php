<?php ?>
<div class="container" style="display: block;">
    <div class="alert alert-danger" role="alert">
        <h1>
            <?php echo $exception->getCode() ?> -
            <?php echo $exception->getMessage() ?>
        </h1>
    </div>
    <button type="button" class="btn btn-success"><a href="/login" style="color: white;">Go back to login page</a></button>
    <button type="button" class="btn btn-warning"><a href="/register" >Go back to register page</a></button>
</div>