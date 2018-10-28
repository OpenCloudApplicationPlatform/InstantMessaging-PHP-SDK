<?php
namespace OCAP\InstantMessaging\Auth;
use OCAP\InstantMessaging\Bride\CacheTrait;
use OCAP\InstantMessaging\Bride\Config;
use OCAP\InstantMessaging\Bride\Http;

/**
 * Class Client
 * @package OCAP\InstantMessaging\Bride
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
    protected $auth_api_url = '';
    /**
     * @var null|string
     */
    protected $app_id = null;
    /**
     * @var null|string
     */
    protected $app_key = null;

    /**
     * Index constructor.
     * @param string $app_id 应用id
     * @param string $app_key 应用秘钥
     */
    public function __construct($app_id,$app_key)
    {
        $this -> app_id = $app_id;
        $this -> app_key = $app_id;
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
                $res = Http::request('POST',$this -> auth_api_url) -> withBody(['app_id'=>$this -> app_id,'app_key'=>$this -> app_key]) ->send();
                /**
                 * 判断是否请求成功
                 */
                if($res -> status != 200){
                    throw new \Exception($res -> msg);
                }
                /**
                 * 存储token
                 */
                $this -> getCache() ->save('OCAP_InstantMessagingAuthToken_'.Config::API_VERSION.'_'.Config::SDK_VERSION,$res['token'],time()-$res['expire']);
                /**
                 * 验证token
                 */
                if((!isset($res['token'])) || strlen($res['token'])){
                    throw new \Exception('获取TokenId 失败');
                }
            }catch (\Throwable $throwable){
                throw $throwable;
            }
        }
        return $token;
    }
}