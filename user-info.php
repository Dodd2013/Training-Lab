<?php session_start();
$_msg = "";
if (!isset($_SESSION['username'])) {
	header('Location: index.php#loginSub');
}
if ($_POST) {
	require_once "config.php";
	//print_r($_POST);
	//print_r($_FILES);
	$h = "";
	$username = $_SESSION['username'];
	$con = mysql_connect($DB_IP, $DB_USER, $DB_PASSWORD);
	mysql_select_db($DB_NAME);
	if ($_FILES["user-pic"]['name'] != '') {
		if ($_FILES["user-pic"]["type"] == "image/gif") {
			$h = ".gif";
		}

		if ($_FILES["user-pic"]["type"] == "image/jpeg") {
			$h = ".jpg";
		}

		if ($_FILES["user-pic"]["type"] == "image/pjpeg") {
			$h = ".png";
		}

		$picname = date("Y_m_d_h_i_s") . $_SESSION['username'] . $h;
		if ((($_FILES["user-pic"]["type"] == "image/gif")
			|| ($_FILES["user-pic"]["type"] == "image/jpeg")
			|| ($_FILES["user-pic"]["type"] == "image/pjpeg")
			|| ($_FILES["user-pic"]["type"] == "image/png"))
			&& ($_FILES["user-pic"]["size"] < 100000)) {
			if ($_FILES["user-pic"]["error"] > 0) {
				$_msg .= "Return Code: " . $_FILES["user-pic"]["error"] . "<br />";
			} else {
				if (file_exists("userdata/img/" . $picname)) {
					$_msg .= $picname . " already exists. ";
				} else {
					move_uploaded_file($_FILES["user-pic"]["tmp_name"],
						"userdata/img/" . $picname);
					//$_msg.= "Stored in: " . "userdata/img/" . $picname;
					$sql = "update users set img='$picname' where userid='$username';";
					//print($sql);
					if (mysql_query($sql)) {
						$_msg .= "change img succeed!\\n";
					}

					$_SESSION['img'] = $picname;
				}
			}
		} else {
			$_msg .= "Invalid file\\n";
		}
		if ($_FILES["user-pic"]["error"] > 0) {
			$_msg .= "Error: " . $_FILES["user-pic"]["error"] . "\\n";
		}
	}
	if ($_POST['oldpwd'] != '') {
		$res = mysql_query("select * from users where userid='$username'");
		$row = false;
		if (is_resource($res)) {
			$row = mysql_fetch_array($res);
		}
		//if($row&&$row['pwd']==$password){
		$oldpwd = $_POST['oldpwd'];
		$newpwd = $_POST['newpwd'];
		$confimpwd = $_POST['confimpwd'];
		if ($newpwd != $confimpwd) {
			$_msg .= "Confim Password is not right!\\n";
		} else if ($oldpwd != $row['pwd']) {
			$_msg .= "Old Password is not right!\\n";
		} else if (strlen($newpwd) < 6) {
			$_msg .= "New Password is not long then 6 chars!\\n";
		} else {
			$sql = "update users set pwd='$newpwd' where userid='$username';";
			if (mysql_query($sql)) {
				$_msg .= "change password succeed!\\n";
			}

		}
	}
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
  <!-- sidebar start -->
  <?php require_once "include/sidebar.php";?>
  <!-- sidebar end -->

  <!-- content start -->
  <div class="admin-content">
    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Personal information</strong> / <small>个人资料</small></div>
    </div>

    <hr/>

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

      <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">

        <form class="am-form am-form-horizontal" method="post" action="user-info.php" enctype="multipart/form-data">
        <div class="am-panel am-panel-default">
          <div class="am-panel-bd">
            <div class="am-g">
              <div class="am-u-md-4">
                <?php
$img = "userdata/img/" . $_SESSION['img'];
if ($_SESSION['img'] == '') {
	print("<img id='imgc' class='am-img-circle am-img-thumbnail' src='http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg?imageView/1/w/200/h/200/q/80' alt=''/>");
} else {
	print("<img id='imgc' class='am-img-circle am-img-thumbnail' src='$img' alt=''/>");
}

?>
               </div>
              <div class="am-u-md-8">
                <p>Upload your head portrait!</p>
                  <div class="am-form-group">
                    <input type="file" id="user-pic" name='user-pic' >
                    <p class="am-form-help">Plese select the picture...</p>
                  </div>
              </div>
            </div>
          </div>
        </div>
          <div class="am-form-group">
            <label for="user-oldpwd" class="am-u-sm-3 am-form-label">Old Password</label>
            <div class="am-u-sm-9">
              <input type="password" id="user-oldpwd" name='oldpwd' placeholder="输入你的旧密码">
            </div>
          </div>
          <div class="am-form-group">
            <label for="user-newpwd" class="am-u-sm-3 am-form-label">New Password</label>
            <div class="am-u-sm-9">
              <input type="password" id="user-newpwd" name='newpwd' placeholder="输入你的新密码">
            </div>
          </div>
          <div class="am-form-group">
            <label for="user-confimpwd" class="am-u-sm-3 am-form-label">Confim Password</label>
            <div class="am-u-sm-9">
              <input type="password" id="user-confimpwd" name='confimpwd' placeholder="再次输入新密码">
            </div>
          </div>
          <div class="am-form-group">
            <div class="am-u-sm-9 am-u-sm-push-3">
              <button type="submit" class="am-btn am-btn-primary">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- content end -->

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

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="assets/js/amazeui.min.js"></script>
<script>
document.getElementById('user-pic').onchange = function(evt) {
    // 如果浏览器不支持FileReader，则不处理
    if (!window.FileReader) return;
    var files = evt.target.files;
    for (var i = 0, f; f = files[i]; i++) {
        if (!f.type.match('image.*')) {
            continue;
        }
        var reader = new FileReader();
        reader.onload = (function(theFile) {
            return function(e) {
                // img 元素
                document.getElementById('imgc').src = e.target.result;
            };
        })(f);
        reader.readAsDataURL(f);
    }
}
</script>
<?php if ($_msg != '') {
	$ang = "<script>alert('$_msg');</script>";
	print($ang);}
?>
<script src="assets/js/app.js"></script>
</body>
</html>
