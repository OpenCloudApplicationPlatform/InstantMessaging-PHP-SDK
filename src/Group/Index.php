<?php
namespace OCAP\InstantMessaging\Group;
use OCAP\InstantMessaging\Auth\Client;
use OCAP\InstantMessaging\Bridge\Http;

/**
 * 群组相关操作
 * Class Index
 * @package OCAP\InstantMessaging\Group
 */
class Index
{
    /**
     * 授权客户端
     * @var null|Client
     */
    protected $client = null;
    /**
     * 创建群组api
     * @var string
     */
    protected static $create_group_api_url = "http://im.service.open-cloud-api.com/Group/Index/create_group.html";
    /**
     * 获取群组列表
     * @var string
     */
    protected static $get_group_lists_api_url = "http://im.service.open-cloud-api.com/Group/Index/get_lists.html";
    /**
     * 实例化群组相关操作
     * Index constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this -> client = $client;
    }

    /**
     * 创建群组
     * @param $name
     * @param $icon
     * @param $desc
     * @param $join_check
     * @param $message
     * @return \Doctrine\Common\Collections\ArrayCollection|string
     * @throws \Throwable
     */
    public function create_group($name,$icon,$desc,$join_check,$message)
    {
        try{
            $result = Http::request('POST',self::$create_group_api_url) -> withBody([
                'name'=>$name,
                'icon'=>$icon,
                'desc'=>$desc,
                'join_check'=>$join_check,
                'message'=>$message,
                'token'=>$this -> client -> getToken()
            ]) -> send();
            return $result;
        }catch (\Throwable $throwable){
            throw $throwable;
        }
    }

    /**
     * 获取群组列表
     * @param null $join_check
     * @param null $keyword
     * @param int $page_num
     * @param int $index
     * @return \Doctrine\Common\Collections\ArrayCollection|string
     * @throws \Throwable
     */
    public function group_lists($join_check=null,$keyword=null,$page_num=20,$index=1)
    {
        try{
            $result = Http::request('POST',self::$get_group_lists_api_url) -> withBody([
                'page_num'=>$page_num,
                'index'=>$index,
                'keyword'=>$keyword,
                'join_check'=>$join_check,
                'token'=>$this -> client -> getToken()
            ]) -> send();
            return $result;
        }catch (\Throwable $throwable){
            throw $throwable;
        }
    }
}