
<?php 
session_start();

if(!isset($_SESSION['examineeSession']['examineenakalogin']) == true) header("location:index.php");

 ?>
<?php include("conn.php"); ?>

<?php include("includes/header.php"); ?>      

<div class="app-main">

<?php include("includes/sidebar.php"); ?>

<?php 
   @$page = $_GET['page'];


   if($page != '')
   {
     if($page == "instruction")
     {
       include("pages/instruction.php");
     }
     if($page == "exam")
     {
       include("pages/exam.php");
     }
     else if($page == "result")
     {
       include("pages/result.php");
     }
     else if($page == "myscores")
     {
       include("pages/myscores.php");
     }
     
   }
  
  //  else
  //  {
  //    include("pages/home.php"); 
  //  }
 ?> 

<?php include("includes/footer.php"); ?>

<?php include("includes/modals.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/brython@3.8.9/brython.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/brython@3.8.9/brython_stdlib.js">
</script>
