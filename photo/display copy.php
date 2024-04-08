<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="displays.css">

</head>
<body>
<div class="welcome">
        <div class="user">
            <form action="connection.php" method="post">
                <?php
                    session_start();
                    echo "Hello ", $_SESSION['user']."💓";
                ?>
            </form>
    </div>
        <div class="out">
            <input type="submit" value="SIGNOUT" name="logout" class="out">
        </div>
    </div>

    <div class="container">
        <h3>Students Details:</h3>
    <?php
    include "config.php";

    echo "
    <table border=.5>
    <tr>
    <th>S. NO.</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Gender</th></tr>
    ";

    $result = $conn->query("SELECT * FROM students");

    if ($result->num_rows > 0) {
        $i=1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>".$i."</td>
            <td>".$row['fname']."</td>
            <td>".$row['lname']."</td>
            <td>".$row['email']."</td>
            <td>".$row['phone']."</td>
            <td>".$row['gender']."</td>
            <td>
            <form method='post'>
            <input type='hidden' name='email' value='".$row['email']."'>
            <input type='submit' name='delete' value='Delete' id='del'>
            </form>
            </td>
            </tr>";
            $i++;
        }
    } else {
        echo "<tr><td colspan='6'>No records found</td></tr>";
    }
    echo "</table>";

    if(isset($_POST['delete'])) {
    $email = $_POST['email'];
    $sql = "DELETE FROM students WHERE email='$email'";

    if ($conn->query($sql) === TRUE) {
        echo "<br> Record deleted successfully: <b>".$email."</b>";
        // header("Location:data.php");
    } else {
        echo $conn->error;
    }
    $conn->close();
    }
    if(isset($_POST['addrecord'])) {
        header("Location: form.php");
        exit; 
    }

?>
<div class="add">
    <form method="post">
        <input type="submit" value="Add More Record" name="addrecord" class="addrecord">
    </form>
</div>
    
</body>
</html>
