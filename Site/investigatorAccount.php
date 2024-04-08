<?php
session_start();
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
  <title>Project Polaris</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/Inter.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
  <link rel="stylesheet" href="assets/css/Ludens---1-Dark-mode-Index-Table-with-Search-Filters.css" />
  <link rel="stylesheet" href="assets/css/Navbar-Right-Links-Dark-icons.css" />
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<body style="background: #fbfbfd; font-family: Inter, sans-serif">
  <?php include 'investigatorNav.php'; ?>
  <div class="container shadow-lg" style="
        background: var(--bs-body-bg);
        border-radius: 10px;
        margin-top: 30px;
        width: 800px;
        padding: 12px 20px;
        padding-top: 12px;
        padding-bottom: 12px;
        padding-right: 20px;
      ">
    <div class="row">
      <div class="col align-self-end" style="border-bottom-width: 1px; border-bottom-style: solid">
        <h5 style="margin-bottom: 0px; display: inline-block">
          Profile Details:&nbsp;
        </h5>
       
      </div>
    </div>
    <form class="needs-validation" style="margin-top: 16px" method="post" action="" id="userEditForm" novalidate>
      <div class="row">
        <div class="col-3" style="height: 94px">
          <label class="form-label" for="name">First Name</label>
          <input type="hidden" name="id" id="id" value="<?php echo $_SESSION['users_id']; ?>">
          <input class="form-control" type="text" id="name" name="name" value="<?php echo ucfirst($_SESSION['firstName']) ?>" required />
          <small></small>
        </div>
        <div class="col-3" style="height: 94px">
          <label class="form-label" for="lastname">Last Name</label><input class="form-control" type="text" id="lastname" name="lastname" value="<?php echo ucfirst($_SESSION['lastName']) ?>" required />
          <small></small>
        </div>
        <div class="col-2" style="height: 94px">
          <label class="form-label" for="badge">Badge</label><input class="form-control" type="text" id="badge" name="badge" value="<?php echo $_SESSION['badge'] ?>" />
          <small></small>
        </div>
        <div class="col">
          <label class="form-label">Role</label>
          <input class="form-control" type="text" readonly value ="<?php echo getUserType($conn, $_SESSION['userType']);?>">
          <small></small>
        </div>
      </div>
      <div class="row">
        <div class="col" style="height: 94px">
          <label class="form-label" for="email">Email</label><input class="form-control" type="email" id="email" name="email" value="<?php echo $_SESSION['email'] ?>" />
          <small></small>
        </div>
        <div class="col" style="height: 94px">
          <label class="form-label" for="phone">Phone Number</label><input class="form-control" type="tel" id="phone" name="phone" placeholder="(###)###-####" maxlength=13 value="<?php
                                                                                                                                                                                      $phone = '(' . substr($_SESSION['phone'], 0, 3) . ')' . substr($_SESSION['phone'], 3, 3) . '-' . substr($_SESSION['phone'], 6, 4);
                                                                                                                                                                                      echo $phone;
                                                                                                                                                                                     ?>" required />
          <small></small>
        </div>
        <div class="col" style="height: 94px">
          <label class="form-label">Agency</label>
          <input class="form-control" type="text" readonly value ="<?php echo getUserAgency($conn, $_SESSION['agency']);?>">
        </div>
      </div>
      <div class="row" style="margin-top: 40px">
        <div class="col text-center">
          <input class="btn btn-primary" id="submit" type="submit" value="Save Changes" disabled />
        </div>
      </div>
    </form>
  </div>
  <div class="modal fade" tabindex="-1" id="modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Test</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Your profile has been updated successfully</p>
        </div>

        <script src="JS/accountValidation.js" defer></script>
        <script type="text/javascript">
          'JS/accountValidation.js';
          $(document).ready(function() {
            $('#userEditForm').on('submit', function(e) {
              var id = $('#id').val();
              var name = $('#name').val();
              var lastname = $('#lastname').val();
              var badge = $('#badge').val();
              var phone = $('#phone').val();
              var email = $('#email').val();
              var agency = $('#agency').val();

              if (!checkInputs()) {
                e.preventDefault();
              } else {
                e.preventDefault();
                $.ajax({
                  type: 'POST',
                  url: 'Scripts/FormHandlers/userUpdateAjx.php',
                  data: {
                    id: id,
                    name: name,
                    lastname: lastname,
                    badge: badge,
                    phone: phone,
                    email: email
                  },
                  success: function(data) {
                    $(".modal-header").html("<h5 class='modal-title'>Account Information Updated</h5>");
                      $(".modal-header").attr("style", "color: green");
                      $(".modal-body").html("<p>Your profile has been updated successfully</p>");
                    const newModal = new bootstrap.Modal(document.getElementById('modal'));
                    newModal.show();
                  } 
                });
              }
            });
          });  
        </script>
        <?php refreshUser($conn, $_SESSION['users_id']); 
        ?>
        

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