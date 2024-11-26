<?php
include 'connection.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($email) || empty($password)) {
        die("All fields are required!");
    }

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Set session and redirect to welcome page
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header("Location: welcome.php");
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No account found with that email!";
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
       html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #800080; 
            display: flex;
            justify-content: center; 
            align-items: center;      
            height: 100vh;        
        }

        .form-container {
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px; 
            text-align: center;
        }

        .form-container h2 {
            margin-bottom: 30px;
            font-size: 30px;
        }

        .form-container .input-wrapper {
            position: relative;
            margin-bottom: 15px;
        }

        .form-container .input-wrapper i {
            position: absolute;
            left: 10px;
            top: 12px;
            font-size: 17px;
            color: black;
            margin-top: 5px;
        }

        .form-container input {
            width: 85%;
            padding: 12px 12px 12px 40px; 
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        

        .form-container button:hover {
            background-color: gray;
        }

        .form-container p {
            margin-top: 15px;
        }

        .form-container a {
            color: #007bff;
            text-decoration: none;
        }

        .form-container a:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            font-size: 14px;
        }

        .login-btn{
            background-color:black;
            color: white;
            font-size: 16px;
            padding: 12px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            width: 85%;
            margin-bottom: 20px;
        margin-top:20px;
        }

    </style>
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <input type="email" name="email" placeholder="Enter your email" required>
            <input type="password" name="password" placeholder="Enter your password" required>
            <button type="submit" class="login-btn">Login</button>
        </form>
        <p>Don't have an account? <a href="index.php">Sign up here</a></p>
    </div>
</body>
</html>