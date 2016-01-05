<?php session_start();
if ($_POST) {
	require_once "config.php";
  require_once 'DAO.php';
	if (isset($_POST['userid'])) {
		$username = $_POST['userid'];
		$password = $_POST['password'];
    $db=new DB();
    //查询
    $data['user_id'] = $username;
    $judge['user_id'] = '=';
    list($conSql, $mapConData) = $db->FDFields($data, 'and', $judge);
    $mData = $db->fetch('select * from tb_users where ' . $conSql, $mapConData);
    //var_dump($mData);
    if($mData==false){
      $_SESSION['error'] = "username is not valid!";
    }else if($mData['user_pwd']==$password){
      $_SESSION['username'] = $_POST['userid'];
      $_SESSION['email'] = $mData['user_email'];
      $_SESSION['identity'] = $mData['user_identity'];
      $_SESSION['img'] = $mData['user_img'];
    }else{
      $_SESSION['error'] = "password is not right!";
    }
	}
}
if (!isset($_SESSION['username'])) {
	header('Location: index.php#loginSub');
}
?>
<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User page | Training Lab</title>
  <meta name="description" content="This is a user page">
  <meta name="keywords" content="user">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="assets/css/admin.css">
  <script type="text/javascript" src="js/Tab.js"></script>
  <!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/app.js"></script>
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar admin-header">
  <div class="am-topbar-brand">
    <strong>Training Lab</strong> <small>User's Home</small>
  </div>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
      <!-- <li><a href="javascript:;"><span class="am-icon-envelope-o"></span> 收件箱 <span class="am-badge am-badge-warning">5</span></a></li> -->
      <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
          <span class="am-icon-users"></span> <?php print($_SESSION['username'])?> <span class="am-icon-caret-down"></span>
        </a>
        <ul class="am-dropdown-content">
          <li><a href="user-info.php"><span class="am-icon-user"></span> Information</a></li>
          <li><a href="#"><span class="am-icon-cog"></span> Setting</a></li>
          <li><a href="logout.php"><span class="am-icon-power-off"></span> LogOut</a></li>
        </ul>
      </li>
      <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">Full Screen</span></a></li>
    </ul>
  </div>
</header>

<div class="am-cf admin-main">
  <!-- sidebar start******************************************************* -->
  <?php require_once "include/sidebar.php";?>
  <!-- sidebar end -->

  <!-- content start -->
  <div class="admin-content">
    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Home</strong> / <small>Training Lab</small></div>
    </div>

    <hr style="margin-top:0px;"/>

    <div class="am-g">

      <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
        <div class="am-panel am-panel-default">
          <div class="am-panel-bd">
            <div class="am-g">
              <div class="am-u-md-4">
              <?php
$img = "userdata/img/" . $_SESSION['img'];
if ($_SESSION['img'] == '') {
	print("<img class='am-img-circle am-img-thumbnail' src='http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg?imageView/1/w/200/h/200/q/80' alt=''/>");
} else {
	print("<img class='am-img-circle am-img-thumbnail' src='$img' alt=''/>");
}

?>

              </div>
              <div class="am-u-md-8">
                <p >User:<a href="user-info.php"> <?php echo $_SESSION["username"];?></a></p>
                <p style="margin:0rem;-webkit-margin:0px;"><a href="#"> <?php echo $_SESSION["email"];?></a></p>
                <!-- <form class="am-form">
                  <div class="am-form-group">
                    <input type="file" id="user-pic">
                    <p class="am-form-help">请选择要上传的文件...</p>
                    <button type="button" class="am-btn am-btn-primary am-btn-xs">保存</button>
                  </div>
                </form> -->
              </div>
            </div>
          </div>
        </div>

        <div class="am-panel am-panel-default">
          <div class="am-panel-bd">
            <div class="user-info">
              <p>等级信息</p>
              <div class="am-progress am-progress-sm">
                <div class="am-progress-bar" style="width: 60%"></div>
              </div>
              <p class="user-info-order">当前等级：<strong>LV8</strong> 活跃天数：<strong>587</strong> 距离下一级别：<strong>160</strong></p>
            </div>
            <div class="user-info">
              <p>信用信息</p>
              <div class="am-progress am-progress-sm">
                <div class="am-progress-bar am-progress-bar-success" style="width: 80%"></div>
              </div>
              <p class="user-info-order">信用等级：正常当前 信用积分：<strong>80</strong></p>
            </div>
          </div>
        </div>

      </div>
      <!-- 999999999999999999999999999999999999999999999999999999999 -->
      <div id="mainDiv" class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
        <!-- <div class="am-g"><div class="am-u-sm-4 am-u-sm-centered"><h1 >Welcome <?php print($_SESSION["username"]);?>!</h1></div></div> -->
        <!-- <div class="am-g">
          <div class="am-u-sm-4"><div class="am-panel am-panel-default">Last Feedback
          <hr/>
          </div></div>
          <div class="am-u-sm-4"><div class="am-panel am-panel-default">Last Job
          <hr/>
          </div></div>
          <div class="am-u-sm-4"><div class="am-panel am-panel-default">Last News
          <hr/>
          </div></div>
        </div> -->
        <!-- <div class="am-panel am-panel-default admin-sidebar-panel">
        <div class="am-panel-bd">
          <p><span class="am-icon-bookmark"></span> Announcement</p>
          <p style="word-break:break-all;">
            <?php
              //$file=fopen('Notification.txt', 'r');
             //echo fread($file,"280");
             // fclose($file);
            ?>
          </p>
        </div>
      </div> -->
      </div>
    </div>
  </div>
  <!-- content end -->
  <div class="am-modal am-modal-alert" tabindex="-1" id="my-alert">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">Message</div>
    <div class="am-modal-bd">
      <iframe name="msg" id='msg'></iframe>
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn">确定</span>
    </div>
  </div>
</div>
</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<footer>
  <hr>
  <p class="am-padding-left">© 2015 Training Lab, Inc. Licensed under MIT license.</p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->


<script>
window.onhashchange=function(){
  var hash = window.location.hash.replace( /^[^#]*#?(.*)$/, '$1' );
  // alert(hash);
  if(hash!='#'&&hash!='##')changeDiv('#mainDiv',hash);
};
window.onload=function(){
  var hash = window.location.hash.replace( /^[^#]*#?(.*)$/, '$1' );
   //alert(hash);
   if(hash=='')hash='user-index.php';
  if(hash!='#'&&hash!='##')changeDiv('#mainDiv',hash);
};
</script>
</body>
</html>
