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

                if($_POST['Name'] && $contact = $_POST['Contact'])
                {
                    if(isset($_POST))
                    {
                        $name = $_POST['Name'];
                        $contact = $_POST['Contact'];
                        $email = $_POST['Email'];
                        $dob = $_POST['DOB'];
                        $qualification = $_POST['Qualification'];
                        $gender = $_POST['gender'];
                        $city = $_POST['City'];
                        $address = $_POST['Address'];
                        $expectation = $_POST['expt'];
                        
                        if($name && $contact && $email && $dob && $qualification && $gender && $city && $address && $expectation)
                        {
                            $sql = "INSERT INTO `SkillDevelopment` (`Sr_No`, `Name`, `Contact_No`, `Email`, `DOB`, `Gender`, `Qualification`, `Expectation`, `City`, `Address`, `Date_Joined`, `Status`) VALUES (Null, '$name', '$contact', '$email', '$dob', '$gender', '$qualification', '$expectation', '$city', '$address', current_timestamp(), 'Pending');";
                            $result = mysqli_query($con, $sql);
                            if($result)
                            {
                                echo"<script> 
                                    alert('Your registeration is complete, Our team will contact you ASAP!');
                                    window.location.replace('index.html');
                                    document.getElementById('newForm').reset();
                                    </script>";
                            }
                            else 
                                echo"<script> 
                                alert('There was some error loading data please try again later!');
                                window.location.replace('index.html');
                                </script>";
                        }
                        else
                            echo"<script> 
                                alert('Please Fill all the fields');
                                </script>";
                    }
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
    <title>Skill Developement Form</title>
</head>
<body>
    <div class="container">
        <div class="title">
            Registration
        </div>
        <form id="newForm" action="Add_SkillDevelopment.php" method="post">
            <div class="user-details">
                <div class="input-box">
                    <span  class="deatils">Full Name </span>
                    <input name="Name" type="text" placeholder="Enter your name" id="Name" required>
                </div>

                <div class="input-box">
                    <span  class="deatils">Email Address  </span>
                    <input name="Email" type="text" placeholder="Enter your email address" id="Email" required>
                </div>

                <div class="input-box">
                    <span  class="deatils" >Mobile No. </span>
                    <input name="Contact" type="number" placeholder="Enter your Mobile No." id ="Contact" required>
                </div>
    
                <div class="input-box">
                    <span  class="deatils">Date of Birth</span>
                    <input name="DOB" type="date" placeholder="dd-mm-yy" id="DOB" required>
                </div>

                <div class="input-box">
                    <span  class="deatils">Qualification </span>
                    <input name="Qualification" type="text" placeholder="Enter about your Qualifications" id="Qualification" required>
                </div>

                <div class="input-box">
                    <span  class="deatils">City </span>  
                    <input name="City" type="text" placeholder="Enter your city name" id="City" required>
                </div>

                <div class="input-box">
                    <span  class="deatils">Address </span>
                    <input name="Address" type="text" placeholder="Enter your complete address" id="Address" required>
                </div>

                <div class="input-box">
                    <label for="exp-select">Expectations from this session</label>
                    <select name="expt" id="Expectation" required>
                        <option value="">--SELECT ONE--</option>
                        <option value="Technical_skills">Technical skills</option>
                        <option value="Soft_skills">Soft skills</option>
                        <option value="Both">Both Technical & Soft skills</option>
                        <option value="Technical_and_Placement">Technical Skills with Placement</option>
                        <option value="Soft_and_Placement">Soft Skills with Placement</option>
                    </select>
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
                </div>
            </div>
            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>
