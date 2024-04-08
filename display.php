<?php
session_start();

include "config.php";

if(isset($_POST['addrecord'])) {
    header("Location: form.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="displays.css?v=<?php echo time(); ?>">
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

    <div class="search">
    <form method="post">
        <input type="text" name="search" placeholder="Search by First Name">
        <input type="submit" value="Search">
        <input type="submit" value="Show All" name="all">

    </form>
    </div>


    <div class="container">
        <h3>Students Details:</h3>
        <?php
        echo "
        <table border='.5'>
        <tr>
        <th>S. NO.</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Gender</th>
        <th>Action</th>
        </tr>
        ";

        if(isset($_POST['search'])) {
            $search = $_POST['search'];
            $result = $conn->query("SELECT * FROM students WHERE fname LIKE '%$search%'");
        }elseif(isset($_POST['all'])) {
            $result = $conn->query("SELECT * FROM students");
        } else {
            $result = $conn->query("SELECT * FROM students");
        }

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
                <td><button id='updt'><a href='update.php?updateid=".$row['email']."'>Update</a></button></td>
                </tr>";
                $i++;

            }
        } else {
            echo "<tr><td colspan='7'>No records found</td></tr>";
        }
        echo "</table>";
        ?>
    </div>

    <div class="add">
        <form method="post">
            <input type="submit" value="Add Record" name="addrecord" class="addrecord">
        </form>
    </div>

<?php
    if(isset($_POST['delete'])) {
        $email = $_POST['email'];
        $sql = "DELETE FROM students WHERE email='$email'";

        if ($conn->query($sql) == TRUE) {
            header('location:display.php');
        } else {
            echo $conn->error;
        }
        $conn->close();
    }

?>

</body>
</html>
