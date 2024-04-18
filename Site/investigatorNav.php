<?php
  if (!isset($_SESSION['users_id']) || $_SESSION['userType'] != 2) {
    header('Location: index.php');
    exit();
  }

  require 'Scripts/Include/functions.php';
  require 'Scripts/Include/DBSetup.php';
  ?>


<nav
      class="navbar navbar-expand-md bg-dark py-3"
      data-bs-theme="dark"
      style="position: relative"
    >
      <div class="container">
      <a href="investigatorPanel.php">  
      <img
          class="navbar-brand"
          src="assets/img/Polaris%20logo%20White%20no%20RMS.svg"
          width="210"
          height="38"
          />
      </a>
        <button
          data-bs-toggle="collapse"
          class="navbar-toggler"
          data-bs-target="#navcol-5"
        >
          <span class="visually-hidden">Toggle navigation</span
          ><span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-5">
          <ul class="navbar-nav ms-auto">
            </li>
            <li class="nav-item">
              <a class="nav-link" href="investigatorNewCase.php">New Case</a>
            </li>
            <li class="nav-item dropdown ms-4" style="border-style: none">
              <a
                class="nav-link"
                aria-expanded="false"
                data-bs-toggle="dropdown"
                href="#"
                style="
                  font-family: Inter, sans-serif;
                  border-style: none;
                  border-color: var(--bs-navbar-color);
                  color: var(--bs-navbar-brand-color);
                ">
                <?php
                $name = ucfirst($_SESSION['firstName']) . ' ' . ucfirst($_SESSION['lastName']);
                
                echo($name) .'</a
              >';
                ?>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="investigatorAccount.php">Account</a
                ><a class="dropdown-item" href="Scripts/Misc/logout.php">Sign out</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>