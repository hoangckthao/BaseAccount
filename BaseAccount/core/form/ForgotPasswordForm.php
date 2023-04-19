<?php

namespace app\core\form;

use app\core\Application;
use app\core\Model;
use app\models\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require(dirname(dirname(__DIR__)).'\phpmailer\src\PHPMailer.php');
require(dirname(dirname(__DIR__)).'\phpmailer\src\Exception.php');
require(dirname(dirname(__DIR__)).'\phpmailer\src\SMTP.php');

class ForgotPasswordForm extends Model
{    
    public string $email = '';
    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
        ];
    }

    public function checkEmailExits()
    {                
        $user = User::findOne(['email' => $this->email]);

        if (!$user || $user->validate()) {
            $this->addError('email', 'Email address does not exit.');
            return false;
        }
        return true;
    }
    public function sendMailChangePassword()
    {        
        $email = $this->email;

        // Tạo một chuỗi ngẫu nhiên
        $length = 8; // Độ dài chuỗi
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $mail = new PHPMailer();
        $mail->IsSMTP();


        $mail->SMTPAuth   = true;
        $mail->Port       = 465;
        $mail->Host       = "smtp.gmail.com";
        //$mail->Host       = "smtp.mail.yahoo.com";
        $mail->Username   = "hoangckthao33@gmail.com";
        $mail->Password   = "mkvcqcmqwkhoeenb"; // dang off
        $mail->SMTPSecure = 'ssl';

        $mail->IsHTML(true);
        $mail->AddAddress($email);
        $mail->SetFrom("cuongtphe150306@fpt.edu.vn");

        $subject = "Password change notice".CASE_UPPER;
        $mail->Subject = $subject;

        $message = "Xin chào,\n\nMật khẩu của bạn đã được thay đổi thành: $randomString \n\nTrân trọng,\nBan quản trị BASE";
        $mail->Body = $message;
                

        $mail->send();
        //var_dump($mail);
        return $randomString;
    }

    
}
