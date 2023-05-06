<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="<?php if($page=='dashboard'){ echo 'active'; }?>"><a href="index.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="<?php if($page=='todo'){ echo 'active'; }?>"> <a href="to-do.php"><i class="icon icon-pencil"></i> <span>To-Do</span></a>

    </li>

    <li class="<?php if($page=='reminder'){ echo 'active'; }?>"><a href="customer-reminder.php"><i class="icon icon-time"></i> <span>Reminders</span></a></li>

    <li class="<?php if($page=='announcement'){ echo 'active'; }?>"><a href="announcement.php"><i class="icon icon-bullhorn"></i> <span>Announcement</span></a></li>

    <li class="<?php if($page=='report'){ echo 'active'; }?>"><a href="my-report.php"><i class="icon icon-file"></i> <span>Reports</span></a></li>
  </ul>
</div>