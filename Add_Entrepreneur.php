<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $server_name = "localhost";
        $user_name = "u461470881_tcg2402";
        $password = "Team@2402";
        $database = "u461470881_TCG_DB";
$con = mysqli_connect($server_name, $user_name, $password, $database);
if($con)
    {echo "Yes<br/>";}
else
    {echo mysqli_connect_error();}

if(isset($_POST))
{
    $name = $_POST['Name'];
    $contact = $_POST['Contact'];
    $email = $_POST['Email'];
    $dob = $_POST['DOB'];
    $business_category = $_POST['Bs'];
    $gender = $_POST['gender'];
    $city = $_POST['City'];
    $address = $_POST['Address'];
    $family_business = $_POST['bus'];
    $family_business_detail = $_POST['Family_Business_Detail'];

    $sql = "INSERT INTO `Entrepreneurs` (`Sr_No`, `Name`, `Contact_No`, `Email`, `DOB`, `Business_Category`, `City`, `Address`, `Gender`, `Family_Business`, `Family_Business_Details`, `Date_Joined`, `Status`) VALUES (NULL, '$name', '$contact', '$email', '$dob', '$business_category', '$city', '$address', '$gender', '$family_business', '$family_business_detail', current_timestamp(), 'Pending');";
    $result = mysqli_query($con, $sql);
    
    if($result)
    {echo"<script> 
        alert('You Registeration was successful our team will contact you ASAP!');
        window.location.replace('index.html');
        document.getElementById('newForm').reset();
        </script>";
    }
    else{ 
        echo"<script>
        alert('Sorry for inconvinience There was some error! Please try again later!');
        window.location.replace('index.html');
        document.getElementById('newForm').reset();
        </script>";}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <script src="https://kit.fontawesome.com/3222bd988f.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="x-icon" href="images/shortcut icon.png">
    <title>Entrepreneurship Form</title>
</head>
<body>

    <div class="container">
        <div class="title">
            Registration
        </div>
        <form id="newForm" action ="Add_Entrepreneur.php" method="post">
            <div class="user-details">
                <div class="input-box">
                    <span  class="deatils">Full Name </span>
                    <input name ="Name" type="text" placeholder="Enter your name" id="Name" required>
                </div>

                <div class="input-box">
                    <span  class="deatils">Email Address </span>
                    <input name ="Email" type="text" placeholder="Enter your email address" id="Email" required>
                </div>

                <div class="input-box">
                    <span  class="deatils" >Mobile No. </span>
                    <input name ="Contact" type="number" placeholder="Enter your Mobile No." id ="Contact" required>
                </div>

                <div class="input-box">
                    <span  class="deatils">Date of Birth</span>
                    <input name ="DOB" type="date" placeholder="dd-mm-yy" id="DOB"  required>
                </div>

                <div class="input-box">
                    <label for="Type">Business Category</label>
                    <select name="Bs" id="Type" required>
                        <option value="">--SELECT --</option>
                        <option value="Service_Based">Service Based</option>
                        <option value="Product_Based">Product Based</option>
                    </select>
                </div>

                <div class="input-box">
                    <span  class="deatils">City </span>
                    <input name ="City" type="text" placeholder="Enter your city name" id="City" required>
                </div>
                <div class="input-box">
                    <span  class="deatils"> Address </span>
                    <input name ="Address" type="text" placeholder="Enter your complete address" id="Address" required>
                </div>
            </div>

            <div class="gender-details">
                <input type="radio" name="gender" id="dot-1" value="Male">
                <input type="radio" name="gender" id="dot-2" value="Female">
                <input type="radio" name="gender" id="dot-3" value="Others">
                <span class="gender-title">Gender</span>
                <div class="category">
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Male</span>
                    </label>

                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="gender">Female</span>
                    </label>

                    <label for="dot-3">
                        <span class="dot three"></span>
                        <span class="gender">Others</span>
                    </label>
                </div> <br>

                <div class="bus-details">
                    <input type="radio" name="bus" id="dot-6" value="Yes" onclick="ifyes()">
                    <input type="radio" name="bus" id="dot-7" value="No" onclick="ifno()">
                    <span class="bus-title">Do you have a family business? </span>

                    <div class="category">
                         <label for="dot-6">
                             <span class="dot six"></span>
                             <span class="bus">Yes</span>
                         </label>

                         <label for="dot-7">
                             <span class="dot seven"></span>
                             <span class="bus">No</span>
                         </label>
                    </div>

                    <div id ="family_business" style="display: none;" >
                        <h3 class="bus-title"> If yes, Give brief details </h3>
                        <textarea name ="Family_Business_Detail" id="message" maxlength="200" placeholder="Explain about business type (Max 200 charcaters)"></textarea>
                    </div>
                </div>
            </div>
            <input type="submit" value="Register">
        </form>
    </div>


    <!-----script for display textbox----->
    <script>
        function ifyes()
        {
            document.getElementById("family_business").style.display ="Block";
        }
        function ifno()
        {
            document.getElementById("family_business").style.display ="none";
        }
    </script>
</body>
</html>

