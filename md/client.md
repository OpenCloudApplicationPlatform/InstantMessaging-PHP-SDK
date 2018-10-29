### 获取 Client

``Client`` 是本SDK内所有接口的一个基础参数

```php
// 获取配置
$config = new \OCAP\InstantMessaging\Bridge\Config([
    // 应用id
    'app_id'=>'yZn6ezqm7JGr59BtHuSERPaKWjAhxY3i',
    // 应用秘钥
    'access_key'=>'NA3UsCRyI6Z9wtEdMf2hVJXPYScxT584KDeaHnkujigmQpqFbGvrz7WB',
    // RSA公钥
    'rsa_public'=>'-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDnbL7NV9hjB4Oo44LzyyzXFoZr
7VazdFFA15nPxEiRX13f9IpGardXMlcCI1Lu5XtF6Vgd+LHPqodb/cOs7IDL9N3A
qO1yzMQ1wUw68CjvIpviBi5CnXjoBCfTusrWfqwA2BDcG94HQpwpHg2b+05TUh6A
oFQtir22s/ZAUoPN8wIDAQAB
-----END PUBLIC KEY-----'
]);
// 获取授权实例
$clinet = new \OCAP\InstantMessaging\Auth\Client($config);
```