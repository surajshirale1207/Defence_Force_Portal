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
        echo "Inserted row successfully...!";
    } else {
        echo "Error inserting row: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>