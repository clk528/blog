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
/**
 * 下划线转驼峰
 */
if(!function_exists('stringToCamel'))
{
    function stringToCamel($string)
    {
        return preg_replace_callback('/([-_]+([a-z]{1}))/i',function($matches){
            return strtoupper($matches[2]);
        },$string);
    }
}
if(!function_exists('is_image')){
    /**
     * 判断文件的MIME类型是否为图片
     * @param $mimeType
     * @return bool
     */
    function is_image($mimeType)
    {
        return starts_with($mimeType, 'image/');
    }
}

if(!function_exists('human_filesize')){
    /**
     * 返回可读性更好的文件尺寸
     * @param $bytes
     * @param int $decimals
     * @return string
     */
    function human_filesize($bytes, $decimals = 2)
    {
        $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) .@$size[$factor];
    }
}