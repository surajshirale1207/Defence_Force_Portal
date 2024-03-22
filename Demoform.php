<?php
if (isset($_POST['submit']))
{
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $Aadhar = $_POST['Aadhar'];
    $gender = $_POST['gender'];
    $dob =$_POST['dob'];
    $city = $_POST['city'];
    $education_level = $_POST['education_level'];
    $education_board = $_POST['education_board'];
    $college_name = $_POST['college_name'];
    $percentage = $_POST['percentage'];
    $Applyfor = $_POST['Applyfor'];
    $exam_city = $_POST['exam_city'];

    $conn = new mysqli("localhost","root","","login");

    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO Apply1 (firstname,middlename,lastname,email,phone,Aadhar,gender,dob,
    city,education_level,education_board,college_name,percentage,Applyfor,exam_city) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssiisisssssss", $firstname, $middlename ,$lastname ,$email ,$phone ,$Aadhar ,$gender ,$dob ,$city ,$education_level ,$education_board ,$college_name ,$percentage ,$Applyfor, $exam_city );

    if ($stmt->execute()) {
        $submit_success = true;
    } else {
        $submit_error = "Error inserting row: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Application Form</title>
<style>
  body, html {
    margin: 0;
    padding: 0;
    height: 100%;
  }

  .container {
    position: relative;
    height: 100%;
  }

img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 120%;
    object-fit: cover;
  }



  .form-container {
    position: absolute;
    top: 55%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: rgba(255, 255, 255, 0.7);
    padding: 20px;
    border-radius: 10px;
    max-width: 500px;
    overflow-y: auto;
    max-height: 90%;
    animation: fadeIn 1s ease-in-out;
    transition: transform 0.3s ease-in-out;
  }

  .form-container fieldset {
    border: none;
    margin: 0;
    padding: 0;
  }

  .form-container legend {
    font-weight: bold;
    font-size: 1.2em;
    margin-bottom: 10px;
    text-align: center;
    font-family:sans-serif;
  }

  .form-container input[type="text"],
  .form-container input[type="email"],
  .form-container input[type="tel"],
  .form-container select {
    width: calc(50% - 11px); /* Adjusted width */
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    transition: border-color 0.3s ease-in-out;
  }

  .form-container input[type="text"]:focus,
  .form-container input[type="email"]:focus,
  .form-container input[type="tel"]:focus,
  .form-container select:focus {
    border-color: #4CAF50;
  }

  .form-container input[type="radio"],
  .form-container input[type="checkbox"] {
    margin-right: 5px;
    transform: scale(1.5);
  }

  .form-container button {
    width: calc(50% - 5px);
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
  }

  .form-container button:hover {
    background-color: #45a049;
  }

  #body1 {
    background-image: url('front.jpg');
    background-size: 100%;
    height: 125px;

    margin-top: 0px;
     }

h2{
color:white;
font-size:45px;
text-align:center;
padding-top:35px;
margin-top:0px; /* Add this line */
 }

.container a {
    color: white;
    text-decoration: none;
}

  @keyframes fadeIn {
    from {
      opacity: 0;
    }
    to {
      opacity: 1;
    }
  }
</style>
</head>
<body>


<div id="body1">
<center><h2><b>Application Form</b></h2></center>
<hr>
</div>

<div class="container">

<a href="homepage.html"><<</a>
<img src="check.jpg">
   </img>


  <div class="form-container">
    <form action="" method="POST">
      <fieldset>
        <legend>Personal Details</legend>
        <input type="text" name="firstname" placeholder="First Name" required>
        <input type="text" name="middlename" placeholder="Middle Name">
        <input type="text" name="lastname" placeholder="Last Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="tel" name="phone" placeholder="Phone Number" required>
        <input type="text" name="Aadhar" placeholder="Aadhar Number" required>
        &ensp;&ensp;Gender:<input type="radio" name="gender" value="male"> Male
        <input type="radio" name="gender" value="female"> Female

        &ensp;&ensp;&ensp;&ensp;&ensp;Date of Birth:&ensp;<input type="date" name="dob" placeholder="Date of Birth" required><br><br>
        <select name="city" required>
          <option value="">Select City</option>
          <option value="PUNE">PUNE</option>
          <option value="PIMPRI CHINCHWAD">PIMPRI CHINCHWAD</option>
          <option value="DHULE">DHULE</option>
        </select>
      </fieldset>
      <fieldset>
        <legend>Educational Details</legend>
        <input type="radio" name="education_level" value="12th"> 12th
        <input type="radio" name="education_level" value="graduate"> Graduate
        <input type="radio" name="education_level" value="post_graduate"> Post-graduate
        <br><br>
        <input type="text" name="education_board" placeholder="Education Board" required>
        <input type="text" name="college_name" placeholder="College Name" required>
        <input type="text" name="percentage" placeholder="Percentage" required><br>
      </fieldset>
      <fieldset>
        <legend>Exam Details</legend>
        Apply for:<br><br>
        <input type="radio" name="Applyfor" value="army"> Army
        <input type="radio" name="Applyfor" value="navy"> Navy
        <input type="radio" name="Applyfor" value="airforce"> Air Force<br><br>
        Exam City:
        <select name="exam_city" required>
          <option value="">Select Exam City</option>
          <option value="Mumbai">Mumbai</option>
          <option value="Delhi">Delhi</option>
          <option value="Bangalore">Bangalore</option>
        </select>
      </fieldset>
      <button type="submit" name="submit">Submit</button>
      <button type="reset">Reset</button>
    </form>
  </div>
</div>

<script>
    <?php if ($submit_success): ?>
        alert("Registration Succesfully!");
    <?php elseif ($submit_error): ?>
        alert("Error occurred while storing data in the database: <?= $submit_error ?>");
    <?php endif; ?>


</script>

</body>
</html>
