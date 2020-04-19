<!DOCTYPE html>
<html>
<?php
session_start();
$login = false;
if (isset($_SESSION["user_session"])) {
    $login = true;
    include_once("./include/connection.php");
    $email_id = $_SESSION['user_session'];
    $fetch_admin_info = "SELECT * FROM account WHERE emailid= '$email_id'";
    $result = mysqli_query($conn, $fetch_admin_info);
    $row = mysqli_fetch_array($result);
    $name = $row['name'];
}
?>

<head>
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/dashboard.css"> -->
    <!-- Add library  -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="lib/jquery/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script> -->
    <script src="lib/jquery/validation.min.js"></script>

    <script src="js/style.js"></script>
    <script src="js/login.js"></script>
    <script src="js/register.js"></script>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-sm-10 text-center">
                <h2 style="color:#2296f5"> Welcome <?php echo $name; ?></h2>
            </div>
            <div class="col-sm-1 col-md-1"></div>
            <div class="col-md-1 col-sm-1">
                <h2 style="color:#2296f5;font-size:16px;font-weight: bold; text-align:right"><a href="logout.php">LOGOUT</a></h2>
            </div>
        </div>
    </div>
    <!-- userprofile -->
    <div class="container">
        <div class="row">
            <div class="col-md-3 text-center" style="margin-top:4em">
                <img src="profile_image/<?php echo $row['profile_photo'] ?>" width="100px" height="100px" /><br>
                <h4 style="color:#2296f5;font-size:12px;font-weight: bold;"><a>Email :<?php echo $email_id ?></a></h4>


            </div>
            <div class="col-md-3"></div>
            <div class="col-md-4 ">
                <!-- converter start -->

                <form method="post" class="form-group" id="currency-form">
                    <div class="form-modal">
                        <label>From</label>
                        <select name="from_currency">
                            <option value="INR">Indian Rupee</option>
                            <option value="USD" selected="1">US Dollar</option>
                            <option value="AUD">Australian Dollar</option>
                            <option value="EUR">Euro</option>
                            <option value="EGP">Egyptian Pound</option>
                            <option value="CNY">Chinese Yuan</option>
                        </select>
                        &nbsp;<label>Amount</label>
                        <input type="text" placeholder="Currency" name="amount" id="amount" />
                        &nbsp;<label>To</label>
                        <select name="to_currency">
                            <option value="INR" selected="1">Indian Rupee</option>
                            <option value="USD">US Dollar</option>
                            <option value="AUD">Australian Dollar</option>
                            <option value="EUR">Euro</option>
                            <option value="EGP">Egyptian Pound</option>
                            <option value="CNY">Chinese Yuan</option>
                        </select>
                        &nbsp;&nbsp;<button type="submit" name="convert" id="convert" class="btn btn-default">Convert</button>

                    </div>
                </form>

                <div class="form-group" id="converted_rate"></div>
                <div id="converted_amount"></div>
                <!-- x-x-x-x converter endsx-x-xx-x -->

            </div>
          
        </div>
    </div>


</body>

</html>