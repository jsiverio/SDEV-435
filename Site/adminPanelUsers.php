<?php
session_start();
require 'Scripts/Misc/pagination.php';
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
</head>

<body style="background: #fbfbfd; font-family: Inter, sans-serif">
  <?php include 'adminNav.php'; ?>
  <div class="container shadow-lg" style="
        background: var(--bs-body-bg);
        border-radius: 10px;
        margin-top: 30px;
      ">
    <div class="row">
      <div class="col align-self-end" style="padding-top: 12px">
        <h4 style="margin-bottom: 0px">Users</h4>
      </div>
      <div class="col-3" style="padding-top: 12px">
        <div class="input-group">
          <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-search">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"></path>
            </svg></span><input class="form-control" type="text" /><button class="btn btn-primary" type="button">
            Search
          </button>
        </div>
      </div>
    </div>
    <div class="row" style="margin-top: 25px">
      <div class="col">
        <div class="table-responsive">
          <table class="table table-sm">
            <thead style="font-family: Inter, sans-serif">
              <tr>
                <th class="text-center" hidden>id</th>
                <th class="text-center">User</th>
                <th class="text-center">Agency</th>
                <th class="text-center">Email</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Badge</th>
                <th class="text-center">Status</th>
                <th class="text-center">Role</th>
              </tr>
            </thead>
            <tbody class="fw-normal" style="font-family: Inter, sans-serif">
              <?php
              $result = getUsers($start, $rowsPerPage, $_SESSION['users_id']);
              foreach ($result as $row) {
                echo "<tr>";
                $link = "adminUserEdit.php?id=" . $row['users_id'] . "&name=" . $row['name'] . "&lastname=" . $row['last_name'] . "&badge=" . $row['badge'] . "&phone=" . $row['phone_number'] . "&email=" . $row['email'] . "&wrongpwd=" . $row['wrong_pwd_count'] . "&type=" . $row['user_type'] . "&status=" . $row['user_status'] . "&agency=" . $row['agency'];
                echo "<td class='text-center' hidden>" . $row['users_id'] . "</td>";
                $name = ucfirst($row['name']) . " " . ucfirst($row['last_name']);
                echo "<td class='text-center'><a class='link-primary link-opacity-25-hover' href='$link'>$name</a></td>";
                echo "<td class='text-center'>" . getUserAgency($conn, $row['agency']) . "</td>";
                echo "<td class='text-center'>" . $row['email'] . "</td>";
                $phone = '(' . substr($row['phone_number'], 0, 3) . ')' . substr($row['phone_number'], 3, 3) . '-' . substr($row['phone_number'], 6, 4);
                echo "<td class='text-center'>" . $phone . "</td>";
                echo "<td class='text-center'>" . $row['badge'] . "</td>";
                switch ($row['user_status']) {
                  case 1:
                    echo "<td class='text-center'><span class='badge rounded-pill bg-primary text-center'>Active</span></td>";
                    break;
                  case 2:
                    echo "<td class='text-center'><span class='badge rounded-pill bg-warning text-center'>Pending</span></td>";
                    break;
                  case 3:
                    echo "<td class='text-center'><span class='badge rounded-pill bg-danger text-center'>Suspended</span></td>";
                    break;
                }
                echo "<td class='text-center'>" . getUserType($conn, $row['user_type']) . "</td>";
                echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
        <div>
          <ul class="pagination justify-content-center">
            <li class="page-item">
              <a class="page-link" href="?page=1" aria-label="First">
                <span>&laquo;</span>
              </a>
            </li>
            <li class="page-item">
              <?php
              if (isset($_GET['page']) && $_GET['page'] > 1) {
              ?>
                <a class='page-link' href="?page=<?php echo $_GET['page'] - 1 ?>" aria-label='Previous'><span>&lsaquo;</span></a>
              <?php
              } else {
              ?>
                <a class='page-link'><span>&lsaquo;</span></a>
              <?php
              }
              ?>
            </li>
            <?php
            for ($i = 1; $i <= $pages; $i++) {
            ?>
              <li class="page-item"><a class="page-link" href="?page=<?php echo $i ?>"><?php echo $i ?></a></li>
            <?php
            }
            ?>
            <li class="page-item">
              <?php
              if (!isset($_GET['page'])) {
              ?>
                <a class="page-link" href="?page=2" aria-label="Next">
                  <span>&rsaquo;</span>
                </a>
                <?php
              } else {
                if ($_GET['page'] >= $pages) {
                ?>
                  <a class="page-link" aria-label="Next">
                    <span>&rsaquo;</span>
                  </a>
                <?php
                } else {
                ?>
                  <a class="page-link" href="?page=<?php echo $_GET['page'] + 1 ?>" aria-label="Next">
                    <span>&rsaquo;</span>
                  </a>
              <?php
                }
              }
              ?>
            </li>
            <li class="page-item">
              <a class="page-link" href="?page=<?php echo $pages; ?>" aria-label="Last">
                <span>&raquo;</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
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