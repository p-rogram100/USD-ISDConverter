<!DOCTYPE html>
<html>

<head>


    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mediaquery.css">
   
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
   
    
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/jquery/jquery.min.js"></script>
   
    <script src="lib/jquery/validation.min.js"></script>

    <script src="js/style.js"></script>
    <script src="js/login.js"></script>
    <script src="js/register.js"></script>

    <title>USD_ISD Convertor</title>
</head>

<body>

   


    <div class="form-modal">

        <div class="form-toggle">
            <button id="login-toggle" onclick="toggleLogin()">log in</button>
            <button id="signup-toggle" onclick="toggleSignup()">sign up</button>
        </div>

        <div id="login-form">
            <form id="user_login_form" method="POST">

                <input type="text" placeholder="Enter email or username" name="login_email" id="login_email" />
                <input type="password" placeholder="Enter password" name="login_pass" id="login_pass" />
                <button type="submit" class="btn login" name="login_button" id="login_button"> <span class="glyphicon glyphicon-log-in"></span>login</button>
               

            </form>
        </div>
        <div id="error"></div>
        <div id="signup-form">
            <form id="user_regis_form" method="POST" enctype="multipart/form-data" data-toggle="validator">

                <input type="text" placeholder="Enter name" name="user_name" id="user_name" required pattern="^([a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)){5,50}$" />
                <div class="help-block with-errors"></div>
                <input type="email" placeholder="Enter your email" name="user_email_id" id="user_email_id" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  title="format = example@gmail.com"/>
                <input type="password" placeholder="Create password" name="user_password" id="user_password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" />
                <input type="file" title="please choose ur profile photo" name="file" id="file" required onchange="return fileValidation()" />

                <button type="submit" class="btn signup" placeholder="profile photo" id="btn-save" name="btn-save">create account</button>

            </form>
            <div id="error1"></div>
        </div>

    </div>


</body>

</html>