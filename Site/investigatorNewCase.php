<?php
session_start();
require 'Scripts/Include/DBSetup.php';
if (!isset($_SESSION['users_id']) || $_SESSION['userType'] != 2) {
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
    require 'investigatorNav.php';
 ?>
    <div
      class="container"
      style="height: 107px; padding-top: 40px; width: 420px"
    >
      <div
        class="alert alert-danger text-center"
        role="alert"
        style="width: 400px"
      >
        <span style="font-family: Inter, sans-serif; font-size: 14px"
          ><strong>Wrong Password</strong>.</span
        >
      </div>
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
        <h4>New Case</h4>
      </div>
      <form style="padding-top: 32px"
            method="POST"
            action="Scripts/FormHandlers/newCaseFormHadler.php"
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
                <label class="form-label" for="dr">DR</label
                ><input
                  class="form-control"
                  type="text"
                  id="dr"
                  name="dr"
                /><small></small>
              </div>
              <div class="col">
                <label class="form-label" for="authority">Authority</label
                ><select class="form-select" id="authority" name="authority">
                    <option value="0" selected=""></option>
                    <?php
                      $results = getAuthority($conn);
                      foreach ($results as $result) {
                        echo '<option value="'.$result[0].'">'.$result[1].'</option>';
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
                  disabled
                /><small></small>
              </div>
              <div class="col">
                <label class="form-label" for="offense">Offense</label
                ><select class="form-select" id="offense" name="offense">
                <option value="0" selected=""></option>
                    <?php
                      $results = getOffences($conn);
                      foreach ($results as $result) {
                        echo '<option value="'.$result[0].'">'.$result[1].'</option>';
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
                class="form-control"
                type="text"
                id="narrative"
                style="height: 251.3333px"
                name="narrative"
              >
              </textarea>
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
              /><small></small>
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
        <div class="text-center" style="padding-top: 32px">
          <input class="btn btn-primary" type="submit" style="width: 200px" />
        </div>
      </form>
    </div>
    <script src="JS/CaseBlock.js"></script>
    <script src="JS/newCase.js"></script>
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
