<?php 

namespace app\core\exception;

class UpgradePasswordException extends \Exception 
{
    protected $message = 'Upgrade password process has error, please try again.';
    protected $code = 404;
}

?>