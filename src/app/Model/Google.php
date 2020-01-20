<?php

namespace OhhInk\Rrm\Model;

use Earnp\GoogleAuthenticator\Facades\GoogleAuthenticator;

use Illuminate\Database\Eloquent\Model;

class Google extends Model
{
    public static function CreateSecret($param='')
    {
        $google = new \Earnp\GoogleAuthenticator\Librarys\GoogleAuthenticator();
        $secret = $google->createSecret();//创建一个Secret
        $qrCodeUrl="otpauth://totp/".$param."?secret=".$secret.'&issuer=kaifa';//二维码中填充的内容
        $googlesecret = array('secret' =>$secret ,'codeurl'=>$qrCodeUrl);
        return $googlesecret;
    }

    public static function CheckCode($google, $code) {
        if (config('admin.google_authenticator')) {
            return GoogleAuthenticator::CheckCode($google, $code);
        } else {
            return true;
        }
    }
}
