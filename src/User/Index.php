<?php
namespace OCAP\InstantMessaging\User;
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
     * API 列表
     */
    CONST API_LISTS = [
        /**
         * 创建(新增)用户
         */
        'create_user'=>'/User/Index/add_user.html',
        /**
         * 获取用户列表
         */
        'get_lists'=>'/User/Index/get_lists.html',
        /**
         * 用户获取(客户端使用的)授权token
         */
        'get_token'=>'/User/Index/get_token.html',
        /**
         * 编辑用户资料
         */
        'edit_user_info'=>'/User/Index/edit_user_info.html',
        /**
         * 启用用户
         */
        'enable_user'=>'/User/Index/enable_user.html',
        /**
         * 禁用用户
         */
        'disable_user'=>'/User/Index/disable_user.html'
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
     * 创建一个用户
     * @param string $account
     * @param int $status
     * @param int $password
     * @param array $user_label
     * @return \Doctrine\Common\Collections\ArrayCollection|string
     * @throws \Throwable
     */
    public function create_user($account,$status,$password,$user_label = [])
    {
        /**
         * 获取api地址
         */
        $api_url = $this -> client -> getConfig('im_service_base').self::API_LISTS['create_user'];
        try{
            /**
             * 请求接口
             */
            $result = Http::request('POST',$api_url) -> withBody([
                'account'=>$account,
                'status'=>$status,
                'password'=>$password,
                'user_label'=>$user_label,
                'token'=>$this -> client -> getToken()
            ]) -> send();
            return $result;
        }catch (\Throwable $throwable){
            throw $throwable;
        }
    }

    /**
     * 获取用户列表
     * @param null|string $keyword
     * @return \Doctrine\Common\Collections\ArrayCollection|string
     * @throws \Throwable
     */
    public function get_lists($keyword = null)
    {
        /**
         * 获取api地址
         */
        $api_url = $this -> client -> getConfig('im_service_base').self::API_LISTS['get_lists'];
        try{
            /**
             * 请求接口
             */
            $result = Http::request('POST',$api_url) -> withBody([
                'keyword'=>$keyword,
                'token'=>$this -> client -> getToken()
            ]) -> send();
            return $result;
        }catch (\Throwable $throwable){
            throw $throwable;
        }
    }

    /**
     * 用户获取(客户端使用的)授权token
     * @param string $account
     * @param string $password
     * @return \Doctrine\Common\Collections\ArrayCollection|string
     * @throws \Throwable
     */
    public function get_token($account,$password = null)
    {
        /**
         * 获取api地址
         */
        $api_url = $this -> client -> getConfig('im_service_base').self::API_LISTS['get_token'];
        try{
            /**
             * 请求接口
             */
            $result = Http::request('POST',$api_url) -> withBody([
                'account'=>$account,
                'password'=>$password,
                'token'=>$this -> client -> getToken()
            ]) -> send();
            return $result;
        }catch (\Throwable $throwable){
            throw $throwable;
        }
    }

    /**
     * 修改资料
     * @param $account
     * @param $nickname
     * @param $sex
     * @param $head_img
     * @param $sign_text
     * @return \Doctrine\Common\Collections\ArrayCollection|string
     * @throws \Throwable
     */
    public function edit_user_info($account,$nickname,$sex,$head_img,$sign_text)
    {
        /**
         * 获取api地址
         */
        $api_url = $this -> client -> getConfig('im_service_base').self::API_LISTS['edit_user_info'];
        try{
            /**
             * 请求接口
             */
            $result = Http::request('POST',$api_url) -> withBody([
                'account'=>$account,
                'nickname'=>$nickname,
                'sex'=>$sex,
                'head_img'=>$head_img,
                'sign_text'=>$sign_text,
                'token'=>$this -> client -> getToken()
            ]) -> send();
            return $result;
        }catch (\Throwable $throwable){
            throw $throwable;
        }
    }

    /**
     * 启用 用户
     * @param $account
     * @return \Doctrine\Common\Collections\ArrayCollection|string
     * @throws \Throwable
     */
    public function enable_user($account)
    {
        /**
         * 获取api地址
         */
        $api_url = $this -> client -> getConfig('im_service_base').self::API_LISTS['enable_user'];
        try{
            /**
             * 请求接口
             */
            $result = Http::request('POST',$api_url) -> withBody([
                'account'=>$account,
                'token'=>$this -> client -> getToken()
            ]) -> send();
            return $result;
        }catch (\Throwable $throwable){
            throw $throwable;
        }
    }

    /**
     * 禁用 用户
     * @param $account
     * @return \Doctrine\Common\Collections\ArrayCollection|string
     * @throws \Throwable
     */
    public function disable_user($account)
    {
        /**
         * 获取api地址
         */
        $api_url = $this -> client -> getConfig('im_service_base').self::API_LISTS['disable_user'];
        try{
            /**
             * 请求接口
             */
            $result = Http::request('POST',$api_url) -> withBody([
                'account'=>$account,
                'token'=>$this -> client -> getToken()
            ]) -> send();
            return $result;
        }catch (\Throwable $throwable){
            throw $throwable;
        }
    }
}