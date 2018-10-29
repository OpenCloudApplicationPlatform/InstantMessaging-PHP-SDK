<?php
namespace OCAP\InstantMessaging\Bridge;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * 包的配置
 * Class Config
 * @package OCAP\InstantMessaging\Bridge
 */
class Config
{
    /**
     * API 版本
     */
    CONST API_VERSION = 'v1';
    /**
     * SDK 版本
     */
    CONST SDK_VERSION = '0.0.0.1';
    /**
     * 配置
     * @var array
     */
    protected $config = [];

    /**
     * 配置实例
     * Config constructor.
     * @param array $array
     */
    public function __construct($array = [])
    {
        /**
         * 用户端的公钥文件和文本的兼容
         */
        if(is_file($array['rsa_public'])){
            $array['rsa_public'] = file_get_contents($array['rsa_public']);
        }
        /**
         * 加密数据
         */
        $array['access_key'] = RSA::publicEncrypt($array['rsa_public'],$array['access_key']);
        $this -> config = new ArrayCollection($array);
    }

    /**
     * 获取配置
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this -> config[$name];
    }
}