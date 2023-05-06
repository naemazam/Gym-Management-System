<?php
session_start();
//the isset function to check username is already loged in and stored on the session
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Gym System</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../css/fullcalendar.css" />
<link rel="stylesheet" href="../css/matrix-style.css" />
<link rel="stylesheet" href="../css/matrix-media.css" />
<link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="index.php">Perfect Gym System</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<?php include '../includes/topheader.php'?>
<!--close-top-Header-menu-->
<!--sidebar-menu-->
<?php $page="todo"; include '../includes/sidebar.php'?>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="You're right here" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    
<!--End-Action boxes-->    

    <div class="row-fluid">
	<form role="form" action="index.php" method="POST">  
    <?php 

        include 'session.php';

        if(isset($_POST['task_desc'])){   
        $task_status = $_POST["task_status"];
        $task_desc = $_POST["task_desc"];
        $user_id = $session_id;
        include 'dbcon.php';
        
        //code after connection is successfull
        $qry = "insert into todo(task_status,task_desc,user_id) values ('$task_status','$task_desc','$user_id')";
        $result = mysqli_query($con,$qry); //query executes

            if(!$result){
            echo"<div class='container-fluid'>";
                echo"<div class='row-fluid'>";
                echo"<div class='span12'>";
                echo"<div class='widget-box'>";
                echo"<div class='widget-title'> <span class='icon'> <i class='icon-info-sign'></i> </span>";
                    echo"<h5>Error Message</h5>";
                    echo"</div>";
                    echo"<div class='widget-content'>";
                        echo"<div class='error_ex'>";
                        echo"<h1 style='color:maroon;'>Error 404</h1>";
                        echo"<h3>Error occured while entering your details</h3>";
                        echo"<p>Please Try Again</p>";
                        echo"<a class='btn btn-warning btn-big'  href='index.php'>Go Back</a> </div>";
                    echo"</div>";
                    echo"</div>";
                echo"</div>";
                echo"</div>";
            echo"</div>";
            }else {

            echo"<div class='container-fluid'>";
                echo"<div class='row-fluid'>";
                echo"<div class='span12'>";
                echo"<div class='widget-box'>";
                echo"<div class='widget-title'> <span class='icon'> <i class='icon-info-sign'></i> </span>";
                    echo"<h5>Message</h5>";
                    echo"</div>";
                    echo"<div class='widget-content'>";
                        echo"<div class='error_ex'>";
                        echo"<h1>Success</h1>";
                        echo"<h3>Your task has been added!</h3>";
                        echo"<p>Please click the button to go back.</p>";
                        echo"<a class='btn btn-inverse btn-big'  href='index.php'>Go Back</a> </div>";
                    echo"</div>";
                    echo"</div>";
                echo"</div>";
                echo"</div>";
            echo"</div>";

            }

            }else{
                echo"<h3>YOU ARE NOT AUTHORIZED TO REDIRECT THIS PAGE. GO BACK to <a href='index.php'> DASHBOARD </a></h3>";
            }

?>                
       </form>   
    
	  
	  
	  
    </div><!-- End of row-fluid -->
  </div><!-- End of container-fluid -->
</div><!-- End of content-ID -->
</div>
<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> <?php echo date("Y");?> &copy; Developed By The Terminal Boy</a> </div>
</div>

<style>
#footer {
  color: white;
}
</style>

<!--end-Footer-part-->

<script src="../js/excanvas.min.js"></script> 
<script src="../js/jquery.min.js"></script> 
<script src="../js/jquery.ui.custom.js"></script> 
<script src="../js/bootstrap.min.js"></script> 
<script src="../js/jquery.flot.min.js"></script> 
<script src="../js/jquery.flot.resize.min.js"></script> 
<script src="../js/jquery.peity.min.js"></script> 
<script src="../js/fullcalendar.min.js"></script> 
<script src="../js/matrix.js"></script> 
<script src="../js/matrix.dashboard.js"></script> 
<script src="../js/jquery.gritter.min.js"></script> 
<script src="../js/matrix.interface.js"></script> 
<script src="../js/matrix.chat.js"></script> 
<script src="../js/jquery.validate.js"></script> 
<script src="../js/matrix.form_validation.js"></script> 
<script src="../js/jquery.wizard.js"></script> 
<script src="../js/jquery.uniform.js"></script> 
<script src="../js/select2.min.js"></script> 
<script src="../js/matrix.popover.js"></script> 
<script src="../js/jquery.dataTables.min.js"></script> 
<script src="../js/matrix.tables.js"></script> 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
