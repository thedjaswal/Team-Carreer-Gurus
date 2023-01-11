<?php
session_start();
    $server_name = "localhost";
        $user_name = "u461470881_tcg2402";
        $password = "Team@2402";
        $database = "u461470881_TCG_DB";
        $data = mysqli_connect($server_name, $user_name, $password, $database);

if ($data === false) {
    echo"h1";
    echo"<script> 
    alert('There is some Error, please try again after later!');
    window.location.replace('/');
    </script>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "select *from  admin where username='" . $name . "' AND password='" . $pass . "' ";
    $result = mysqli_query($data, $sql);
    $row = mysqli_fetch_array($result);
    

    if(mysqli_num_rows( $result )>0)
    {

        $_SESSION['username'] = $name;
        
        header("location:adminhome.php");
    }
    else 
    {
        echo"<script> 
                alert('UserName or Password do not match!');
                window.location.replace('admin_login.html');
            </script>";
    }

}   
?>

