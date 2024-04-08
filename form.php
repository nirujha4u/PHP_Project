<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="form.css?v=<?php echo time(); ?>">
</head>
<body>

<div class="welcome">
        <div class="user">
            <?php echo "Hello, ".$_SESSION['user']."💓"; ?>
        </div>
        <div class="out">
            <form action="connection.php" method="post">
                <input type="submit" value="SIGNOUT" name="logout" class="out">
            </form>
        </div>
    </div>

    <?php
        if(isset($_SESSION['status'])){
             echo $_SESSION['status'];
    
            unset($_SESSION['status']);
        }
    ?>

    <div class="container">
        <h3>Registration Form</h3>
        <form action="insert.php" method="post">
            <div class="details">
                <div class="info">
                    <label for="fName" class="lab">First Name</label>
                    <input type="text" placeholder="First Name" name="fname">
                </div>
                <div class="info">
                    <label for="lName" class="lab">Last Name</label>
                    <input type="text" placeholder="Last Name" name="lname">
                </div>
                <div class="info">
                    <label for="Email-id" class="lab">Email-id</label>
                    <input type="email" placeholder="E-mail" name="email">
                </div>
                <div class="info">
                    <label for="phone" class="lab">Phone Number</label>
                    <input type="text" placeholder="Phone Number" name="phone">
                </div>
                <div class="info2">
                    <span>Gender:</span>
                    <label for="101" >
                    <input type="radio" class="radio" name="gender" value="Male" id="101">  Male</label>
                    <label for="102">
                    <input type="radio" class="radio" name="gender" value="Female" id="102">  Female</label>
                </div>
            </div>


            <div class="button1">
                <input type="submit" value="SUBMIT" class="button" name=submitdata>
            </div>
            <div class="button2">
                <input type="submit" value="SHOW DATA" class="buttonshow" name="showdata">
            </div>

        </form>
        

</div>

</body>
</html>
