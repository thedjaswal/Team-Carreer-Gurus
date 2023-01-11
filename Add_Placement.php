<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $server_name = "localhost";
        $user_name = "u461470881_tcg2402";
        $password = "Team@2402";
        $database = "u461470881_TCG_DB";
    $con = mysqli_connect($server_name, $user_name, $password, $database);
    if($con)
    {
        echo "Yes<br/>";
        
    }
    else
    {
        echo mysqli_connect_error();
        
    }
    
    if(isset($_POST))
    {
        $target_dir = "CVs/";
        $name = $_POST['Name'];
        $contact = $_POST['Contact'];
        $email = $_POST['Email'];
        $dob = $_POST['DOB'];
        $degree = $_POST['Degree'];
        $gender = $_POST['gender'];
        $marks = $_POST['Marks'];
        $city = $_POST['City'];
        $address = $_POST['Address'];
        $institution_name = $_POST['Institution_Name'];
        $passing_year = $_POST['Passing_Year'];
        $job_preference = $_POST['Job_Preference'];
        $resume =$target_dir. $_POST['Name']." ".$_POST['DOB'];
        
        $check="SELECT * FROM Placements WHERE Email = '$email'";
        $rs = mysqli_query($con,$check);
        $data = mysqli_fetch_array($rs, MYSQLI_NUM);
       
        if($data[0] > 1) 
        {
            echo 
                "<script> 
                    alert('Email already registered with us!');
                    alert('If you had previously registered, You do not need to register again, our team will contact you as soon as there is a suitable opportunity for you.')
                    window.location.replace('index.html');
                    document.getElementById('newForm').reset();
                </script>";
        }
        else
        {
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            
            $uploadOk = 1;
            $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
            //check file type
           if($FileType != "pdf")
            {
                echo
                    "<script> 
                        alert('Sorry Only PDF file is allowed!');
                    </script>";
        
                    $uploadOk = 0;
            }
                
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 4000000) 
            {
                echo
                    "<script> 
                        alert('File size cannot be more than 4MB ');
                    </script>";
                  $uploadOk = 0;
            }
                
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) 
            {
                echo
                    "<script> 
                        alert('There was some error please Try Again Later upload ok');
                    </script>";
            } 
            
            // if everything is ok, try to upload file
            else 
            {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $resume.".pdf")) 
                {
                    $sql = "INSERT INTO `Placements` (`Sr_No`, `Name`, `Contact_No`, `Email`, `DOB`, `Gender`, `Degree_or_Diploma_Name`, `Passing_Year`,`Job_Preference`, `Percentage_or_CGPA`, `Institution_Name`, `Address`, `City`, `Date_Joined`, `Resume`) VALUES (NULL, '$name', '$contact', '$email', '$dob', '$gender', '$degree', '$passing_year','$job_preference', '$marks', '$institution_name', '$address', '$city', current_timestamp(), '$resume');";
                    $result = mysqli_query($con, $sql);
                    if($result)
                    {
                        echo
                            "<script> 
                                alert('You Registeration was successful our team will contact you ASAP!');
                                window.location.replace('index.html');
                                document.getElementById('newForm').reset();
                            </script>";
                    }
                    else
                    {
                        echo
                            "<script> 
                                alert('There was some error please try again later!');
                                window.location.replace('index.html');
                                document.getElementById('newForm').reset();
                            </script>";
                    }
                }
        
            }
                
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
    <title>Placement Form</title>

</head>
<body>
    <div class="container">
        <div class="title">
            Registration
        </div> <br>
         <p style="color:red;"> Please enter your details <b>CAREFULLY</b>. Wrong information can <b> AFFECT YOUR OPPORTUINITY</b>.</p>
        <form id = "newForm" method="post" enctype="multipart/form-data">
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
                    <input name="Contact" type="tel" maxlength="10" placeholder="Enter your Mobile No." id ="Contact" required>
                </div>

                <div class="input-box">
                    <span  class="deatils">Date of Birth</span>
                    <input name="DOB" type="date" placeholder="dd-mm-yy" id ="DOB" required>
                </div>

                <div class="input-box">
                    <span  class="deatils">Degree/Diploma </span>
                    <input name="Degree" type="text" placeholder="Enter your all Degrees/Diplomas" id="Degree_or_Diploma" required>
                </div>

                <div class="input-box">
                    <span  class="deatils">Percentage / CGPA </span>
                    <input name="Marks" type="number" id="Percentage_or_CGPA" placeholder="Enter your Percentage / cgpa" required>
                </div>

                <div class="input-box">
                    <span  class="deatils">Institution Name </span>
                    <input name="Institution_Name" type="text" id="Institution_Name" placeholder="Enter your institution name" required>
                </div>

                <div class="input-box">
                    <span  class="deatils">Passing Year </span>
                    <input name="Passing_Year" type="number" id="Passing_Year" placeholder="Enter your passing year" required>
                </div>

                <div class="input-box">
                    <span  class="deatils">Job Preference</span>
                    <input name="Job_Preference" type="text" id="Job_Preference" placeholder="Enter your job Preference" required>
                </div>

                <div class="input-box">
                    <span  class="deatils">City </span>
                    <input name="City" type="text" id="City" placeholder="Enter your  city name" required>
                </div>

                <div class="input-box">
                    <span  class="deatils">Address </span>
                    <input name="Address" type="text" id="Address" placeholder="Enter your Address" required>
                </div>
                <div class="input-box">
                    <span  class="deatils">Upload CV </span>
                    <input type="file" name="fileToUpload" id="fileToUpload">
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
                </br>
                <span class="note">*NOTE: There is <b>NO registration fees</b> but 
                                            you will be charged <b>10% of your 1st Salary</b> once placed!*
                </span>
            </div>
            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>


