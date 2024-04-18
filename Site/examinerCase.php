<?php
session_start();
require 'Scripts/Include/DBSetup.php';
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
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Inter&amp;display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Lato&amp;display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Montserrat&amp;display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Open+Sans&amp;display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto&amp;display=swap"
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
    require 'examinerNav.php';
 ?>
  <div
      class="container"
      style="height: 107px; padding-top: 40px; width: 1190px"
    >
    <?php
    if(isset($_GET['error'])){
      echo'<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
      <strong>'.$_GET['error'].'</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    if(isset($_GET['success'])){
        echo '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>'.$_GET['success'].'</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>
    
  </div>
    <div
      class="container"
      style="
        margin-top: 0px;
        margin-right: auto;
        margin-left: auto;
        background: rgb(255, 255, 255);
        border-radius: 10px;
        box-shadow: 1px 2px 20px 4px #c9cccf;
        padding: 32px;
        width: 1190px;
      "
    >
      <div style="text-align: center">
        <h4>Edit Case</h4>
      </div>
      <form style="padding-top: 32px"
            id="newCaseForm"
            method="POST"
            action="Scripts/FormHandlers/editCaseFormHadler.php"
            autocomplete="off"
            >
        <div
          class="shadow-sm"
          style="
            background: #f8f8f8;
            border-radius: 10px;
            padding: 16px;
            padding-top: 16px;
            padding-bottom: 15px;
            padding-right: 16px;
          "
        >
          <div
            class="text-start"
            style="
              text-align: center;
              border-bottom-style: solid;
              border-bottom-color: var(--bs-dark-bg-subtle);
              margin-bottom: 32px;
            "
          >
            <h4>Case Details</h4>
          </div>
          <div>
            <div class="row" id="caseDetailsBlock" style="height: 94px">
              <div class="col">
                <input
                  class="form-control"
                  type="hidden"
                  id="caseId"
                  name="caseId"
                  value ="<?php echo $_GET['id']; ?>"
                  >
                <label class="form-label" for="dr">DR</label
                ><input
                  class="form-control"
                  type="text"
                  id="dr"
                  name="dr"
                  value ="<?php echo $_GET['dr']; ?>"
                /><small></small>
              </div>
              <div class="col">
                <label class="form-label" for="authority">Authority</label
                ><select class="form-select" id="authority" name="authority">
                    
                    <?php
                      $results = getAuthority($conn);
                      foreach ($results as $result) {
                        if($result[0] == $_GET['authority']){
                          echo '<option value="'.$result[0].'" selected>'.$result[1].'</option>';
                        }else{
                        echo '<option value="'.$result[0].'">'.$result[1].'</option>';
                      }
                    }
                    ?>
                    
                  </optgroup></select
                ><small></small>
              </div>
              <div class="col">
                <label class="form-label" for="swNumber">SW Number</label
                ><input
                  class="form-control"
                  type="text"
                  id="swNumber"
                  name="swNumber"
                  value ="<?php echo $_GET['sw']; ?>"
                /><small></small>
              </div>
              <div class="col">
                <label class="form-label" for="offense">Offense</label
                ><select class="form-select" id="offense" name="offense">
                    <?php
                      $results = getOffences($conn);
                      foreach ($results as $result) {
                        if($result[0] == $_GET['offense']){
                          echo '<option value="'.$result[0].'" selected>'.$result[1].'</option>';
                        }
                        else{
                          echo '<option value="'.$result[0].'">'.$result[1].'</option>';
                        }
                      }
                    ?>
                  </optgroup></select
                ><small></small>
              </div>
            </div>
          </div>
        </div>
        <div
          style="
            background: #f8f8f8;
            border-radius: 10px;
            padding: 16px;
            padding-top: 16px;
            padding-bottom: 15px;
            padding-right: 16px;
            margin-top: 32px;
          "
          class="shadow-sm"
        >
          <div
            class="text-start"
            style="
              text-align: center;
              border-bottom-style: solid;
              border-bottom-color: var(--bs-dark-bg-subtle);
              margin-bottom: 32px;
            "
          >
            <h4>Narrative</h4>
          </div>
          <div class="row" id="narrativeBlock" style="height: 276px">
            <div class="col">
              <textarea
                id="narrative"
                name="narrative"  
                class="form-control"
                type="text"
                rows = "10"
                spellcheck="true"
              ><?php echo getNarrative($conn, $_GET['id']) ?></textarea>
              <small></small>
            </div>
          </div>
        </div>
        <div
          class="text-start"
          style="
            text-align: center;
            border-bottom-style: solid;
            border-bottom-color: var(--bs-dark-bg-subtle);
            margin-top: 32px;
            margin-bottom: 32px;
          "
        >
          <h4>Evidence</h4>
        </div>
        <div
          id = "evidence"
          >
        <div
          id="evidenceBlock1"
          class="shadow-sm"
          style="
            background: #f8f8f8;
            border-radius: 10px;
            padding: 16px;
            padding-top: 16px;
            padding-bottom: 15px;
            padding-right: 16px;
          ">
          <div class="row" style="height: 94px">
            <div class="col">
              <label class="form-label" for="evidenceNumber[]"
                >Evidence Number</label
              ><input
                class="form-control"
                type="text"
                id="evidenceNumber1"
                name="evidenceNumber[]"
              /><small></small>
            </div>
            <div class="col">
              <label class="form-label" for="deviceType[]">Device Type</label
              ><select class="form-select" id="deviceType1" name="deviceType[]">
                <option value="0" selected=""></option>
                    <?php
                      $results = getEvidence($conn);
                      foreach ($results as $result) {
                        echo '<option value="'.$result[0].'">'.$result[1].'</option>';
                      }
                    ?>
                </optgroup></select
              ><small></small>
            </div>
            <div class="col">
              <label class="form-label" for="evidenceSize[]"
                >Storage Size (GB)</label
              ><input
                class="form-control"
                type="text"
                id="evidenceSize1"
                name="evidenceSize[]"
              /><small></small>
            </div>
            <div class="col">
              <label class="form-label" for="evidenceNotes[]">Notes</label
              ><input
                class="form-control"
                type="text"
                id="evidenceNotes1"
                name="evidenceNotes[]"
              />
              <input
                class="form-control"
                type="hidden"
                id="evidenceId1"
                name="evidenceId[]"
              />
              <small></small>
            </div>
            <div class="col-2 align-self-center">
              <button class="btn btn-danger" type="button" onclick="clearInputs(this)">Clear</button
              ><button
                class="btn btn-light shadow-lg"
                type="button"
                style="
                  margin-left: 12px;
                  background: #e2e2e2;
                  border-right-style: solid;
                  border-right-color: var(--bs-btn-border-color);
                "
                onclick="addEvidenceBlock()"
              >
                +</button
              ><button
                class="btn btn-light shadow-lg"
                type="button"
                style="
                  margin-left: 12px;
                  background: #e2e2e2;
                  border-right-style: solid;
                  border-right-color: var(--bs-btn-border-color);
                  display: none;
                "
                onclick="removeEvidenceBlock(this)"
              >
                -
              </button>
            </div>
          </div>
        </div>
        </div>
        <?php
         echo  '<script src="JS/CaseBlock.js"></script>
                <script src="JS/newCase.js" ></script>';
          $evidenceCount = getEvidenceCount($conn, $_GET['id']);
          $evidence = getEvidenceRecord($conn, $_GET['id']);
          if ($evidenceCount == 1){
            echo '<script>populateEvidenceBlocks(0,"'.$evidence[0]['evidence_number'].'","'.$evidence[0]['evidence_type'].'","'.$evidence[0]['storage_size'].'","'.$evidence[0]['notes'].'","'.$evidence[0]['evidence_id'].'" )</script>';
          }
          else{
            for($i = 1 ; $i < $evidenceCount; $i++){
            echo '<script>addEvidenceBlock()</script>';
            }
            for($i = 0 ; $i < $evidenceCount; $i++){
              echo '<script>populateEvidenceBlocks('.$i.',"'.$evidence[$i]['evidence_number'].'","'.$evidence[$i]['evidence_type'].'","'.$evidence[$i]['storage_size'].'","'.$evidence[$i]['notes'].'","'.$evidence[$i]['evidence_id'].'" )</script>';
          }
        }
            
        ?>
        <div class="text-center" style="padding-top: 32px">
          <input id="submit" class="btn btn-primary" type="submit" style="width: 200px" />
          <button id ="deleteCaseBtn" class="btn btn-danger" type="button" style="width: 200px">Delete Case</button>
          <button id ="inProgressCaseBtn" class="btn btn-warning" type="button" style="width: 200px">In Progress</button>
          <button id ="completeCaseBtn" class="btn btn-success" type="button" style="width: 200px">Completed</button>
        </div>
      </form>
    </div>
    <script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('#deleteCaseBtn').click(function(){
                var id = $('#caseId').val();
                var confirmation = confirm("Are you sure you want to delete this case?");
                if(confirmation){
                    window.location.href = "Scripts/FormHandlers/deleteCaseFormHandler.php?id="+id;
                }
            });
          });
    </script>
    <script>
        $(document).ready(function(){
            $('#inProgressCaseBtn').click(function(){
                var id = $('#caseId').val();
                var confirmation = confirm("Are you sure you want to mark this case as in progress?");
                if(confirmation){
                    window.location.href = "Scripts/FormHandlers/inProgressCaseFormHandler.php?id="+id;
                }
            });
          });
    </script>
    <script>
        $(document).ready(function(){
            $('#completeCaseBtn').click(function(){
                var id = $('#caseId').val();
                var confirmation = confirm("Are you sure you want to mark this case as completed?");
                if(confirmation){
                    window.location.href = "Scripts/FormHandlers/completeCaseFormHandler.php?id="+id;
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
