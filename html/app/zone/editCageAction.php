<?php
require_once ('/var/www/html/app/model/connect.php');

$cageId = (isset($_POST['cageIdEdit']) ? $_POST['cageIdEdit'] : null) ;
$cageName = (isset($_POST['cageNameEdit']) ? $_POST['cageNameEdit'] : null) ;

  $conn = dbConnect();
  if ($conn) {
    $sql = "UPDATE EMM_ZOO.CAGE SET CAGENAME = '" . $cageName . "' WHERE CAGEID = " . $cageId . " ;";
    $rc = db2_exec($conn, $sql);
    if($rc) {
      echo "<script>";
      echo "alert('Successfully')";
      echo "</script>";
      header("Refresh:0; url=index.php");
      db2_free_stmt($rc);
    } else {
      echo "<script>";
      echo "alert('Failed')";
      echo "</script>";
      header("Refresh:0; url=index.php"); 
    }
  }
  else {
   echo db2_conn_errormsg($conn);
 }

 ?>