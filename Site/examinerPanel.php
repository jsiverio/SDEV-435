<?php
session_start();
if (!isset($_SESSION['users_id']) || $_SESSION['userType'] != 3) {
    header('Location: index.php');
    die();
}
?>
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
    <link rel="stylesheet" href="assets/css/Inter.css" />
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

  <body style="background: #f4f4f4; font-family: Inter, sans-serif"
         >
 <!-- Navbar -->
 <?php
    require 'examinerNav.php';
 ?>
    <div
      class="container"
      style="
        background: transparent;
        padding-top: 40px;
        padding-bottom: 16px;
        padding-left: 40px;
        padding-right: 40px;
      "
      >
      <div>
        <h5 style="font-weight: bold">EXAMINER DASHBOARD</h5>
      </div>
      <div class="row" style="margin-top: 40px">
        <div
          class="col shadow-sm me-3"
          style="
            background: var(--bs-body-bg);
            border-radius: 10px;
            border-left: 10px solid rgb(0, 128, 255);
          "
          >
            <div
              class="text-center"
              style="padding: 12px 12px; padding-bottom: 0px"
              >
              <h2 style="font-size: 25px; display: block">Assigned</h2>
              <h2
                class="text-center"
                style="font-size: 35px; display: block; font-weight: bold"
              >
              <?php echo(getExaminerAssignedCasesCount($conn, $_SESSION['users_id']));  ?>
              </h2>
            </div>
        </div>
        
        <div
          class="col shadow-sm me-3"
          style="
            background: var(--bs-body-bg);
            border-radius: 10px;
            border-left: 10px solid rgb(0, 128, 255);
          "
          >
          <div
              class="text-center"
              style="padding: 12px 12px; padding-bottom: 0px"
              >
              <h2 style="font-size: 25px; display: block">In Progress</h2>
              <h2
                class="text-center"
                style="font-size: 35px; display: block; font-weight: bold"
              ><?php echo(getExaminersInProgressCasesCount($conn, $_SESSION['users_id']));  ?>
              </h2>
          </div>
        </div>

        <div
          class="col shadow-sm"
          style="
            background: var(--bs-body-bg);
            border-radius: 10px;
            border-left: 10px solid rgb(0, 128, 255);
          "
          >
            <div
              class="text-center"
              style="padding: 12px 12px; padding-bottom: 0px"
              > 
              <h2 style="font-size: 25px; display: block">Completed</h2>
              <h2
                class="text-center"
                style="font-size: 35px; display: block; font-weight: bold"
              ><?php echo(getExaminerCompletedCasesCount($conn, $_SESSION['users_id']));  ?>
              </h2>
            </div>
        </div>
      </div>
      
      
      <div class="row" style="margin-top: 35px">
        <div
          class="col shadow-lg"
          style="
            background: var(--bs-body-bg);
            border-radius: 10px;
            padding-top: 12px;
            padding-bottom: 12px;
          "
          >
          <div class="table-responsive">
          <table class="table table-sm">
            <thead>
              <tr>
                <th class="text-center" hidden>id</throw>
                <th class="text-left">DR</th>
                <th class="text-center">Offense</th>
                <th class="text-center">Creation Date</th>
                <th class="text-center">In Progress Date</th>
                <th class="text-center">Completed Date</th>
                <th class="text-center">Status</th>
                <th class="text-center">Case Agent</th>
              </tr>
            </thead>
            <tbody class="fw-normal">
            <?php
            $result = getExaminerAssignedCases($conn, $_SESSION['users_id']);
            if($result == false){
                echo "<tr><td colspan='8' class='text-center'>No Cases Found</td></tr>";
            }
            else{
              foreach ($result as $row) {
                echo "<tr>";
                $link = "examinerCase.php?id=" . $row['cases_id'] . "&dr=" . $row['dr'] . "&examiner=" . $row['examiner'] . "&authority=" . $row['authority'] . "&sw=" . $row['sw_number'] . "&offense=" . $row['offense'] . "&creation_date=" . $row['creation_date'] . "&in_progress_date=" . $row['in_progress_date'] . "&completed_date=" . $row['completed_date'] . "&status=" . $row['status'] ;
                echo "<td class='text-center' hidden>" . $row['cases_id'] . "</td>";
                echo "<td class='text-left'><a class='link-primary link-opacity-25-hover' href='$link'>" . $row['dr'] . "</a></td>";
                echo "<td class='text-center'>" . tblValueParse($conn, 'offense', $row['offense'])[0][0] . "</td>";
                echo "<td class='text-center'>" . $row['creation_date'] . "</td>";
                if($row['in_progress_date'] == "00-00-0000"){
                  $row['in_progress_date'] = "----";
                }
                else{
                  $row['in_progress_date'] = $row['in_progress_date'];
                }
                if($row['completed_date'] == "00-00-0000"){
                  $row['completed_date'] = "----";
                }
                else{
                  $row['completed_date'] = $row['completed_date'];
                }
                echo "<td class='text-center'>" . $row['in_progress_date'] . "</td>";
                echo "<td class='text-center'>" . $row['completed_date'] . "</td>";
                switch ($row['status']) {
                  case 1:
                    echo "<td class='text-center'><span class='badge rounded-pill bg-secondary text-center'>Submited</span></td>";
                    break;
                case 2:
                    echo "<td class='text-center'><span class='badge rounded-pill bg-warning text-center'>In Progress</span></td>";
                    break;
                case 3:
                    echo "<td class='text-center'><span class='badge rounded-pill bg-success text-center'>Completed</span></td>";
                    break;
                case 4:
                    echo "<td class='text-center'><span class='badge rounded-pill bg-primary text-center'>Assigned</span></td>";
                    break;
                }
                if(!tblValueParse($conn, 'investigator', $row['owner'])){
                  $examiner = "Not Assigned";
                }
                else{
                  $firstName = tblValueParse($conn, 'investigator', $row['owner'])[0][0];
                  $lastName = tblValueParse($conn, 'investigator', $row['owner'])[0][1];
                  $examiner = ucfirst($firstName) . " " . ucfirst($lastName);
                }
                echo "<td class='text-center'>" . $examiner . "</td>";
                echo "</tr>";
            }
          }
            ?>
             
            </tbody>
          </table>
        </div>
        </div>
      </div>
    </div>



    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="assets/js/Ludens---1-Dark-mode-Index-Table-with-Search-Filters-Ludens---1-Index-Table-with-Search--Sort-Filters-v20-1.js"></script>
    <script src="assets/js/Ludens---1-Dark-mode-Index-Table-with-Search-Filters-Ludens---1-Index-Table-with-Search--Sort-Filters-v20.js"></script>
    <script src="assets/js/Ludens---1-Dark-mode-Index-Table-with-Search-Filters-main.js"></script>
  </body>
</html>
