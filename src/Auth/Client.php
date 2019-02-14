<?php
namespace OCAP\InstantMessaging\Auth;
use OCAP\InstantMessaging\Bridge\CacheTrait;
use OCAP\InstantMessaging\Bridge\Config;
use OCAP\InstantMessaging\Bridge\Http;

/**
 * Class Client
 * @package OCAP\InstantMessaging\Bridge
 */
class Client
{
    /**
     * 使用缓存工具类
     */
    use CacheTrait;
    /**
     * @var string
     */
    protected $auth_api_url = 'https://auth-sys.open-cloud-api.com/Client/Auth/get_token.html';
    /**
     * SDK 配置
     * @var null|Config
     */
    protected $config = null;

    /**
     * Client constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this -> config = $config;
    }

    /**
     * 获取配置实例
     * @param null $name
     * @return null|Config
     */
    public function getConfig($name=null)
    {
        if($name != null){
            return $this -> config -> {$name};
//            return isset($this -> config -> {$name})?$this -> config -> {$name}:null;
        }else{
            return $this -> config;
        }
    }

    /**
     * 获取token
     * @return mixed
     * @throws \Throwable
     */
    public function getToken()
    {
        // 获取缓存内的token
        if(strlen($token = $this -> getCache() -> fetch('OCAP_InstantMessagingAuthToken_'.Config::API_VERSION.'_'.Config::SDK_VERSION)) < 1){
            // TODO 重新获取token
            try{
                /**
                 * 请求接口
                 */
                $res = Http::request('POST','https://im-service.open-cloud-api.com/Auth/Index/get_token.html') ->
                    withBody(array(
                        'app_id'=>$this -> config -> app_id,
                        'access_key'=>$this -> config -> access_key
                    )) ->
                    send();
                /**
                 * 判断是否请求成功
                 */
                if($res['status'] != 200){
                    throw new \Exception($res['msg']);
                }
                /**
                 * 存储token
                 */
                $this -> getCache() ->save('OCAP_InstantMessagingAuthToken_'.Config::API_VERSION.'_'.Config::SDK_VERSION,$res['token'],time()-strtotime($res['expire']));
                /**
                 * 验证token
                 */
                if((!isset($res['token'])) || strlen($res['token']) < 1){
                    throw new \Exception($res['msg']);
                }
                /**
                 * 赋值
                 */
                $token = $res['token'];
            }catch (\Throwable $throwable){
                throw $throwable;
            }
        }
        return $token;
    }
}