<?php
session_start();
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['Login'])) {
        $UserName = $_POST['username'];
        $Password = $_POST['password'];

        // Hash the entered password for comparison with the stored hash
        $hashedPassword = md5($Password);

        // Query without converting the stored username to lowercase
        $sql = "SELECT * FROM `user` WHERE username = '" . $UserName . "' AND password='" . $hashedPassword . "' ";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $fetchrow = mysqli_num_rows($query);
            if ($fetchrow > 0) {
                $row = mysqli_fetch_array($query);
                if ($row['User_type'] === "Administrator") {
                    $_SESSION['username'] = $UserName; // Store the original case
                    header('location: AdminPage.php');
                } elseif ($row['User_type'] === "Registrar") {
                    $_SESSION['username'] = $UserName; // Store the original case
                    header('location: RegisterarPage.php');
                } elseif ($row['User_type'] === "Finance Officer") {
                    $_SESSION['username'] = $UserName; // Store the original case
                    header('location: finance_page.php');
                } elseif ($row['User_type'] === "External User") {
                    $_SESSION['username'] = $UserName; // Store the original case
                    header('location: external_userdashboard.php');
                } else {
                    echo "<script>alert('Something went wrong!');</script>";
                }
            } else {
                $message[] = 'Incorrect username or password!';
            }
        } else {
            // Handle database query error
            echo "Error executing query: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users log in page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            text-align: center;
            background-color: lavender;
        }

        .container {
            margin: 10px;
            padding: 30px;
            margin-top: 3%;
            margin-left: 33%;
            background-color: lavender;
            width: 500px;
            height: 600px;
            border: 0;
            border-radius: 20px;
        }

        .subcontainer {
            background-color: lightgray;
            padding: 30px;
            margin: 10px;
            border: 0;
            border-radius: 20px;
            height: 430px;
        }

        .input {
            padding: 8px;
            margin: 5px;
            width: 100%;
            height: 40px;
            border: 0;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            font-size: 18px;
            background-color: darkslateblue;
            width: 100%;
            color: white;
            border: 0;
            text-align: center;
            border-radius: 5px;
            height: 40px;
        }

        button:hover {
            color: white;
            background-color: orangered;
            cursor: pointer;
        }

        a {
            color: blue;
            text-decoration: none;
        }

        select {
            border: 0;
            width: 100%;
            height: 40px;
            border-radius: 5px;
        }

        #forgot {
            float: right;
        }

        .message {
            margin: 10px 0;
            width: 100%;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
            background-color: var(--red);
            color: var(--white);
            font-size: 20px;
        }

        .message_success {
            color: white;
            background-color: green;
            width: 100%;
            height: 40px;
        }
    </style>
</head>
<body>
<form method="post">
    <div class="container">
        <div class="subcontainer">
            <div style="background-color:green; color: white;">
                <?php
                if (isset($_SESSION['status'])) {
                    echo $_SESSION['status'];
                    unset($_SESSION['status']);
                }
                ?>
            </div>
            <h3>Login</h3>

            <?php
            if (isset($message)) {
                foreach ($message as $message) {
                    echo "<div class='message'>" . $message . "</div>";
                }
            }
            ?>

            <div>
                <input type="text" name="username" class="input" placeholder="Enter username" autocomplete="off"
                       autofocus required>
            </div>
            <br>

            <div>
                <input type="password" name="password" class="input" placeholder="Enter password" required>
            </div>
            <br>

            <div>
                <button type="submit" name="Login">Login</button>
            </div>
            <br>
            <div>
                <p><font size="4" color='black'>Don't have an account?</font>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="register.php"><font size='4' color='blue'>Sign up</font></a>
            </div>
            <br>
            <a id="forgot" href="forgot_password.php"><font size='4' color='blue'>Forgot password?</font></a>
            <a id="back" href="index.php"><font size='4' color='blue'>Back</font></a>

        </div>
    </div>
</form>

</body>
</html>