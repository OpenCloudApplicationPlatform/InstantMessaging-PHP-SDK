<?php
namespace OCAP\InstantMessaging\Bridge;
/**
 * Class Util
 * @package OCAP\InstantMessaging\Bridge
 */
class Util
{
    /**
     * 过滤微信昵称中的表情（不过滤 HTML 符号）
     */
    public static function filterNickname($nickname)
    {
        $pattern = array(
            '/\xEE[\x80-\xBF][\x80-\xBF]/',
            '/\xEF[\x81-\x83][\x80-\xBF]/',
            '/[\x{1F600}-\x{1F64F}]/u',
            '/[\x{1F300}-\x{1F5FF}]/u',
            '/[\x{1F680}-\x{1F6FF}]/u',
            '/[\x{2600}-\x{26FF}]/u',
            '/[\x{2700}-\x{27BF}]/u',
            '/[\x{20E3}]/u'
        );
        $nickname = preg_replace($pattern, '', $nickname);
        return trim($nickname);
    }
}