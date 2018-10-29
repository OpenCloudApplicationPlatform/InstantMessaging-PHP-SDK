### 创建群组

创建一个群组，可以用来用户群聊，或者用于直播的文字互动。



```php
(new \OCAP\InstantMessaging\Group\Index($clinet)) -> create_group('测试群组',null,'测试测试群组群组',1,1);

```
##### 参数
字段|默认值|是否必填|类型|备注|实例|
|:------:|:------:|:------:|:------:|:------:|:------:|
|name|无|是|String|群组名称|测试群组
|icon|空|否|String|群组头像|http://www.xxx.com/head.jpg
|desc|空|否|String|群组描述|这里是群组的描述
|join_check|无|是|Int|加群验证规则1=不用验证,2=需要验证,3=不允许任何人加入|1
|message|无|是|Int|消息状态1=正常发言,2=禁止发言(全员禁言)|1

```

### 获取群组信息 TODO

### 搜索群 TODO

### 获取群列表 TODO 
