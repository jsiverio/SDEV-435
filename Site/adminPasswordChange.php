<!DOCTYPE html>
<html data-bs-theme="light" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <title>Project Polaris</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Inter&amp;display=swap"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"
    />
    <link
      rel="stylesheet"
      href="assets/css/Ludens---1-Dark-mode-Index-Table-with-Search-Filters.css"
    />
    <link
      rel="stylesheet"
      href="assets/css/Navbar-Right-Links-Dark-icons.css"
    />
  </head>

  <body style="background: #fbfbfd; font-family: Inter, sans-serif">
    <!-- Navbar -->
    <?php
    session_start();
    include 'adminNav.php';
    if (isset($_GET['error'])) {
    echo(
    '<div
      class="container"
      style="height: 107px; padding-top: 40px; width: 420px;">
      <div
        class="alert alert-danger alert-dismissible fade show text-center"
        role="alert"
        style="width: 400px"
        id = "serverValidationMsg"
      >
        <span style="font-family: Inter, sans-serif; font-size: 14px"
          ><strong>'.$_GET['error'].'</strong></span
        >
        <button
          class="btn-close"
          type="button"
          data-bs-dismiss="alert"
          ></button>
    
        
      </div>
    </div>');
    }
    if (isset($_GET['success'])) {
      echo(
      '<div
        class="container"
        style="height: 107px; padding-top: 40px; width: 420px;">
        <div
          class="alert alert-success alert-dismissible fade show text-center"
          role="alert"
          style="width: 400px"
          id = "serverValidationMsg"
        >
          <span style="font-family: Inter, sans-serif; font-size: 14px"
            ><strong>'.$_GET['success'].'</strong></span
          >
          <button
            class="btn-close"
            type="button"
            data-bs-dismiss="alert"
            ></button>
      
          
        </div>
      </div>');
      }
    ?>
    <div
      class="container"
      style="
        width: 400px;
        margin-top: 32px;
        margin-right: auto;
        margin-left: auto;
        background: rgb(255, 255, 255);
        border-radius: 10px;
        padding-right: 32px;
        padding-left: 32px;
        box-shadow: 1px 2px 20px 4px #c9cccf;
        padding-top: 13px;
        padding-bottom: 32px;
      "
    >
      <form
        id="passwordChangeForm"
        class="needs-validation"
        method="POST"
        action="Scripts/FormHandlers/passwordChangeHandler.php"
        novalidate
      >
        <div style="margin-top: 32px; height: 100px">
          <label
            class="form-label"
            style="
              color: var(--bs-gray-800);
              font-size: 16px;
              font-family: Inter, sans-serif;
            "
            for="oldPassword"
            >Old Password</label
          ><input
            class="form-control"
            type="password"
            id="oldPassword"
            name="oldPassword"
          /><small></small>
        </div>
        <div style="margin-top: 32px; height: 100px">
          <label
            class="form-label"
            style="
              color: var(--bs-gray-800);
              font-size: 16px;
              font-family: Inter, sans-serif;
            "
            for="newPassword"
            >New Password</label
          ><input
            class="form-control"
            type="password"
            id="newPassword"
            name="newPassword"
          /><small></small>
        </div>
        <div style="margin-top: 24px; height: 100px">
          <label
            class="form-label"
            style="
              color: var(--bs-gray-800);
              font-size: 16px;
              font-family: Inter, sans-serif;
            "
            for="confirmPassword"
            >Confirm Password</label
          ><input
            class="form-control"
            type="password"
            id="confirmPassword"
            name="confirmPassword"
          />
          <div></div>
          <small></small>
        </div>
        <div id="passwordHelper">
          <div id = "passwordHelpLength" class="form-text" style=" font-size:.750rem; font-family: Inter, sans-serif">Must be at least 8 characters long</div>
          <div id = "passwordHelpUppercase" class="form-text" style="font-size:.750rem; font-family: Inter, sans-serif">Must contain at least one uppercase letter</div>
          <div id = "passwordHelpLowercase" class="form-text" style="font-size:.750rem; font-family: Inter, sans-serif">Must contain at least one lowercase letter</div>
          <div id = "passwordHelpSpecial" class="form-text" style="font-size:.750rem; font-family: Inter, sans-serif">Must contain at least one special character or number</div>
          <div id = "passwordHelpMatch" class="form-text" style="font-size:.750rem; font-family: Inter, sans-serif">Passwords match</div>
        </div>
        <div style="margin-top: 21px; text-align: center">
          <input class="btn btn-primary" type="submit" />
        </div>
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
    <script src="js/passwordChangeValidation.js"></script>
  </body>
</html>