
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/fontawesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=lock" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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

        /* Facebook Button */
        .facebook-btn {
            background-color: #3b5998; 
            color: white;
            font-size: 16px;
            padding: 12px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
            margin-bottom: 10px;
        }

        .facebook-btn:hover {
            background-color: #2d4373; 
        }

        /* Google Button */
        .google-btn {
            background-color:#db4437;
            color: white;
            font-size: 16px;
            padding: 12px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
            margin-bottom: 10px;
            
        }

        .google-btn:hover {
            background-color: #c23321; 
        }

        .Sign-up-btn{
            background-color:black;
            color: white;
            font-size: 16px;
            padding: 12px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
            margin-bottom: 10px;
        }





    </style>
</head>
<body>
    <div class="form-container">
        <h2>Signup</h2>
        <form action="db.php" method="POST" id="signupForm">
            <div class="input-wrapper">
                <i class="fas fa-user"></i>
                <input type="text" name="name" class="name" placeholder="Enter your name" required>
            </div>
            <div class="input-wrapper">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" class="email" placeholder="Enter your email" required>
            </div>
            <div class="input-wrapper">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" class="password" placeholder="Enter your password" required>
            </div>
            <div class="input-wrapper">
                <i class="fas fa-lock"></i>
                <input type="password" name="confirm_password" id="confirm_password" class="confirm_password" placeholder="Confirm your password" required>
            </div>
            <span id="passwordError" class="error"></span>
            <button type="submit" class="Sign-up-btn">Sign up</button>
            <button type="button" class="facebook-btn">Login with facebook</button>
            <button type="button" class="google-btn">Login with Google</button>
        </form>

        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>

    <script>
        document.getElementById("signupForm").addEventListener("submit", function(event) {
            
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirm_password").value;
            const passwordError = document.getElementById("passwordError");

            if (password !== confirmPassword) {
                event.preventDefault(); 
                passwordError.textContent = "Passwords do not match!";
            } else {
                passwordError.textContent = "";
            }
        });
    </script>
</body>
</html>