<?php
require_once ('/var/www/html/app/model/connect.php');
    if (isset($_POST)) {
        $empId = $_POST['empId'];
        $conn = dbConnect();  
        if ($conn) {
            $sql = "INSERT INTO EMM_ZOO.TOUR_GUIDE (DRIVERID,EMPID) VALUES (DEFAULT".$empId.");"; 
            echo $sql;  
            $rc = db2_exec($conn, $sql);
            if ($rc) {
                echo "<script>alert('Added');window.location='add_tour_guide.php';</script>";
            }
            else {
                // die('Critical error:' . db2_stmt_error($insert));
            }
            db2_close($conn);
        }
        else {
           echo db2_conn_errormsg($conn);
        }
    }else{
        echo "<script>alert('Undefined Variable');window.location='add_tour_guide.php';</script>";
    }
?>