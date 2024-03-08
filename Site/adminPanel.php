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
  <script defer src="JS/charts.js"></script>
  <!--Chart values -->
  <?php
        require_once 'Scripts/Classes/ChartData.php';
        $chartData = new ChartData();
      
        $arrResultmd =  $chartData->getChartMtdDevices();
        $chartData->clearData();
        $arrResultmc =  $chartData->getChartMtdCases();
        $chartData->clearData();
        $arrResultyd =  $chartData->getChartYtdDevices();
        $chartData->clearData();
        $arrResultyc =  $chartData->getChartYtdCases();
        $chartData->clearData();
        $arrResultmca =  $chartData->getChartMtdCasesByAgency();
        $chartData->clearData();
        $arrResultyca =  $chartData->getChartYtdCasesByAgency();  
    ?>

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
        onload=
        "mdc(<?php echo htmlspecialchars(json_encode($arrResultmd)); ?>)
         mcc(<?php echo htmlspecialchars(json_encode($arrResultmc)); ?>)
         ydc(<?php echo htmlspecialchars(json_encode($arrResultyd)); ?>)
         ycc(<?php echo htmlspecialchars(json_encode($arrResultyc)); ?>)
         mtdcac(<?php echo htmlspecialchars(json_encode($arrResultmca)); ?>)
         ytdcac(<?php echo htmlspecialchars(json_encode($arrResultyca)); ?>)"
         >
 <!-- Navbar -->
 <?php
    include 'adminNav.php';
 ?>
    <div
      class="container"
      style="
        background: transparent;
        padding-top: 40px;
        padding-bottom: 16px;
        font-family: Inter, sans-serif;
        padding-left: 40px;
        padding-right: 40px;
      "
    >
      <div>
        <h5 style="font-weight: bold">DASHBOARD</h5>
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
          <div class="row">
            <div
              class="col text-center"
              style="padding: 12px 12px; padding-bottom: 0px"
            >
              <h2 style="font-size: 25px; display: block">Devices</h2>
              <h2
                class="text-center"
                style="font-size: 35px; display: block; font-weight: bold"
              >
              <!-- MTD Device -->
                <?php
                include 'Scripts/Include/DBSetup.php';
                $sql =  "CALL `mtd_device_count`();";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                  echo "SQL Error";
                }
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);                
                $row = mysqli_fetch_row($result);
                echo $row[0];
                ?>
              </h2>
            </div>
            <div
              class="col align-self-center"
              style="padding-top: 10px; padding-bottom: 10px"
            >
              <div style="height: 110px; display: inline-block">
                <canvas
                       id = "mtdDeviceChart"
                       >
                </canvas>
              </div>
            </div>
          </div>
          <span style="font-size: 16px; color: rgb(187, 187, 187)"
            >Current</span
          >
        </div>
        <div
          class="col shadow-sm me-3"
          style="
            background: var(--bs-body-bg);
            border-radius: 10px;
            border-left: 10px solid rgb(0, 128, 255);
          "
        >
          <div class="row">
            <div
              class="col text-center"
              style="padding: 12px 12px; padding-bottom: 0px"
            >
              <h2 style="font-size: 25px; display: block">Cases</h2>
              <h2
                class="text-center"
                style="font-size: 35px; display: block; font-weight: bold"
              ><!-- MTD Cases -->
              <?php
                include 'Scripts/Include/DBSetup.php';
                $sql =  "CALL `mtd_case_count`();";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                  echo "SQL Error";
                }
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);                
                $row = mysqli_fetch_row($result);
                echo $row[0];
                ?>
              </h2>
            </div>
            <div
              class="col align-self-center"
              style="padding-top: 10px; padding-bottom: 10px"
            >
              <div style="height: 110px; display: inline-block">
                <canvas
                    id = "mtdCasesChart"
                ></canvas>
              </div>
            </div>
          </div>
          <span style="font-size: 16px; color: rgb(187, 187, 187)"
            >Current</span
          >
        </div>
        <div
          class="col shadow-sm"
          style="
            background: var(--bs-body-bg);
            border-radius: 10px;
            border-left: 10px solid rgb(0, 128, 255);
          "
        >
          <div class="row">
            <div
              class="col text-center"
              style="padding: 12px 12px; padding-bottom: 0px"
            >
              <h2 style="font-size: 25px; display: block">Data</h2>
              <h2
                class="text-center"
                style="font-size: 35px; display: block; font-weight: bold"
              >
              <!-- MTD Data -->
              <?php
                include 'Scripts/Include/DBSetup.php';
                $sql =  "CALL `mtd_data_count`();";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                  echo "SQL Error";
                }
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);                
                $row = mysqli_fetch_row($result);
                echo round(($row[0] / 1000),1);
                ?>
              </h2>
              <div><span>TB</span></div>
              <div class="text-start" style="padding-top: 11px">
                <span style="font-size: 16px; color: rgb(187, 187, 187)"
                  >Current</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="margin-top: 20px">
        <div
          class="col shadow-sm me-3"
          style="
            background: var(--bs-body-bg);
            border-radius: 10px;
            border-left: 10px solid rgb(20, 0, 255);
          "
        >
          <div class="row">
            <div
              class="col text-center"
              style="padding: 12px 12px; padding-bottom: 0px"
            >
              <h2 style="font-size: 25px; display: block">Devices</h2>
              <h2
                class="text-center"
                style="font-size: 35px; display: block; font-weight: bold"
              >
              <!-- YTD Devices -->
              <?php
                include 'Scripts/Include/DBSetup.php';
                $sql =  "CALL `ytd_device_count`();";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                  echo "SQL Error";
                }
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);                
                $row = mysqli_fetch_row($result);
                echo $row[0];
                ?>
              </h2>
            </div>
            <div
              class="col align-self-center"
              style="padding-top: 10px; padding-bottom: 10px"
            >
              <div style="height: 110px; display: inline-block">
                <canvas
                    id = "ytdDevicesChart"
                ></canvas>
              </div>
            </div>
            <span style="font-size: 16px; color: rgb(187, 187, 187)"
                >YTD</span>
            <div class="col">
              
              
            </div>
          </div>
        </div>
        <div
          class="col shadow-sm me-3"
          style="
            background: var(--bs-body-bg);
            border-radius: 10px;
            border-left: 10px solid rgb(20, 0, 255);
          "
        >
          <div class="row">
            <div
              class="col text-center"
              style="padding: 12px 12px; padding-bottom: 0px"
            >
              <h2 style="font-size: 25px; display: block">Cases</h2>
              <h2
                class="text-center"
                style="font-size: 35px; display: block; font-weight: bold"
                >
                <!-- YTD Cases -->
              <?php
                include 'Scripts/Include/DBSetup.php';
                $sql =  "CALL `ytd_case_count`();";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                  echo "SQL Error";
                }
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);                
                $row = mysqli_fetch_row($result);
                echo $row[0];
                ?>
              </h2>
            </div>
            <div
              class="col align-self-center"
              style="padding-top: 10px; padding-bottom: 10px"
            >
              <div style="height: 110px; display: inline-block">
                <canvas
                    id = "ytdCasesChart"
                ></canvas>
              </div>
            </div>
            <span style="font-size: 16px; color: rgb(187, 187, 187)"
                >YTD</span
              >
            <div class="col">
            </div>
          </div>
        </div>
        <div
          class="col shadow-sm"
          style="
            background: var(--bs-body-bg);
            border-radius: 10px;
            border-left: 10px solid rgb(20, 0, 255);
          "
        >
          <div class="row">
            <div
              class="col text-center"
              style="padding: 12px 12px; padding-bottom: 0px"
            >
              <h2 style="font-size: 25px; display: block">Data</h2>
              <h2
                class="text-center"
                style="font-size: 35px; display: block; font-weight: bold"
              >
              <!-- YTD Data -->
              <?php
                include 'Scripts/Include/DBSetup.php';
                $sql =  "CALL `ytd_data_count`();";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                  echo "SQL Error";
                }
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);                
                $row = mysqli_fetch_row($result);
                echo round(($row[0] / 1000),1);
                ?>
              </h2>
              <div><span>TB</span></div>
              <div class="text-start" style="padding-top: 11px">
                <span style="color: rgb(187, 187, 187)">YTD</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="margin-top: 35px">
        <div
          class="col shadow-lg me-3"
          style="
            background: var(--bs-body-bg);
            border-radius: 10px;
            padding-top: 12px;
            padding-bottom: 12px;
          "
        >
          <div>
            <canvas
                  id = "mtdCasesByAgencyChart" 
            ></canvas>
          </div>
        </div>
        <div
          class="col shadow-lg"
          style="
            background: var(--bs-body-bg);
            border-radius: 10px;
            padding-top: 12px;
            padding-bottom: 12px;
          "
        >
          <div>
            <canvas
            id = "ytdCasesByAgencyChart"
            ></canvas>
          </div>
        </div>
      </div>
    </div>

    <!-- Chart.js -->

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
