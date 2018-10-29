<?php
namespace OCAP\InstantMessaging\Bridge;
/**
 * RSA 工具类
 * Class RSA
 * @package OCAP\InstantMessaging\Bridge
 */
class RSA
{

    /**
     * RSA私钥加密(相对的公钥可以解出来)
     * @param string $private_key 私钥
     * @param string $data 要加密的字符串
     * @return string $encrypted 返回加密后的字符串
     * @author mosishu
     */
    public static function privateEncrypt($private_key,$data){
        if(!is_string($data)){
            return null;
        }
        $res_array = [];
        $str_array = str_split($data,100);
        foreach ($str_array as $key=>$item){
            $bool = openssl_private_encrypt($item,$encrypted,$private_key
//            ,OPENSSL_NO_PADDING
//            ,OPENSSL_PKCS1_PADDING
            );
            if($bool){
                $res_array[] = base64_encode($encrypted);
            }
        }
        return $res_array;
    }
    /**
     * RSA私钥解密
     * @param $private_key
     * @param $encrypted
     * @return null
     */
    public static function privateDecrypt($private_key,$encrypted){
        if(is_array($encrypted)){
            $data = '';
            foreach ($encrypted as $item){
                $data .= self::privateDecrypt($private_key,$item);
            }
            return $data;
        }
        if(!is_string($encrypted)){
            return null;
        }
        $encrypted = str_replace(' ','+',$encrypted);
        return (openssl_private_decrypt(base64_decode($encrypted), $decrypted, $private_key
            ,OPENSSL_PKCS1_PADDING
//            ,OPENSSL_SSLV23_PADDING
//            ,OPENSSL_PKCS1_OAEP_PADDING
//            ,OPENSSL_NO_PADDING
        ))? $decrypted : null;
    }
    /**
     * RSA公钥解密
     * @param $public_key
     * @param $encrypted
     * @return null|void
     */
    public static function publicDecrypt($public_key,$encrypted){
        if(is_array($encrypted)){
            $data = '';
            foreach ($encrypted as $item){
                $data .= self::publicDecrypt($public_key,$item);
            }
            return $data;
        }
        if(!is_string($encrypted)){
            return null;
        }
        $encrypted = str_replace(' ','+',$encrypted);
        return (openssl_public_decrypt(base64_decode($encrypted),$decrypted,$public_key
//            ,OPENSSL_NO_PADDING
            ,OPENSSL_PKCS1_PADDING
        ))?$decrypted:null;
    }
    /**
     * RSA公钥加密(相对的私钥可以解开)
     * @param $public_key
     * @param $data
     * @return bool|string
     */
    public static function publicEncrypt($public_key,$data){
        if(!is_string($data)){
            return null;
        }
        $res_array = [];
        $str_array = str_split($data,100);
        foreach ($str_array as $key=>$item){
            $bool = openssl_public_encrypt($item,$partialEncrypted,$public_key
//            ,OPENSSL_NO_PADDING
//        ,OPENSSL_PKCS1_PADDING
//        ,OPENSSL_SSLV23_PADDING
//        ,OPENSSL_PKCS1_OAEP_PADDING
            );
            if($bool){
                $res_array[] = base64_encode($partialEncrypted);
            }
        }
        return $res_array;
    }
    /**
     * 生成证书
     * @param int $private_key_bits
     * @return array
     */
    public static function create_rsa($private_key_bits = 4096)
    {
        /**
         * 创建公钥和私钥   返回资源
         */
        $res = openssl_pkey_new([
            //"digest_alg" => "sha512",
            "private_key_bits" => $private_key_bits,                     //字节数    512 1024  2048   4096 等
            "private_key_type" => OPENSSL_KEYTYPE_RSA,     //加密类型 OPENSSL_KEYTYPE_RSA | OPENSSL_PKCS1_PADDING
        ]);
        /**
         * 从得到的资源中获取私钥    并把私钥赋给$privKey
         */
        openssl_pkey_export($res, $privKey);
        /**
         * 从得到的资源中获取公钥    返回公钥 $pubKey
         */
        $pubKey = openssl_pkey_get_details($res);
        return [
            'privKey'=>$privKey,
            'public'=>$pubKey['key'],
            'bits'=>$pubKey['bits'],
//        'rsa'=>$pubKey['rsa'],
        ];
    }
}