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
  <?php include 'adminNav.php'; ?>
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
          Status:&nbsp;
        </h5>
        <?php
        if (isset($_GET['status'])) {
          if ($_GET['status'] == 1) {
            echo "<span class='text-primary' style='display: inline-block; font-weight: bold'>Active</span>";
          } else if ($_GET['status'] == 2) {
            echo "<span class='text-warning' style='display: inline-block; font-weight: bold'>Pending</span>";
          } else if ($_GET['status'] == 3) {
            echo "<span class='text-danger' style='display: inline-block; font-weight: bold'>Suspended</span>";
          }
        } else {
          echo "<span class='text-primary' style='display: inline-block; font-weight: bold'>Active</span>";
        }
        ?>
      </div>
    </div>
    <form class="needs-validation" style="margin-top: 16px" method="post" action="" id="userEditForm" novalidate>
      <div class="row">
        <div class="col-3" style="height: 94px">
          <label class="form-label" for="name">First Name</label>
          <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
          <input type="hidden" name="status" id="status" value="<?php echo $_GET['status']; ?>">
          <input class="form-control" type="text" id="name" name="name" value="<?php if (isset($_GET['name'])) {
                                                                                  echo ucfirst($_GET['name']);
                                                                                } ?>" required />
          <small></small>
        </div>
        <div class="col-3" style="height: 94px">
          <label class="form-label" for="lastname">Last Name</label><input class="form-control" type="text" id="lastname" name="lastname" value="<?php if (isset($_GET['lastname'])) {
                                                                                                                                                    echo ucfirst($_GET['lastname']);
                                                                                                                                                  } ?>" required />
          <small></small>
        </div>
        <div class="col-2" style="height: 94px">
          <label class="form-label" for="badge">Badge</label><input class="form-control" type="text" id="badge" name="badge" value="<?php if (isset($_GET['badge'])) {
                                                                                                                                      echo $_GET['badge'];
                                                                                                                                    } ?>" />
          <small></small>
        </div>
        <div class="col">
          <label class="form-label">Role</label><select class="form-select" id="role" name="role">
            <optgroup label="Select Role">
              <option value="0"></option>"
              <?php
              $roles = getRole($conn);
              foreach ($roles as $role) {
                echo "<option value='" . $role[0] . "'";
                if (isset($_GET['type']) && $_GET['type'] == $role[0]) {
                  echo " selected";
                };
                echo ">$role[1]</option>";
              }
              ?>
            </optgroup>
          </select>
          <small></small>
        </div>
      </div>
      <div class="row">
        <div class="col" style="height: 94px">
          <label class="form-label" for="email">Email</label><input class="form-control" type="email" id="email" name="email" value="<?php if (isset($_GET['email'])) {
                                                                                                                                        echo $_GET['email'];
                                                                                                                                      } ?>" />
          <small></small>
        </div>
        <div class="col" style="height: 94px">
          <label class="form-label" for="phone">Phone Number</label><input class="form-control" type="tel" id="phone" name="phone" placeholder="(###)###-####" maxlength=13 value="<?php if (isset($_GET['phone'])) {
                                                                                                                                                                                      $phone = '(' . substr($_GET['phone'], 0, 3) . ')' . substr($_GET['phone'], 3, 3) . '-' . substr($_GET['phone'], 6, 4);
                                                                                                                                                                                      echo $phone;
                                                                                                                                                                                    } ?>" required />
          <small></small>
        </div>
        <div class="col" style="height: 94px">
          <label class="form-label">Agency</label><select class="form-select" name="agency" id="agency">
            <optgroup label="Select Agency">
              <?php
              $agencies = getAgencies($conn);
              foreach ($agencies as $agency) {
                echo "<option value='" . $agency[0] . "'";
                if (isset($_GET['agency']) && $_GET['agency'] == $agency[1]) {
                  echo " selected";
                };
                echo ">$agency[1]</option>";
              }
              ?>
            </optgroup>
          </select>
        </div>
      </div>
      <div class="row" style="margin-top: 40px">
        <div class="col text-center">
          <input class="btn btn-primary" id="submit" type="submit" value="Save Changes" disabled />
        </div>
      </div>
    </form>
    <div class="row" style="margin-top: 16px">
      <div class="col align-self-end" style="border-bottom-width: 1px; border-bottom-style: solid">
        <h5 style="margin-bottom: 0px; display: inline-block">
          Actions:&nbsp;
        </h5>
      </div>
    </div>
    <div class="row" style="margin-top: 16px">
      <div class="col align-self-end" style="border-bottom-width: 1px">
        <div class="btn-group" role="group">
          <?php
          if ($_GET['status'] == 1) {
            echo "<button class='btn btn-danger' type='button' id='suspendBtn'>Suspend Account</button>";
          } else if ($_GET['status'] == 2) {
            echo "<button class='btn btn-success' type='button' id='approveBtn'>Approve Account</button>";
          } else if ($_GET['status'] == 3) {
            echo "<button class='btn btn-warning' type='button' id='unlockBtn'>Unlock Account</button>";
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" tabindex="-1" id="modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Test</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>User information has been updated successfully</p>
        </div>

        <script src="JS/adminUserEditValidation.js" defer></script>
        <script type="text/javascript">
          'JS/adminUserEditValidation.js';
          $(document).ready(function() {
            $('#userEditForm').on('submit', function(e) {
              var id = $('#id').val();
              var name = $('#name').val();
              var lastname = $('#lastname').val();
              var badge = $('#badge').val();
              var phone = $('#phone').val();
              var email = $('#email').val();
              var role = $('#role').val();
              var status = $('#status').val();
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
                    email: email,
                    role: role,
                    status: status,
                    agency: agency
                  },
                  success: function(data) {
                    $(".modal-header").html("<h5 class='modal-title'>Account Information Updated</h5>");
                      $(".modal-header").attr("style", "color: green");
                      $(".modal-body").html("<p>The user account has been updated</p>");
                    const newModal = new bootstrap.Modal(document.getElementById('modal'));
                    newModal.show();
                  }

                });
              }

            });
          });
        </script>

        <script type="text/javascript">
          $(document).ready(function() {
            $(".btn").each(function() {
              if (this.id == "suspendBtn") {
                this.addEventListener('click', function() {
                  $.ajax({
                    type: 'POST',
                    url: 'Scripts/FormHandlers/userEditActionAjx.php',
                    data: {
                      id: $('#id').val(),
                      status: $('#status').val()
                    },
                    success: function(data) {
                      $(".modal-header").html("<h5 class='modal-title'>Account Suspended</h5>");
                      $(".modal-header").attr("style", "color: red");
                      $(".modal-body").html("<p>The user account has been suspended</p>");
                      const newModal = new bootstrap.Modal(document.getElementById('modal'));
                      newModal.show();
                    }
                  });
                });
              } else if (this.id == "approveBtn") {
                this.addEventListener('click', function() {
                  $.ajax({
                    type: 'POST',
                    url: 'Scripts/FormHandlers/userEditActionAjx.php',
                    data: {
                      id: $('#id').val(),
                      status: $('#status').val()
                    },
                    success: function(data) {
                      $(".modal-header").html("<h5 class='modal-title'>Account Approved</h5>");
                      $(".modal-header").attr("style", "color: green");
                      $(".modal-body").html("<p>The user account has been approved</p>");
                      const newModal = new bootstrap.Modal(document.getElementById('modal'));
                      newModal.show();
                    }
                  });
                });
              } else if (this.id == "unlockBtn") {
                this.addEventListener('click', function() {
                  $.ajax({
                    type: 'POST',
                    url: 'Scripts/FormHandlers/userEditActionAjx.php',
                    data: {
                      id: $('#id').val(),
                      status: $('#status').val()
                    },
                    success: function(data) {
                      $(".modal-header").html("<h5 class='modal-title'>Account Unlocked</h5>");
                      $(".modal-header").attr("style", "color: green");
                      $(".modal-body").html("<p>The user account has been unlocked</p>");
                      const newModal = new bootstrap.Modal(document.getElementById('modal'));
                      newModal.show();
                    }
                  });
                });
              }

            });
          });
        </script>



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