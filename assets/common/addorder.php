<?php
    include_once '../common/connect.php';
    
    if (isset($_POST["btnbuy"])) {
        $bill_address = $_POST['address'];                   
        $bill_total = $_POST['hidden_total'];
        //$bill_id = $_POST[''];
        if (isset($_POST["address"]) and isset($_POST["hidden_total"])
        and !empty($_POST["address"]) and !empty($_POST["hidden_total"]))        
        {
                $sql = "insert into bill(BILL_TOTAL, BILL_ADDRESS) values ($bill_total,'$bill_address')";
                mysqli_query($cn, $sql);
                
                //$lastID = mysql_insert_id(); //lay idDH moi chen
                //$_SESSION['idDH']=$lastID;	
                //print_r($lastID);
        }
        
        
        header("location: ../module/ok.php");
    }
?>