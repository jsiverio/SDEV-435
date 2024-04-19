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
    <style>
      .passwordHelpValid {
        color: #198754;
      }
      .passwordHelpInvalid {
        color: #dc3545;
      }
    </style>
  </head>

  <body style="background: #fbfbfd">
    <div
      class="container shadow-lg"
      style="
        width: 755px;
        background: var(--bs-body-bg);
        border-radius: 10px;
        margin-top: 70px;
        padding: 0px 30px;
      "
    >
      <div class="text-center">
        <img
          src="assets/img/Polaris%20small.svg"
          width="339"
          height="101"
          style="margin-top: 16px"
        />
      </div>
      <form
        id="registerForm"
        class="needs-validation"
        style="font-family: Inter, sans-serif; margin-top: 40px"
        action="Scripts/FormHandlers/registerFormHandler.php"
        method="post"
        novalidate
      >
        <div class="row" >
          <div class="col" style="height: 94px">
            <div>
              <label class="form-label" for="name">Name</label
              ><input
                id="firstname"
                class="form-control"
                type="text"
                name="firstname"
              /><small></small>
            </div>
          </div>
          <div class="col">
            <div>
              <label
                class="form-label"
                for="lastname"
                style="font-family: Inter, sans-serif"
                >Last name </label
              ><input
                id="lastname"
                class="form-control"
                type="text"
                name="lastname"
                style="font-family: Inter, sans-serif"
              /><small style="font-family: Inter, sans-serif"></small>
            </div>
          </div>
        </div>
        <div class="row" 
             style="margin-top: 15px"; 
        >
          <div class="col" style="height: 94px">
            <div>
              <label
                class="form-label"
                for="badge"
                style="font-family: Inter, sans-serif"
                >Badge</label
              ><input
                id="badge"
                class="form-control"
                type="text"
                name="badge"
                style="font-family: Inter, sans-serif"
              /><small style="font-family: Inter, sans-serif"></small>
            </div>
          </div>
          <div class="col">
            <div>
              <label
                class="form-label"
                for="agency"
                style="font-family: Inter, sans-serif"
                >Agency</label
              ><select
                id="agency"
                class="form-select"
                name="agency"
                style="font-family: Inter, sans-serif"
              >
                <optgroup label="Select your Agency">
                    <!-- PHP to get agencies from the database -->
              <?php
                        require 'Scripts/Include/functions.php';
                        require 'Scripts/Include/DBSetup.php';
                        $agencies = getAgencies($conn);
                        foreach ($agencies as $agency) {
                            echo "<option value='" . $agency[0] . "'>" . $agency[1] . "</option>";
                        }
            ?>

              <!-- PHP to get agencies from the database -->
                </optgroup></select
              ><small style="font-family: Inter, sans-serif"></small>
            </div>
          </div>
          <div class="col">
            <div>
              <label
                class="form-label"
                for="phone"
                style="font-family: Inter, sans-serif"
                >Phone</label
              ><input
                id="phone"
                class="form-control"
                type="tel"
                maxlength="10"
                name="phone"
                style="font-family: Inter, sans-serif"
              /><small style="font-family: Inter, sans-serif"></small>
            </div>
          </div>
        </div>
        <div class="row" 
        style="margin-top: 15px"; 
        >
          <div class="col" style="height: 94px">
            <div>
              <label
                class="form-label"
                for="email"
                style="font-family: Inter, sans-serif"
                >Email</label
              ><input
                id="email"
                class="form-control"
                type="email"
                name="email"
                style="font-family: Inter, sans-serif"
              /><small style="font-family: Inter, sans-serif"></small>
            </div>
          </div>
          <div class="col">
            <div>
              <label
                class="form-label"
                for="password"
                style="font-family: Inter, sans-serif"
                >Password</label
              ><input
                id="password"
                class="form-control"
                type="password"
                name="password"
                style="font-family: Inter, sans-serif"
              /><small style="font-family: Inter, sans-serif"></small>
            </div>
          </div>
        </div>
        <div class="row" >
          <div class="col"></div>
          <div class="col">
            <div>
              <small class="form-text"
                >Must be at least 8 characters long</small
              >
            </div>
            <div>
              <small class="form-text"
                >Must contain at least 1 uppercase letter</small
              >
            </div>
            <div>
              <small class="form-text"
                >Must contain at least 1 lowercase letter</small
              >
            </div>
            <div>
              <small class="form-text"
                >Must contain at least 1 number or special character</small
              >
            </div>
          </div>
        </div>
        <div
          class="col-12 row-col-6"
          style="
            font-family: Inter, sans-serif;
            text-align: center;
            margin-top: 65px;
           padding-bottom: 50px;
          "
        >
          <input
            class="btn btn-primary col-6"
            type="submit"
            style="width: 148.5px"
          />
        </div>
      </form>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script defer src="JS/regVal.js"></script>
  </body>
</html>