### 获取 Config 实例

``Config`` 是操作创建``Client``的几个基础参数

```php
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
-----END PUBLIC KEY-----'// 可为文件路径
]);
```