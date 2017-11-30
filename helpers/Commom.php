<?php
/**
 * Created by PhpStorm.
 * User: clk528
 * Date: 2017-11-29
 * Time: 17:45
 */

if(!function_exists('password_decode'))
{
    /**
     * 公钥加密
     * @param $string
     * @param $publicKey
     * @return string
     */
    function password_decode($string,$publicKey)
    {
        $data = "";
        $dataArray = str_split($string, 117);
        foreach ($dataArray as $value) {
            $encryptedTemp = "";
            openssl_public_encrypt($value,$encryptedTemp,$publicKey);//公钥加密
            $data .= base64_encode($encryptedTemp);
        }
        return $data;
    }
}

if(!function_exists('password_encode'))
{
    /**
     * 私钥解密
     * @param $string
     * @param $privateKey
     * @return string
     */
    function password_encode($string,$privateKey)
    {
        $decrypted = "";
        $decodeStr = base64_decode($string);
        $enArray = str_split($decodeStr, 256);

        foreach ($enArray as $va) {
            openssl_private_decrypt($va,$decryptedTemp,$privateKey);//私钥解密
            $decrypted .= $decryptedTemp;
        }
        return $decrypted;
    }
}

if(!function_exists('stringToCamel'))
{
    function stringToCamel($string)
    {
        return preg_replace_callback('/([-_]+([a-z]{1}))/i',function($matches){
            return strtoupper($matches[2]);
        },$string);
    }
}