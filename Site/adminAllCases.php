<?php
session_start();
if (!isset($_SESSION['users_id']) || $_SESSION['userType'] != 1) {
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
    require 'adminNav.php';
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
        <h5 style="font-weight: bold">All Cases</h5>
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
              <?php echo(getAllAssignedCasesCount($conn));  ?>
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
              ><?php echo(getAllInProgressCasesCount($conn));  ?>
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
              ><?php echo(getAllCompletedCasesCount($conn));  ?>
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
                <th class="text-center">Examiner</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody class="fw-normal">
            <?php
            $result = getAllCases($conn);
            $recordsCount = 0;
            if($result == false){
                echo "<tr><td colspan='8' class='text-center'>No Cases Found</td></tr>";
            }
            else{
              foreach ($result as $row) {
                echo "<tr>";
                $dr = $row['dr']; 
                $id = $row['cases_id'];
                echo "<td class='text-center' hidden>" . $row['cases_id'] . "</td>";
                echo "<td class='text-left'>$dr</td>";
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
                  $caseAgent = "Not Assigned";
                }
                else{
                  $firstName = tblValueParse($conn, 'investigator', $row['owner'])[0][0];
                  $lastName = tblValueParse($conn, 'investigator', $row['owner'])[0][1];
                  $caseAgent = ucfirst($firstName) . " " . ucfirst($lastName);
                }
                echo "<td class='text-center'>" . $caseAgent . "</td>";

                if(!tblValueParse($conn, 'examiner', $row['examiner'])){
                  $examiner = "Not Assigned";
                }
                else{
                  $firstName = tblValueParse($conn, 'examiner', $row['examiner'])[0][0];
                  $lastName = tblValueParse($conn, 'examiner', $row['examiner'])[0][1];
                  $examiner = ucfirst($firstName) . " " . ucfirst($lastName);
                }
                echo "<td class='text-center'>" . $examiner . "</td>";
                if ($row['status'] == 1){
                  echo "<td class='text-center'><button type='button' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#assignModal$recordsCount'>Assign</button></td>";?>
                  <div class="modal fade" id="assignModal<?php echo $recordsCount ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Assign Case <?php echo $dr; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                      <label class="form-label" for="examiner">Examiner</label>
                      <select class="form-select" id="examiner" name="examiner">
                          <?php
                            $results = getExaminers($conn);
                            foreach ($results as $result) {
                              $name = ucfirst($result['name']) . " " . ucfirst($result['last_name']);
                                echo '<option value="'.$result['users_id'].'">'.$name.'</option>';
                              }
                              ?>
                      </select>
                      </div>
                      <div class="modal-footer">
                        <input type="hidden" id ="caseId" name="caseId" value="<?php echo $id; ?>">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id = "assignBtn" type="button" class="btn btn-primary" onclick="assignCase(this)">Assign</button>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                }
                else{
                  echo "<td class='text-center'>----</td>";
                }
                echo "</tr>";
                $recordsCount++;
            }
          }
            ?>
            </tbody>
          </table>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
  function assignCase(btn){
    var caseId = $(btn).parent().find('input[name="caseId"]').val();
    var examiner = $(btn).parent().parent().find('select[name="examiner"]').val();
    $.ajax({
      url: 'Scripts/FormHandlers/assignCase.php',
      type: 'POST',
      data: {caseId: caseId, examiner: examiner},
      async: false,
      success: function(response){
          alert("Case Assigned Successfully");
          location.reload();
      }
    });
  }
  </script>


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
