# Txdie
Typecho 屏蔽QQ与微信内置浏览器插件 Txdie(修改版)
## 前言
2023 年
我从一个网站上找到了一个**Typecho 屏蔽QQ与微信内置浏览器插件 Txdie**

可惜不能正常使用，还报错。

```md
Warning: Undefined array key "HTTPS" in 略 on line 9
```

其它网站上也没有类似的插件。之后我随便修改了一下。

报错来源：

```php
<?php
$conf['qqjump']=1;
if(strpos($_SERVER['HTTP_USER_AGENT'], 'QQ/')||strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger')!==false && $conf['qqjump']==1){
    //$siteurl='http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
function curPageURL() 
{
  $pageURL = 'http';
 
  if ($_SERVER["HTTPS"] == "on") 
  {
    $pageURL .= "s";
  }
  $pageURL .= "://";
 
  if ($_SERVER["SERVER_PORT"] != "80") 
  {
    $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
  } 
  else
  {
    $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
  }
  return $pageURL;
}
    $siteurl=curPageURL();
?>
```

修改后：

```
<?php
$conf['qqjump'] = 1;
if (strpos($_SERVER['HTTP_USER_AGENT'], 'QQ/') || strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false && $conf['qqjump'] == 1) {
  //$siteurl='http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
  function curPageURL()
  {
    $pageURL = 'http';
    if (isset($_SERVER["HTTPS"])) {
      $pageURL .= "s";
    }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
      $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
      $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
  }
  $siteurl = curPageURL();
?>
```
改完之后，我进行了一些简单的离线处理，取消了一些没有用的功能，最终大功告成

## 参考来源
https://www.typecho.wiki/typecho-blocks-qq-and-wechat-builtin-browser-plugin-txdie.html
