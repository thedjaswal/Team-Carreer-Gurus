<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("location:admin_login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
body {
  
}
form{
    padding-bottom:15px;
   
}
 @media(max-width: 700px){
    #frame{
        width:460px;
        
    }
    
</style>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="admin.css">
    <title>Document</title>
</head>
<body>
 
    <form action="view_entries.php" method="POST">
        <p style="color:red;font-size:25px;font-weight:450px">Click on Below Radio  Buttons to View the Entries</p>
        
        <input type="radio" id="Career Counselling" name="entry_type" value="Career Counselling"  onclick="Changesrc(0)"    >
            <label for="Career Counselling">Career Counselling</label>

        <input type="radio" id="Entrepreneurs" name="entry_type" value="Entrepreneurs"    onclick="Changesrc(1)"  >
            <label for="Entrepreneurs">Entrepreneurship</label><br>

        <input type="radio" id="Skill Devlopment" name="entry_type" value="Skill Devlopment"    onclick="Changesrc(2)" >
            <label for="Skill Devlopment">Skill Devlopment</label>

        <input type="radio" id="Placements" name="entry_type" value="Placements"   onclick="Changesrc(3)" >
            <label for="Placements"> Placements </label>
        
        
        
    </form>
    
    <iframe src="iframe.html" id="frame" height="476" width="1346" title="Iframe Example"></iframe>
   
   <script>
       function Changesrc(i)
       {
           let url =["Career Counselling.php","Entrepreneurs.php","Skill Devlopment.php","Placements.php"]
            document.getElementById("frame").src=url[i];
       }
   </script>
 

    
</body>
</html>
