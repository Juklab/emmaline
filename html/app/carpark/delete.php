<?php
require_once ('/var/www/html/app/model/connect.php');

    $reservedID = (isset($_GET['delete_id']) ? $_GET['delete_id'] : null);

    $conn = dbConnect();
    if ($conn) {
        $sql = "DELETE FROM EMM_ZOO.PARKRESERVETOUR WHERE PARKRESERVENO =".$reservedID.";";
        $result = db2_exec($conn, $sql);
        if ($result) {
            $resultMessage = 1;
            echo "<script>";
            echo "alert('Deleted Successfully')";
            echo "</script>";
            header("Refresh:0; url=reserved.php#reserve_list");
            exit();
        } else { 
            $resultMessage = 0;
            return $resultMessage;
        }
        db2_free_stmt($stmt);
        db2_close($conn);
    }
    else {
        echo db2_conn_errormsg();
    }
?>