<?php 
  session_start();
  if (!isset($_SESSION['username'])) {
  	header('Location: index.php#loginSub');
  }
  if($_POST){
    $postnum=count($_POST);
    //print($_SESSION['msg']);
    if($_POST['types']!='3'&&$postnum<=2){
      $_SESSION['msg']="No answer here!";
    }else{
    require_once 'DAO.php';
    $db=new DB();
    $inData['pro_des'] = $_POST['des'];
    $inData['pro_type'] = $_POST['types'];
    $inData['pro_create_user'] = $_SESSION['username'];
    $inData['pro_create_time'] = date('y-m-d h:i:s',time());
    $ret = $db->insert('tb_problems', $inData,true);
    if($ret)$_SESSION['msg']="Add problem success! Let us add more!";
    else $_SESSION['msg']="Add problem Failure!";
    if($_POST['types']!='3'&&$ret){
      $ans=array_slice($_POST,2);
      //print_r($ans);
      $ansData['pro_id']=$ret;
      foreach ($ans as $key => $value) {
        $ansData['ans']=$value;
        if(!$db->insert('tb_ans', $ansData))die("can't!");
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
  <title>New problem | Training Lab</title>
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
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">New feedback problem</strong> / <small>Training Lab</small></div>
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
      <!-- 999999999999999999999999999999999999999999999999999999999 -->
      <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
        <div class="am-u-sm-centered">
          <form class="am-form" method="post" action="newproblem.php" id='form1'>
            <div class="am-form-group">
                  <label for="doc-ta-1">Description:</label>
                  <textarea class="" rows="5" id="doc-ta-1" name="des" placeholder="Description"></textarea>
            </div>
            <div class="am-btn-group doc-js-btn-1" data-am-button>
              <label class="am-btn am-btn-primary">
                <input type="radio" name="types" value="1" id="option1"> Radio Problem
              </label>
              <label class="am-btn am-btn-primary">
                <input type="radio" name="types" value="2" id="option2"> Checkbox Problem
              </label>
              <label class="am-btn am-btn-primary am-active">
                <input type="radio" name="types" value="3" id="option3" checked> Write
              </label>
<!--               <label class="am-btn am-btn-primary am-disabled">
                <input type="radio" name="types" value="选项 4" id="option4"> 选项 4
              </label> -->
            </div>
            <div id='adddiv'>
              
            </div>
            <p><button type="submit" class="am-btn am-btn-default">Submit</button></p>
          </form>
        </div>
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

<script src="assets/js/app.js"></script>
<script>
  var checked=3;
  var flag=0;
  var num=1;
  function addbtn(){
    var add="<div id='addansdiv'><a id='addansbtn' href='##' class='am-icon-md am-secondary am-icon-plus-square'></a><label>   Click plus to add answer...</label></div>";
    $("#adddiv").after(add);
    $("#addansbtn").click(function(){
      add="<input class='am-form-field am-input-sm' style='margin:5px;' type='text' placeholder='Enter the answer"+num+". ' name='ans"+num+"'>";
      num++;
      $("#adddiv").append(add);
      flag=1;
    });
  }
  $(document).ready(function() {
        $("input[name='types']").change(function() {
          var $selectedvalue = $("input[name='types']:checked").val();
           //alert($selectedvalue);
           if(flag){
            $("#adddiv").html("");
            num=1;
          }
          if ($selectedvalue == '1') {
            //alert('1');
              $("#addansdiv").remove();
              addbtn();
          }
          if ($selectedvalue == '2') {
            //alert('2');
            $("#addansdiv").remove();
              addbtn();
              
          }
          if ($selectedvalue == '3') {
            $("#addansdiv").remove();
          }
        });
  });
</script>
<script>
  <?php if(isset($_SESSION["msg"])){ $msg=$_SESSION["msg"];print("alert('$msg');");unset($_SESSION["msg"]);} ?>
</script>
</body>
</html>
