<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Project Polaris</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Inter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/Ludens---1-Dark-mode-Index-Table-with-Search-Filters.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-Dark-icons.css">
</head>

<body style="background: #fbfbfd;">
    <div class="container" style="height: 107px;padding-top: 20px;width: 420px;">
        <?php
        if (isset($_GET['error'])) {
            $msg = $_GET['error'];
            echo '<div id ="serverValidationMsg"class="alert alert-danger alert-dismissible fade show text-center" role="alert" style="width: 400px;">
                <span style="font-family: Inter, sans-serif;font-size: 14px;">'. $msg .
                '<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';    
        }
        ?>
    </div>
    <div class="container">
    <?php 
        if(isset($_GET['error'])){
            echo 'display:none;';
        }
    ?> width: 400px;margin-top: 114px;margin-right: auto;margin-left: auto;background: rgb(255,255,255);border-radius: 10px;height: 278.667px;padding-right: 32px;padding-left: 32px;box-shadow: 1px 2px 20px 4px #c9cccf;">
        <div style="text-align: center;"><a href="index.php"><img src="assets/img/Polaris%20small.svg" width="339" height="101" style="margin-top: 16px;"></a></div>
        <div class="row" style="text-align: center;padding-top: 40px;"><span style="font-family: Inter, sans-serif;font-weight: bold;">Check your email.</span><span style="font-family: Inter, sans-serif;">Follow the instructions provided in the email to reset your password.</span></div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="assets/js/Ludens---1-Dark-mode-Index-Table-with-Search-Filters-Ludens---1-Index-Table-with-Search--Sort-Filters-v20-1.js"></script>
    <script src="assets/js/Ludens---1-Dark-mode-Index-Table-with-Search-Filters-Ludens---1-Index-Table-with-Search--Sort-Filters-v20.js"></script>
    <script src="assets/js/Ludens---1-Dark-mode-Index-Table-with-Search-Filters-main.js"></script>
</body>
</html>