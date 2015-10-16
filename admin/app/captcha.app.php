<?php

/**
 *    验证码
 *
 *    @author    Garbin
 *    @usage    none
 */
class CaptchaApp extends ECBaseApp
{
    function index()
    {
//        $this->_captcha(70, 20); //5.2版本
        $this->_captcha(70, 26); //5.3及以上版本
    }
}

?>