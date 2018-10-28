<?php
namespace OCAP\InstantMessaging\Greoup;
use OCAP\InstantMessaging\Auth\Client;

/**
 * 群组相关操作
 * Class Index
 * @package OCAP\InstantMessaging\Greoup
 */
class Index
{
    /**
     * 授权客户端
     * @var null|Client
     */
    protected $client = null;
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
     * @param $tourist_message
     * @param $tourist_join
     * @param $message
     */
    public function create_group($name,$icon,$desc,$join_check,$tourist_message,$tourist_join,$message)
    {
        $this -> client -> get_token();
    }

    /**
     * 获取群组列表
     */
    public function group_lists()
    {

    }
}