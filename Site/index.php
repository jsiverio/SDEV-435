<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Project Polaris</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Inter.css">
</head>

<body style="background: #fbfbfd; font-family: inter,sand-serif;">
    <div class="container" style="height: 107px;padding-top: 20px;width: 420px;">
        <?php
        if (isset($_GET['error'])) {
            $msg = $_GET['error'];
            echo '<div id ="serverValidationMsg" class="alert alert-danger alert-dismissible fade show text-center" role="alert" style="width: 400px;">
                <span style="font-family: Inter, sans-serif;font-size: 14px;">'. $msg .
                '<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';  
        }
        if (isset($_GET['success'])) {
            $msg = $_GET['success'];
            echo '<div id ="serverValidationMsg" class="alert alert-success alert-dismissible fade show text-center" role="alert" style="width: 400px;">
                <span style="font-family: Inter, sans-serif;font-size: 14px;">'. $msg .
                '<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
        }
        ?>
    </div>
    <div class="container" style="width: 400px;margin-right: auto;margin-left: auto;background: rgb(255,255,255);border-radius: 10px;height: 550px;padding-right: 32px;padding-left: 32px;box-shadow: 1px 2px 20px 4px #c9cccf;">
        <div style="text-align: center;"><img src="assets/img/Polaris%20small.svg" width="339" height="101" style="margin-top: 16px;"></div>
        <form id="loginForm" class="needs-validation" method="post" action="Scripts/FormHandlers/loginFormHandler.php" novalidate>
            <div style="margin-top: 32px; height:100px "><label class="form-label" style="color: var(--bs-gray-800);font-size: 16px;font-family: Inter, sans-serif;" for="email">Email</label><input class="form-control" type="email" id="email" name="email" required>
                <small></small>
            </div>
            <div style="margin-top: 12px; height:100px;"><label class="form-label" style="color: var(--bs-gray-800);font-size: 16px;font-family: Inter, sans-serif;" for="password">Password</label><input class="form-control" type="password" id="password" name="password" required>
                <small> </small>
            </div>
            <div style="padding-top: 30px ;text-align: center;"><input class="btn btn-primary" type="submit" value="Log in"></div>
        </form>
        <div style="text-align: center;margin-bottom: 0px;margin-top: 20px;"><a style="font-family:Inter, sans-serif;" href="register.php">Register</a></div>
        <div style="text-align: center;margin-bottom: 0px;margin-top: 10px;"><a style="font-family:Inter, sans-serif;" href="forgot.php">Forgot password?</a></div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script defer src="loginFormValidation.js"></script>
</body>

</html>