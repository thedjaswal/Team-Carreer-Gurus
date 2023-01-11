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
$clas = $_POST['clas'];
$gender = $_POST['gender'];
$father_occupation = $_POST['Father_Occupation'];
$city = $_POST['City'];
$address = $_POST['Address'];
$previously_attended = $_POST['session'];
$expectation = $_POST['Expectation'];


$sql = "INSERT INTO `CareerCounselling` (`Sr_No`, `Name`, `Contact_No`, `Email`, `DOB`, `Class`, `Gender`, `Father_Occupation`, `City`, `Address`, `Previously_Attended`, `Expectation`, `Date_Joined`, `Status`) VALUES (NULL, '$name', '$contact', '$email', $dob, $clas, '$gender', '$father_occupation', '$city', '$address', '$previously_attended', '$expectation', current_timestamp(), 'Pending')";
$result = mysqli_query($con, $sql);

if($result)
{
    echo"<script> 
    alert('You Registeration was successful our team will contact ASAP!');
    window.location.replace('index.html');
    document.getElementById('newForm').reset();
    </script>";
}
else 
    echo"<script> 
    alert('There was Some Error Loading Data, Please try again later!');
    window.location.replace('index.html');
    document.getElementById('newForm').reset();
    </script>";

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
    <script src ="Add_Student.js"></script>
    <link rel="shortcut icon" type="x-icon" href="images/shortcut icon.png">
    <title>Career counselling Form</title>

</head>
<body>
    <div class="container">
        <div class="title">
            Registration
        </div>
        <form id="newForm"  action="Add_CareerCounselling.php" method="post">
            <div class="user-details">
                <div class="input-box">
                     <span  class="deatils">Full Name </span>
                     <input type="text" name = "Name" placeholder="Enter your name" id="Name" required>
                </div>

                <div class="input-box">
                    <span  class="deatils">Email Address  </span>
                    <input type="text" name ="Email" placeholder="Enter your email address" id="Email" required>
                </div>

                <div class="input-box">
                    <span  class="deatils" >Mobile No. </span>
                    <input type="number" name="Contact" placeholder="Enter your Mobile No." id ="Contact" required>
                </div>

                <div class="input-box">
                    <span  class="deatils">Date of Birth</span>
                    <input type="date" name="DOB" placeholder="dd-mm-yy" id="DOB" required>
                </div>

                <div class="input-box">
                    <label for="class-select">Select your Class</label> <br>
                    <select name="clas" id="Class" required>
                        <option value="">--SELECT--</option>
                        <option value="6">6th</option>
                        <option value="7">7th</option>
                        <option value="8">8th</option>
                        <option value="9">9th</option>
                        <option value="10">10th</option>
                        <option value="11">11th</option>
                        <option value="12">12th</option>
                    </select>
                </div>

                <div class="input-box">
                    <span  class="deatils">Father's/Mother's occupations</span>
                    <input type="text" name="Father_Occupation" placeholder="Enter parents occupation details" id="Father_Occupation" required>
                </div>
                <div class="input-box">
                    <span  class="deatils"> City </span>
                    <input type="text" name="City" placeholder= "Enter your city" id="City" required>
                </div>
                <div class="input-box">
                    <span  class="deatils">Address</span>
                    <input type="text" name="Address" placeholder="Enter your complete address" id="Address" required>
                </div>
            </div>

            <div class="gender-details">
                <input type="radio" name="gender" id="dot-1"  value="Male">
                <input type="radio" name="gender" id="dot-2"  value="Female">
                <input type="radio" name="gender" id="dot-3"  value="Others">
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

                <div class="session-details">
                    <input type="radio" name="session" id="sd-1" value="Yes">
                    <input type="radio" name="session" id="sd-2" value="No">
                    <span class="session-title">Have you attended such session before? </span>
                    <div class="cat">
                        <label for="sd-1">
                            <span class="sd one"></span>
                            <span class="session">Yes</span>
                        </label>
                        <label for="sd-2">
                            <span class="sd two"></span>
                            <span class="session">No</span>
                        </label>
                    </div>
                </div>
                <div>
                    <textarea id="message" name ="Expectation" maxlength="100"  placeholder="Write down your expectations from this session (Max 100 charcaters)"></textarea>
                </div>
            </div>
            <input type="submit" value="Register" >
        </form>
    </div>
</body>
</html>

