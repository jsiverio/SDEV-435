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
    <div class="container" style="height: 169px;padding-top: 104px;width: 420px;">
        <?php
        if (isset($_GET['error'])) {
            $msg = $_GET['error'];
            echo '<div id ="serverValidationMsg"class="alert alert-danger alert-dismissible fade show text-center" role="alert" style="width: 400px;">
                <span style="font-family: Inter, sans-serif;font-size: 14px;">'. $msg .
                '<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
        }
        ?>
    </div>
    <div class="container" style="width: 400px;margin-right: auto;margin-left: auto;background: rgb(255,255,255);border-radius: 10px;height: 409.667px;padding-right: 32px;padding-left: 32px;box-shadow: 1px 2px 20px 4px #c9cccf;">
        <div style="text-align: center;"><a href="index.html"><img src="assets/img/Polaris%20small.svg" width="339" height="101" style="margin-top: 16px;"></a></div>
        <form id="forgotForm" class="needs-validation" action="Scripts/FormHandlers/forgotFormHandler.php" method="post" novalidate>
            <div style="margin-top: 32px;"><label class="form-label" style="color: var(--bs-gray-800);font-size: 16px;font-family: Inter, sans-serif;" for="email">Email</label><input class="form-control" type="email" id="email" name="email" required>
                <small></small>
            </div>
            <div style="margin-top: 64px;text-align: center;"><input class="btn btn-primary" type="submit"></div>
        </form>
    </div>
    <script defer src="JS/forgotFormValidation.js"></script>
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