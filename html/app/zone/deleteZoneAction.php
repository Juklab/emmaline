<?php
require_once ('/var/www/html/app/model/connect.php');

$zoneID = (isset($_POST['deleteZone']) ? $_POST['deleteZone'] : null) ;

  $conn = dbConnect();
  if ($conn) {
    $sql = "DELETE FROM EMM_ZOO.ZONE WHERE ZONEID = " . $zoneID . ";";
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