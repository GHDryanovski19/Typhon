<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../img/favicon.png" rel="shortcut icon"/>
    <link rel="stylesheet" href="../css/reglog.css">
    
</head>
<body class="formBackground">
    
    <section class="left-section">
        <div id="left-cover" class="cover cover-hide">
        <img src="../img/cover.jpg" alt="">
            <h1>Welcome !</h1>
            <h3>Already have an account ?</h3>
            <button type="button" class="switch-btn" onclick="location.reload()">Login</button>
        </div>
        <div id="left-form" class="form fade-in-element">
            <h1>Login</h1>
            <form action="login.php" method="post">
                <input type="text" name="user-name" class="input-box" placeholder="User Name">
                <input type="password" name="user-pass" class="input-box" placeholder="Password">
                <input type="submit" name="login-btn" class="btn" value="Login">
            </form>
            <button type="button" class="btn" onclick="goBack()">Go Back</button>
        </div>
    </section>

    <section class="right-section">
        <div id="right-cover" class="cover fade-in-element">
        <img src="../img/cover.jpg" alt="">
            <h1>Welcome !</h1>
            <h3>Don't have an account ?</h3>
            <button type="button" class="switch-btn" onclick="switchSignup()">Signup</button>
        </div>
        <div id="right-form" class="form form-hide">
            <h1>Signup</h1>
            <form action="signup.php" method="post">
                <input type="text" name="username" class="input-box" placeholder="User Name"
                pattern=".{6,}" title="Username must contain at least 6 letters">
                <input type="email" name="email" class="input-box" placeholder="Email"
                pattern="[^@\s]+@[^@\s]+">
                <input type="password" name="password" class="input-box" placeholder="Password"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                title="Must contain at least one number and one uppercase and lowercase letter, 
                and at least 8 or more characters">
                <input type="submit" name="signup" class="btn" value="Signup">
            </form>
            <br>
            <button type="button" class="btn" onclick="goBack()">Go Back</button>
        </div>
    </section>

    <script src="../js/javascript.js"></script>

</body>
</html>