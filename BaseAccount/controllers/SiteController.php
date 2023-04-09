<?php 

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

class SiteController extends Controller
{ 
    public function home() {
        $params = [
            'name' => 'Tran Phu Cuong'
        ];
        return $this->render('home', $params);
    }
    public  function contact() {
        return $this->render('contact');
    }
    public static function handleContact(Request $request) {
        $body = $request->getBody();        
        return 'Handle Contact data';
    }
}

?>