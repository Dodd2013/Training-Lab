<div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
      <ul class="am-list admin-sidebar-list">
        <li><a href="#user-index.php"><span class="am-icon-home"></span> Home</a></li>
        <li class="admin-parent">
          <a class="am-cf am-collapsed" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> Feedback <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub" id="collapse-nav">
            <li><a href="#newproblem.php" class="am-cf"><span class="am-icon-check"></span> New Feedbcak Problem</span></a></li>
            <li><a href="#feedback_problemlist.php"><span class="am-icon-puzzle-piece"></span> Feedbcak Problem List</a></li>
            <li><a href="#newfeedback.php"><span class="am-icon-calendar"></span> New Feedbacks</a></li>
            <li><a href="#feedbacklist.php"><span class="am-icon-th"></span> Feedback List<!-- <span class="am-badge am-badge-secondary am-margin-right am-fr">24</span> --></a></li>
            <li><a href="admin-404.html"><span class="am-icon-bug"></span> 404</a></li>
          </ul>
        </li>
        <!-- <li><a href="user-feedback.php"><span class="am-icon-table"></span> Feedback</a></li> -->
        <li><a href="admin-form.html"><span class="am-icon-pencil-square-o"></span> Job</a></li>
        <li class="admin-parent">
          <a class="am-cf am-collapsed" data-am-collapse="{target: '#collapse-nav1'}"><span class="am-icon-file"></span> Resume <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub" id="collapse-nav1">
            <li><a href="admin-user.html" class="am-cf"><span class="am-icon-check"></span> Change Resume<!-- <span class="am-icon-star am-fr am-margin-right admin-icon-yellow"> --></span></a></li>
            <li><a href="admin-help.html"><span class="am-icon-puzzle-piece"></span> Display Resume</a></li>
          </ul>
        </li>
        <li><a href="#user-info.php"><span class="am-icon-user"></span> Personal information</a></li>
        <li><a href="logout.php"><span class="am-icon-sign-out"></span> Log Out</a></li>
        <li><a href="#Notification.php"><span class="am-icon-calendar"></span> Announcement</a></li>
      </ul>
    
      <div class="am-panel am-panel-default admin-sidebar-panel">
        <div class="am-panel-bd">
          <p><span class="am-icon-bookmark"></span> Announcement</p>
          <p style="word-break:break-all;">
            <?php
              $file=fopen('Notification.txt', 'r');
              echo fread($file,"280");
              fclose($file);
            ?>
          </p>
        </div>
      </div>

    </div>
  </div>