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
     * 接口列表
     */
    CONST API_LISTS = [
        /**
         * 创建群组api
         */
        'create_group_api_url'=>"/Group/Index/create_group.html",
        /**
         * 获取群组信息
         */
        'get_group_info_api_url'=>"/Group/Index/get_info.html",
        /**
         * 解散群组
         */
        'disband_group_info_api_url'=>"/Group/Index/disband_group.html",
        /**
         * 开启全员禁言
         */
        'open_all_disable_message_api_url'=>"/Group/Index/open_all_disable_message.html",
        /**
         * 关闭全员禁言
         */
        'close_all_disable_message_api_url'=>"/Group/Index/close_all_disable_message.html",
        /**
         * 获取群组是否可以发送消息
         */
        'group_is_open_message_api_url'=>"/Group/Index/group_is_open_message.html",
        /**
         * 获取群组列表
         */
        'get_group_lists_api_url'=>"/Group/Index/get_lists.html",
    ];
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
            /**
             * 获取api地址
             */
            $api_url = $this -> client -> getConfig('im_service_base').self::API_LISTS['create_group_api_url'];
            /**
             * 请求接口
             */
            $result = Http::request('POST',$api_url) -> withBody([
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
     * 获取群组信息
     * @param $group_id
     * @return \Doctrine\Common\Collections\ArrayCollection|string
     * @throws \Throwable
     */
    public function get_info($group_id)
    {
        try{
            /**
             * 获取api地址
             */
            $api_url = $this -> client -> getConfig('im_service_base').self::API_LISTS['get_group_info_api_url'];
            /**
             * 请求接口
             */
            $result = Http::request('POST',$api_url) -> withBody([
                'group_id'=>$group_id,
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
            /**
             * 获取api地址
             */
            $api_url = $this -> client -> getConfig('im_service_base').self::API_LISTS['get_group_lists_api_url'];
            /**
             * 请求接口
             */
            $result = Http::request('POST',$api_url) -> withBody([
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

    /**
     * 解散群组
     * @param $group_id
     * @return \Doctrine\Common\Collections\ArrayCollection|string
     * @throws \Throwable
     */
    public function disband_group($group_id)
    {
        try{
            /**
             * 获取api地址
             */
            $api_url = $this -> client -> getConfig('im_service_base').self::API_LISTS['disband_group_info_api_url'];
            /**
             * 请求接口
             */
            $result = Http::request('POST',$api_url) -> withBody([
                'group_id'=>$group_id,
                'token'=>$this -> client -> getToken()
            ]) -> send();
            return $result;
        }catch (\Throwable $throwable){
            throw $throwable;
        }
    }

    /**
     * 开启全员禁言
     * @param $group_id
     * @return \Doctrine\Common\Collections\ArrayCollection|string
     * @throws \Throwable
     */
    public function open_all_disable_message($group_id)
    {
        try{
            /**
             * 获取api地址
             */
            $api_url = $this -> client -> getConfig('im_service_base').self::API_LISTS['open_all_disable_message_api_url'];
            /**
             * 请求接口
             */
            $result = Http::request('POST',$api_url) -> withBody([
                'group_id'=>$group_id,
                'token'=>$this -> client -> getToken()
            ]) -> send();
            return $result;
        }catch (\Throwable $throwable){
            throw $throwable;
        }
    }

    /**
     * 关闭全员禁言
     * @param $group_id
     * @return \Doctrine\Common\Collections\ArrayCollection|string
     * @throws \Throwable
     */
    public function close_all_disable_message($group_id)
    {
        try{
            /**
             * 获取api地址
             */
            $api_url = $this -> client -> getConfig('im_service_base').self::API_LISTS['close_all_disable_message_api_url'];
            /**
             * 请求接口
             */
            $result = Http::request('POST',$api_url) -> withBody([
                'group_id'=>$group_id,
                'token'=>$this -> client -> getToken()
            ]) -> send();
            return $result;
        }catch (\Throwable $throwable){
            throw $throwable;
        }
    }

    /**
     * 群组是否可以发送消息
     * @param $group_id
     * @return \Doctrine\Common\Collections\ArrayCollection|string
     * @throws \Throwable
     */
    public function group_is_open_message($group_id)
    {
        try{
            /**
             * 获取api地址
             */
            $api_url = $this -> client -> getConfig('im_service_base').self::API_LISTS['group_is_open_message_api_url'];
            /**
             * 请求接口
             */
            $result = Http::request('POST',$api_url) -> withBody([
                'group_id'=>$group_id,
                'token'=>$this -> client -> getToken()
            ]) -> send();
            return $result;
        }catch (\Throwable $throwable){
            throw $throwable;
        }
    }
}