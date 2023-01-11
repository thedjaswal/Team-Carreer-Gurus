<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("location:admin_login.php");
    }

    $server_name = "localhost";
        $user_name = "u461470881_tcg2402";
        $password = "Team@2402";
        $database = "u461470881_TCG_DB";
    $data = mysqli_connect($server_name, $user_name, $password, $database);
    if($data)
    {
        if(isset($_POST))
        {
            $sr_no = $_POST['sr_no'];
            $status = $_POST['Status'];
    
            $sql = "UPDATE Placements SET Status = '$status' WHERE Sr_No = $sr_no;";
            $result = mysqli_query($data, $sql);
            if($result)
            {
                echo"<script> 
                alert('Value updated successfully!');
                window.location.replace('Placements.php');
                </script>";
            }
        }
    }
    else    
    {
        echo"
            <script> 
                alert('There was some error, Please try again later!');
                window.location.replace('admin_login.php');
            </script>";       
    }


?>