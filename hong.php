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
?><html>

  <head>
    <meta charset="UTF-8">
    <title>使用浏览器打开</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta name="format-detection" content="telephone=no">
    <meta content="false" name="twcClient" id="twcClient">
    <meta name="aplus-touch" content="1">
    <meta name="referrer" content="no-referrer" />
    <style>
      body,
      html {
        width: 100%;
        height: 100%
      }

      * {
        margin: 0;
        padding: 0
      }

      body {
        background-color: #fff
      }


      #contens {
        font-weight: bold;
        margin: -285px 0px 10px;
        text-align: center;
        font-size: 20px;
        margin-bottom: 125px;
      }

      .top-bar-guidance {
        font-size: 15px;
        color: #fff;
        height: 70%;
        line-height: 1.8;
        padding-left: 20px;
        padding-top: 20px;
        background: url(/usr/plugins/Txdie/TB1eSZaNF.png) center top/contain no-repeat
      }

      .top-bar-guidance .icon-safari {
        width: 25px;
        height: 25px;
        vertical-align: middle;
        margin: 0 .2em
      }

      .app-download-tip {
        margin: 0 auto;
        width: 290px;
        text-align: center;
        font-size: 15px;
        color: #2466f4;
        background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAcAQMAAACak0ePAAAABlBMVEUAAAAdYfh+GakkAAAAAXRSTlMAQObYZgAAAA5JREFUCNdjwA8acEkAAAy4AIE4hQq/AAAAAElFTkSuQmCC) left center/auto 15px repeat-x
      }

      .app-download-tip .guidance-desc {
        background-color: #fff;
        padding: 0 5px
      }

      .app-download-btn {
        display: block;
        width: 214px;
        height: 40px;
        line-height: 40px;
        margin: 18px auto 0 auto;
        text-align: center;
        font-size: 18px;
        color: #2466f4;
        border-radius: 20px;
        border: .5px #2466f4 solid;
        text-decoration: none
      }
    </style>

  </head>

  <body>
    <div class="top-bar-guidance">
      <p>点击右上角<img src="/usr/plugins/Txdie/TB1xwiUNp-55-55.png" class="icon-safari"> <span id="openm">浏览器打开</span></p>
      <p>可以继续浏览本站哦~</p>
    </div>
    <a style="display: none;" href="" id="vurl" rel="noreferrer"></a>
    <div id="contens">
      为了提升用户体验<br /><br />
      建议使用浏览器打开本站<br /><br />
    </div>


    <div class="app-download-tip">
      <span class="guidance-desc"><?php echo $siteurl; ?></span>
    </div>
    <script src="/usr/plugins/Txdie/clipboard.min.js"></script>
    <script src="/usr/plugins/Txdie/layer.min.js"></script>
    <a data-clipboard-text="<?php echo $siteurl; ?>" class="app-download-btn">点此复制本站网址</a>
    <script type="text/javascript">
      new ClipboardJS(".app-download-btn");
      $(".app-download-btn").click(function() {
        layer.tips("复制成功，么么哒", ".app-download-btn", {
          tips: [3, "rgb(38,111,250)"],
          time: 500
        });
      })
    </script>

    <script>
      function openu(u) {
        document.getElementById("vurl").href = u;
        document.getElementById("vurl").click();
      }
      var url = window.location.href;
      if (navigator.userAgent.indexOf("QQ/") > -1) {
        openu("ucbrowser://" + url);
        openu("mttbrowser://url=" + url);
        openu("baiduboxapp://browse?url=" + url);
        openu("googlechrome://browse?url=" + url);
        openu("mibrowser:" + url);
        //openu("taobao://"+url.split("://")[1]);
        //openu("alipays://platformapi/startapp?appId=20000067&url="+url);
        $("html").on("click", function() {
          openu("ucbrowser://" + url);
          openu("mttbrowser://url=" + url);
          openu("baiduboxapp://browse?url=" + url);
          openu("googlechrome://browse?url=" + url);
          openu("mibrowser:" + url);
          //openu("taobao://"+url.split("://")[1]);
          //openu("alipays://platformapi/startapp?appId=20000067&url="+url);
        });
      } else if (navigator.userAgent.indexOf("MicroMessenger") > -1) {
        if (navigator.userAgent.indexOf("Android") > -1) {
          var iframe = document.createElement("iframe");
          iframe.style.display = "none";
          document.body.appendChild(iframe);
        } else {

        }
      }
    </script>

  </html>
<?php exit;
}
$random = rand(1, 15); ?>