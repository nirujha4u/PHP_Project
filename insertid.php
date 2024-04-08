<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User ID</title>
    <link rel="stylesheet" href="signin.css">
    <style>
        .container{
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color:none;
        }
        table{
            border-spacing:0;
        }
        table th,td{
            padding: 3px;
        }
        .blk{
            background-color:#3CF2DE;
            padding: 20px;
            margin: 30px;
            border-radius: 10px;
        }
        a{
            padding: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div>
            <?php
            include "config.php";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['add'])) {
                    $email = $_POST['email'];
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $sql = "INSERT INTO userid (email,user, password) VALUES ('$email','$user', '$pass')";
                    if ($conn->query($sql) === TRUE) {
                        header('location:insertid.php');
                    } else {  
                        echo "Error adding record: " . $con->error;
                    }
                }
            }
            ?>
             <div>
                <br>
                <a href="signup.html">Add More User?</a>
            </div>
        </div>

        <div class="blk">
        <?php
                echo "
                <table border='.5'>
                <tr>
                <th>Email</th>
                <th>User Name</th>
                <th>Password</th>
                </tr>
                ";
        
            $result = $conn->query("SELECT * FROM userid");
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>".$row['email']."</td>
                    <td>".$row['user']."</td>
                    <td>".$row['password']."</td>
                    </tr>";
                }
            } else {
                echo "No records found";
            }
        ?>
        </div>
    </div>
</body>
</html>

