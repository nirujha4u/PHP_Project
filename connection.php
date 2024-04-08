<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="signin-style.css">
    <style>
        .container{
            display: flex;
            justify-content: center;
        }
        a{
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
            include "config.php";  //connect server
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['login'])) { 
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $flag = false; 
            
                    $result = $conn->query("SELECT * FROM userid");
            
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if ($row["user"] == $user && $row["password"] == $pass) {
                                $flag = true;
                                session_start();
                                $_SESSION['user'] = $user;
                                $_SESSION['Pass'] = $pass;
                                header("Location: form.php");
                                exit(); 
                            }
                        }

                        if (!$flag) {
                            echo "Wrong User or Password";
                        }
                    } else {
                        echo "No records found";
                    }
                }
            }
            else if(isset($_POST['logout'])) { 
                session_start(); // Start the session before destroying it
                echo "Hello ", $_SESSION['user'];
                session_unset();
                session_destroy();
                echo "You have Successfully Logged Out";
            }
        ?>

        <div>
        <a href="signin.html">Login Again</a>
        </div>
    </div>
    
</body>
</html>