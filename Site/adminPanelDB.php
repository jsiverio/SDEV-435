<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Project Polaris</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/Ludens---1-Dark-mode-Index-Table-with-Search-Filters.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-Dark-icons.css">
</head>

<body style="background: #fbfbfd;font-family: Inter, sans-serif;">
    <!-- Navbar -->
    <?php
    include 'adminNav.php';
    ?>
    <div class="container" style="padding-top: 20px;padding-right: 70px;padding-left: 70px;">
        <div class="row g-1">
            <div class="col" style="background: transparent;">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-1">Agencies</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-2">Offences</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-3">Evidence</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-4">Backup</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" role="tabpanel" id="tab-1" style="margin-top: 10px;">
                                    <div class="row">
                                        <div class="col">
                                            <form id="dbAgencyEditForm" class="needs-validation" method="post" action="Scripts/FormHandlers/dbEditFormHandler.php" novalidate>
                                                <div><label class="form-label" style="font-family: Inter, sans-serif;">Add New Agency</label>
                                                </div>
                                                <div><input id="agency" name="agency" class="form-control" type="text" placeholder="Agency name">
                                                </div>
                                                <div style="padding-top: 16px;">
                                                    <button class="btn btn-primary" id="addAgency" type="button" onclick="addAgencyAjx()">Add</button>
                                                </div>
                                                <div style="margin-top: 29px;">
                                                    <form><label class="form-label" style="font-family: Inter, sans-serif;">Edit Agency</label>
                                                        <div><select class="form-select" id=agencyEditSelection>
                                                                <optgroup label="Select the agency you wish to edit">
                                                                    <option value="0" selected="">
                                                                    </option>
                                                                    <?php
                                                                    $agencies = getAgencies($conn);
                                                                    if ($agencies) {
                                                                        foreach ($agencies as $agency) {
                                                                            echo "<option value='" . $agency[0] . "'>" . $agency[1] . "</option>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </optgroup>
                                                            </select>
                                                            <div style="padding-top: 16px;"><input class="form-control" id="agencyEdit" name="agencyEdit" type="text"></div>
                                                        </div>
                                                        <div style="padding-top: 16px;">
                                                            <button class="btn btn-primary" id="editAgency" type="button" onclick="editAgencyAjx()">Update Agency</button>
                                                            <button class="btn btn-danger" id="deleteAgency" type="button" style="margin-left: 16px;" onclick="deleteAgencyAjx()">Delete Agency</button>


                                                        </div>
                                                    </form>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="tab-2" style="margin-top: 10px;">
                                    <div class="row">
                                        <div class="col">
                                            <form>
                                                <div><label class="form-label" style="font-family: Inter, sans-serif;">Add New Offense</label>
                                                </div>
                                                <div><input class="form-control" type="text" placeholder="Offense" id="offense">
                                                </div>
                                                <div style="padding-top: 16px;">
                                                <button class="btn btn-primary" 
                                                        type="button"
                                                        onclick="addOffense()">Add</button>
                                            </div>
                                                <div style="margin-top: 29px;">
                                                    <form><label class="form-label" style="font-family: Inter, sans-serif;">Edit Offense</label>
                                                        <div><select class="form-select" id="offenseEditSelection">
                                                                <optgroup label="Select the offense you whish to edit">
                                                                    <option value="0" selected="">
                                                                    </option>
                                                                    <?php
                                                                    $offenses = getOffences($conn);
                                                                    if ($offenses) {
                                                                        foreach ($offenses as $offense) {
                                                                            echo "<option value='" . $offense[0] . "'>" . $offense[1] . "</option>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </optgroup>
                                                            </select>
                                                            <div style="padding-top: 16px;">
                                                            <input class="form-control" type="text" id="offenseEdit"></div>
                                                        </div>
                                                        <div style="padding-top: 16px;">
                                                        <button class="btn btn-primary" 
                                                        type="button"
                                                        onclick="editOffense()">Update Offense</button>
                                                        <button class="btn btn-danger" 
                                                        type="button" 
                                                        style="margin-left: 16px;"
                                                        onclick="deleteOffense()">Delete Offense</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="tab-3" style="margin-top: 10px;">
                                    <div class="row">
                                        <div class="col">
                                            <form>
                                                <div><label class="form-label" style="font-family: Inter, sans-serif;">Add New Evidence
                                                        Type</label></div>
                                                <div><input class="form-control" type="text" placeholder="Evidence Type" id="evidence"></div>
                                                <div style="padding-top: 16px;">
                                                <button class="btn btn-primary" 
                                                        type="button"
                                                        onclick="addEvidence()">Add</button>
                                                </div>
                                                <div style="margin-top: 29px;">
                                                    <form><label class="form-label" style="font-family: Inter, sans-serif;">Edit Evidence
                                                            Type</label>
                                                        <div><select class="form-select" id="evidenceEditSelection">
                                                                <optgroup label="Select the evidence you wish to edit">
                                                                    <option value="0" selected="">
                                                                    </option>
                                                                    <?php
                                                                    $evidences = getEvidence($conn);
                                                                    if ($evidences) {
                                                                        foreach ($evidences as $evidence) {
                                                                            echo "<option value='" . $evidence[0] . "'>" . $evidence[1] . "</option>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </optgroup>
                                                            </select>
                                                            <div style="padding-top: 16px;">
                                                            <input class="form-control" type="text" id="evidenceEdit"></div>
                                                        </div>
                                                        <div style="padding-top: 16px;">
                                                        <button class="btn btn-primary" 
                                                                type="button"
                                                                onclick="editEvidence()">Update Evidence</button>
                                                        <button class="btn btn-danger" 
                                                                type="button" 
                                                                style="margin-left: 16px;"
                                                                onclick="deleteEvidence()">Delete Evidence</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="tab-4" style="margin-top: 10px;">
                                    <div><label class="form-label" style="font-family: Inter, sans-serif;">Database
                                            backup</label></div>
                                    <div><a href="#"><button class="btn btn-primary" type="button" onclick="dbBackup()">Download
                                                File</button></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="JS/adminDB.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="assets/js/Ludens---1-Dark-mode-Index-Table-with-Search-Filters-Ludens---1-Index-Table-with-Search--Sort-Filters-v20-1.js"></script>
    <script src="assets/js/Ludens---1-Dark-mode-Index-Table-with-Search-Filters-Ludens---1-Index-Table-with-Search--Sort-Filters-v20.js"></script>
    <script src="assets/js/Ludens---1-Dark-mode-Index-Table-with-Search-Filters-main.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script>
        function addAgencyAjx() {
            var agency = document.getElementById('agency')
            if (agency.value == "" || agency.value == null) {
                alert("Please enter an agency name");
                return;
            }
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "Scripts/FormHandlers/dbEditFormHandler.php?action=add&type=agency&value=" + agency.value, true);
            xhr.send();
            xhr.onload = function() {
                if (xhr.status == 200) {
                    alert("Agency added successfully");
                    location.reload();
                }
            }
        }

        function editAgencyAjx() {
            var agency = document.getElementById('agencyEdit').value;
            var id = document.getElementById('agencyEditSelection').value;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "Scripts/FormHandlers/dbEditFormHandler.php?action=edit&type=agency&id=" + id + "&value=" + agency, true);
            xhr.send();
            xhr.onload = function() {
                if (xhr.status == 200) {
                    alert("Agency edited successfully");
                    location.reload();
                }
            }
        }

        function deleteAgencyAjx() {
            var id = document.getElementById('agencyEditSelection').value;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "Scripts/FormHandlers/dbEditFormHandler.php?action=delete&type=agency&id=" + id, true);
            xhr.send();
            xhr.onload = function() {
                if (xhr.status == 200) {
                    alert("Agency deleted successfully");
                    location.reload();
                }
            }
        }

        function addOffense() {
            var offense = document.getElementById('offense').value;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "Scripts/FormHandlers/dbEditFormHandler.php?action=add&type=offense&value=" + offense, true);
            xhr.send();
            xhr.onload = function() {
                if (xhr.status == 200) {
                    alert("Offense added successfully");
                    location.reload();
                }
            }
        }
        
        function editOffense() {
            var offense = document.getElementById('offenseEdit').value;
            var id = document.getElementById('offenseEditSelection').value;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "Scripts/FormHandlers/dbEditFormHandler.php?action=edit&type=offense&id=" + id + "&value=" + offense, true);
            xhr.send();
            xhr.onload = function() {
                if (xhr.status == 200) {
                    alert("Offense edited successfully");
                    location.reload();
                }
            }
        }

        function deleteOffense() {
            var id = document.getElementById('offenseEditSelection').value;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "Scripts/FormHandlers/dbEditFormHandler.php?action=delete&type=offense&id=" + id, true);
            xhr.send();
            xhr.onload = function() {
                if (xhr.status == 200) {
                    alert("Offense deleted successfully");
                    location.reload();
                }
            }
        }

        function addEvidence() {
            var evidence = document.getElementById('evidence').value;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "Scripts/FormHandlers/dbEditFormHandler.php?action=add&type=evidence&value=" + evidence, true);
            xhr.send();
            xhr.onload = function() {
                if (xhr.status == 200) {
                    alert("Evidence added successfully");
                    location.reload();
                }
            }
        }
        function editEvidence() {
            var evidence = document.getElementById('evidenceEdit').value;
            var id = document.getElementById('evidenceEditSelection').value;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "Scripts/FormHandlers/dbEditFormHandler.php?action=edit&type=evidence&id=" + id + "&value=" + evidence, true);
            xhr.send();
            xhr.onload = function() {
                if (xhr.status == 200) {
                    alert("Evidence edited successfully");
                    location.reload();
                }
            }
        }

        function deleteEvidence() {
            var id = document.getElementById('evidenceEditSelection').value;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "Scripts/FormHandlers/dbEditFormHandler.php?action=delete&type=evidence&id=" + id, true);
            xhr.send();
            xhr.onload = function() {
                if (xhr.status == 200) {
                    alert("Evidence deleted successfully");
                    location.reload();
                }
            }
        }

        function dbBackup() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "Scripts/FormHandlers/dbEditFormHandler.php?action=backup", true);
            xhr.send();
            xhr.onload = function() {
                if (xhr.status == 200) {
                    alert("Database backup successful");
                }
            }
        }
    </script>
</body>
</html>