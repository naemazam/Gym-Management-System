<?php
session_start();

if(!isset($_SESSION['user_id'])){
  header('location:../index.php');	
}

include('dbcon.php');
 date_default_timezone_set('Asia/Kathmandu');
 //$current_date = date('Y-m-d h:i:s');
    $current_date = date('Y-m-d h:i A');
   $exp_date_time = explode(' ', $current_date);
    $curr_date =  $exp_date_time['0'];
    $curr_time =  $exp_date_time['1']. ' ' .$exp_date_time['2'];
 //extract($_POST);

$user_id = $_GET['id'];

/*$q = "select * from tbl_attendance where user_id='$user_id' AND curr_date = '$curr_date'";
$result = $con->query($q);
$num_count  = mysqli_num_rows($result);
if($num_count > 0)
{

 $_SESSION['error']='Already Check In';
?>
<script type="text/javascript">
window.location="../attendance.php";
</script>
<?php
}*/
 //else {


   $sql = "INSERT INTO attendance (user_id, curr_date,curr_time)
   VALUES ('$user_id','$curr_date','$curr_time')";


 if ($con->query($sql) === TRUE) {
   $attend_count = 0;
  $attend = "select * from members where user_id = '$user_id'";
  $result_attend = $con->query($attend);
  $row_attend = mysqli_fetch_array($result_attend);
   $cnt = $row_attend['attendance_count'];
$attend_count = $attend_count + 1;
     $sql1 = "update members set attendance_count ='$attend_count' where user_id='$user_id'";
     $con->query($sql1) ;

   
     // $_SESSION['success']='Record Successfully Added';
      
     ?>
<script type="text/javascript">
window.location="../attendance.php";
</script>
<?php
} else {
   
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../attendance.php";
</script>
<?php
}


//}



 

//}

?>