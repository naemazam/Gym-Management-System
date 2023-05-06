<?php
  session_start();
    if(!isset($_SESSION['user_id'])) {
      header('location:../index.php');	
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Gym System Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../css/fullcalendar.css" />
<link rel="stylesheet" href="../css/matrix-style.css" />
<link rel="stylesheet" href="../css/matrix-media.css" />
<link href="../font-awesome/css/fontawesome.css" rel="stylesheet" />
<link href="../font-awesome/css/all.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Perfect Gym Admin</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<?php include 'includes/topheader.php'?>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<!-- <div id="search">
  <input type="hidden" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div> -->
<!--close-top-serch-->

<!--sidebar-menu-->
<?php $page='update-equip'; include 'includes/sidebar.php'?>


<!--sidebar-menu-->
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i> Home</a> <a href="#" class="tip-bottom">Manage Equipments</a> <a href="#" class="current">Update Equipment</a> </div>
  <h1>Update Equipment</h1>
</div>
<form role="form" action="index.php" method="POST">
    <?php 

            if(isset($_POST['name'])){
            $name = $_POST["name"];    
            $amount = $_POST["amount"];
            $vendor = $_POST["vendor"];
            $description = $_POST["description"];
            $address = $_POST["address"];
            $contact = $_POST["contact"];
            $date = $_POST["date"];
            $quantity = $_POST["quantity"];
            $id=$_POST['id'];

            $totalamount = $amount * $quantity;
            
            include 'dbcon.php';
            //code after connection is successfull
            //update query
            $qry = "update equipment set name='$name', amount='$totalamount',vendor='$vendor', description='$description', address='$address', address='$address', contact='$contact', date='$date', quantity='$quantity' where id='$id'";
            $result = mysqli_query($conn,$qry); //query executes

            if(!$result){
                echo"<div class='container-fluid'>";
                    echo"<div class='row-fluid'>";
                    echo"<div class='span12'>";
                    echo"<div class='widget-box'>";
                    echo"<div class='widget-title'> <span class='icon'> <i class='fas fa-info'></i> </span>";
                        echo"<h5>Error Message</h5>";
                        echo"</div>";
                        echo"<div class='widget-content'>";
                            echo"<div class='error_ex'>";
                            echo"<h1 style='color:maroon;'>Error 404</h1>";
                            echo"<h3>Error occured while updating your details</h3>";
                            echo"<p>Please Try Again</p>";
                            echo"<a class='btn btn-warning btn-big'  href='edit-equipment.php'>Go Back</a> </div>";
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
                    echo"<div class='widget-title'> <span class='icon'> <i class='fas fa-info'></i> </span>";
                        echo"<h5>Message</h5>";
                        echo"</div>";
                        echo"<div class='widget-content'>";
                            echo"<div class='error_ex'>";
                            echo"<h1>Success</h1>";
                            echo"<h3>Equipment details has been updated!</h3>";
                            echo"<p>The requested details are updated. Please click the button to go back.</p>";
                            echo"<a class='btn btn-inverse btn-big'  href='equipment.php'>Go Back</a> </div>";
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
         </div>
</div></div>
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
