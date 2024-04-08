<?php
session_start();

include "config.php";

if (isset($_POST['submitdata'])) {
    if (isset($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['phone'], $_POST['gender'])) {

        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $gender=$_POST['gender'];

        $sql="insert into students(fname, lname,email,phone,gender) values('$fname','$lname','$email','$phone','$gender')";
        $result=mysqli_query($conn,$sql);
        if($result){
            $_SESSION['status']="Data Added Successfully";
            header("Location:form.php");
        }else{
            echo "Record not added".mysqli_error($conn);
        }
        }
    }elseif (isset($_POST['showdata'])) {
        header("Location:display.php");
        exit;
    }
?>