<?php
include "config.php";

    if(isset($_GET['updateid'])){
        $email1 = $_GET['updateid'];
    
        $result = $conn->query("SELECT * FROM students WHERE email='$email1'");
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $fname = $row['fname'];
            $lname = $row['lname'];
            $email = $row['email'];
            $phone = $row['phone'];
            $gender = $row['gender'];
        }
    
        echo "
        <form action='update.php?updateid=".$email1."' method='post'>
            <label for='fname'>First Name: </label>
            <input type='text' placeholder='First Name' name='fname' value='".$fname."'><br>
            <label for='lname'>Last Name: </label>
            <input type='text' placeholder='Last Name' name='lname' value='".$lname."'><br>
            <label for='email'>Email: </label>
            <input type='text' placeholder='Email' name='email' value='".$email."'><br>
            <label for='phone'>Phone: </label>
            <input type='text' placeholder='Phone' name='phone' value='".$phone."'><br>
            <label for='gender'>Gender: </label>
            <input type='text' placeholder='Gender' name='gender' value='".$gender."'><br>

            <input type='submit' value='Update' name='submit'>
        </form>";
    }

    if(isset($_POST['submit'])){
        $email1 = $_GET['updateid'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];

        $sql = "UPDATE students SET fname='$fname', lname='$lname', email='$email', phone='$phone', gender='$gender' WHERE email='$email1'";
        $result = $conn->query($sql);
        if ($result) {
            echo "Updated successfully","\n";
            header('location:display.php');
        } else {
            echo "Record not updated: " . $conn->error;
        }
    }




?>