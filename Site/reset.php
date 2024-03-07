<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Polaris - Reset your Password</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Inter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/Ludens---1-Dark-mode-Index-Table-with-Search-Filters.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-Dark-icons.css">
    <style>
        .passwordHelpValid {
            color: #198754;
        }
       .passwordHelpInvalid {
            color: #dc3545;
        }
    </style>
</head>

<body style="background: #fbfbfd;font-family: Inter, sans-serif;">
    <div class="container" style="height: 107px;padding-top: 40px;width: 420px;">
        <?php
        if (isset($_GET['error'])) {
            $msg = $_GET['error'];
            echo '<div id ="serverValidationMsg" class="alert alert-danger alert-dismissible fade show text-center" role="alert" style="width: 400px;">
        <span style="font-family: Inter, sans-serif;font-size: 14px;">
        <strong>' . $msg . '</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
        }
        ?>
    </div>
    <div class="container" style="width: 400px; height: 600px; margin-top: 0px;margin-right: auto;margin-left: auto;background: rgb(255,255,255);border-radius: 10px;padding-right: 32px;padding-left: 32px;box-shadow: 1px 2px 20px 4px #c9cccf;">
        <div style="text-align: center;"><img src="assets/img/Polaris%20small.svg" width="339" height="101" style="margin-top: 16px;"></div>
        <form id="passwordResetForm" name="passwordReset" action="Scripts/FormHandlers/passwordResetFormHandler.php" method="POST" class="needs-validation" novalidate>
            <div style="margin-top: 32px;height: 100px;">
                <label class="form-label" style="color: var(--bs-gray-800);font-size: 16px;font-family: Inter, sans-serif;" for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password" required>
                <small></small>
            </div>
            <div style="margin-top: 24px;height: 100px;">
                <label class="form-label" style="color: var(--bs-gray-800);font-size: 16px;font-family: Inter, sans-serif;" for="password2">Confirm Password</label>
                <input class="form-control" type="password" id="password2" name="password2" required>
                <small></small>
            </div>
            <div>
                <div id = "passwordHelpLength" class="form-text" style=" font-size:.750rem; font-family: Inter, sans-serif">Must be at least 8 characters long</div>
                <div id = "passwordHelpUppercase" class="form-text" style="font-size:.750rem; font-family: Inter, sans-serif">Must contain at least one uppercase letter</div>
                <div id = "passwordHelpLowercase" class="form-text" style="font-size:.750rem; font-family: Inter, sans-serif">Must contain at least one lowercase letter</div>
                <div id = "passwordHelpSpecial" class="form-text" style="font-size:.750rem; font-family: Inter, sans-serif">Must contain at least one special character or number</div>
                <div id = "passwordHelpMatch" class="form-text" style="font-size:.750rem; font-family: Inter, sans-serif">Passwords match</div>
                <input type="hidden" name="token" id= "token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];}?>">
                <input type="hidden" name="uid" id="uid" value="<?php if(isset($_GET['uid'])){echo $_GET['uid'];}?>">
            </div>
            <div style="margin-top: 40px;text-align: center;"><input class="btn btn-primary" type="submit"></div>
        </form>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="assets/js/Ludens---1-Dark-mode-Index-Table-with-Search-Filters-Ludens---1-Index-Table-with-Search--Sort-Filters-v20-1.js"></script>
    <script src="assets/js/Ludens---1-Dark-mode-Index-Table-with-Search-Filters-Ludens---1-Index-Table-with-Search--Sort-Filters-v20.js"></script>
    <script src="assets/js/Ludens---1-Dark-mode-Index-Table-with-Search-Filters-main.js"></script>
    <script src="JS/passwordResetValidation.js"></script>
</body>

</html>