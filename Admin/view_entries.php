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
            if($_POST['entry_type'])
            {
                $entry_type = $_POST['entry_type'];
                header("location:$entry_type.php");
            }
            else
            {
                echo"<script> 
                        alert('Please select a value from the given options!');
                        window.location.replace('adminhome.php');
                    </script>";
            }
                
            
        }
    }
    else 
    {
        echo
        "<script> 
            alert('There was some error please try again later!');
        </script>";
    }
?>
