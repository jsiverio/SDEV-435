<nav
      class="navbar navbar-expand-md bg-dark py-3"
      data-bs-theme="dark"
      style="position: relative"
    >
      <div class="container">
      <a href="adminPanel.php">  
      <img
          class="navbar-brand"
          src="assets/img/Polaris%20logo%20White%20no%20RMS.svg"
          width="210"
          height="38"
          href="adminPanelUsers.php"
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
            <li class="nav-item">
              <a class="nav-link" href="adminPanelUsers.php" style="position: relative"
                >Users<span
                  class="badge rounded-pill bg-danger top-10 start-98 translate-middle"
                  style="font-size: 12px; position: absolute;
                  <?php require 'Scripts/Include/functions.php';
                    require 'Scripts/Include/DBSetup.php';
                    if(getUserWaitingForApproval($conn)==true)
                    {
                      echo " display: inline-block;";
                    }
                    else
                    {
                      echo " display: none;";
                    }
                    ?>"
                  ><svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="1em"
                    height="1em"
                    fill="currentColor"
                    viewBox="0 0 16 16"
                    class="bi bi-envelope"
                  >
                    <path
                      d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"
                    ></path></svg></span
              ></a>
            </li>
            <li class="nav-item"><a class="nav-link" href="adminPanelDB.php">Database</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Reports</a></li>
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
                "
                >Administrator</a
              >
              <div class="dropdown-menu">
                <a class="dropdown-item" href="adminPasswordChange.php">Change Password</a
                ><a class="dropdown-item" href="Scripts/Misc/logout.php">Sign out</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>