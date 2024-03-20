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
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/Ludens---1-Dark-mode-Index-Table-with-Search-Filters.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-Dark-icons.css">
</head>

<body style="background: #fbfbfd;font-family: Inter, sans-serif;">
    <nav class="navbar navbar-expand-md bg-dark py-3" data-bs-theme="dark" style="position: relative;">
        <div class="container"><img class="navbar-brand" src="assets/img/Polaris%20logo%20White%20no%20RMS.svg"
                width="210" height="38"><button data-bs-toggle="collapse" class="navbar-toggler"
                data-bs-target="#navcol-5"><span class="visually-hidden">Toggle navigation</span><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-5">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Users<span class="badge bg-primary"
                                style="font-size: 12px;">42</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Database<span
                                class="badge bg-primary">42</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Reports</a></li>
                    <li class="nav-item dropdown ms-4" style="border-style: none;"><a class="nav-link"
                            aria-expanded="false" data-bs-toggle="dropdown" href="#"
                            style="font-family: Inter, sans-serif;border-style: none;border-color: var(--bs-navbar-color);color: var(--bs-navbar-brand-color);">Administrator</a>
                        <div class="dropdown-menu"><a class="dropdown-item" href="#">Profile</a><a class="dropdown-item"
                                href="#">Sign out</a></div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="padding-top: 20px;padding-right: 70px;padding-left: 70px;">
        <div class="row g-1">
            <div class="col" style="background: transparent;">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item" role="presentation"><a class="nav-link" role="tab"
                                        data-bs-toggle="tab" href="#tab-1">Agencies</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link active" role="tab"
                                        data-bs-toggle="tab" href="#tab-2">Offences</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" role="tab"
                                        data-bs-toggle="tab" href="#tab-3">Evidence</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" role="tab"
                                        data-bs-toggle="tab" href="#tab-4">Backup</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane" role="tabpanel" id="tab-1" style="margin-top: 10px;">
                                    <div class="row">
                                        <div class="col">
                                            <form>
                                                <div><label class="form-label"
                                                        style="font-family: Inter, sans-serif;">Add New Agency</label>
                                                </div>
                                                <div><input class="form-control" type="text" placeholder="Agency name">
                                                </div>
                                                <div style="padding-top: 16px;"><input class="btn btn-primary"
                                                        type="submit"></div>
                                                <div style="margin-top: 29px;">
                                                    <form><label class="form-label"
                                                            style="font-family: Inter, sans-serif;">Edit Agency</label>
                                                        <div><select class="form-select">
                                                                <optgroup label="This is a group">
                                                                    <option value="12" selected="">This is item 1
                                                                    </option>
                                                                    <option value="13">This is item 2</option>
                                                                    <option value="14">This is item 3</option>
                                                                </optgroup>
                                                            </select>
                                                            <div style="padding-top: 16px;"><input class="form-control"
                                                                    type="text" readonly=""></div>
                                                        </div>
                                                        <div style="padding-top: 16px;"><input class="btn btn-success"
                                                                type="submit"><input class="btn btn-danger"
                                                                type="submit" style="margin-left: 16px;"></div>
                                                    </form>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane active" role="tabpanel" id="tab-2" style="margin-top: 10px;">
                                    <div class="row">
                                        <div class="col">
                                            <form>
                                                <div><label class="form-label"
                                                        style="font-family: Inter, sans-serif;">Add New Offence</label>
                                                </div>
                                                <div><input class="form-control" type="text" placeholder="Offence">
                                                </div>
                                                <div style="padding-top: 16px;"><input class="btn btn-primary"
                                                        type="submit"></div>
                                                <div style="margin-top: 29px;">
                                                    <form><label class="form-label"
                                                            style="font-family: Inter, sans-serif;">Edit Offence</label>
                                                        <div><select class="form-select">
                                                                <optgroup label="This is a group">
                                                                    <option value="12" selected="">This is item 1
                                                                    </option>
                                                                    <option value="13">This is item 2</option>
                                                                    <option value="14">This is item 3</option>
                                                                </optgroup>
                                                            </select>
                                                            <div style="padding-top: 16px;"><input class="form-control"
                                                                    type="text" readonly=""></div>
                                                        </div>
                                                        <div style="padding-top: 16px;"><input class="btn btn-success"
                                                                type="submit"><input class="btn btn-danger"
                                                                type="submit" style="margin-left: 16px;"></div>
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
                                                <div><label class="form-label"
                                                        style="font-family: Inter, sans-serif;">Add New Evidence
                                                        Type</label></div>
                                                <div><input class="form-control" type="text"
                                                        placeholder="Evidence Type"></div>
                                                <div style="padding-top: 16px;"><input class="btn btn-primary"
                                                        type="submit"></div>
                                                <div style="margin-top: 29px;">
                                                    <form><label class="form-label"
                                                            style="font-family: Inter, sans-serif;">Edit Evidence
                                                            Type</label>
                                                        <div><select class="form-select">
                                                                <optgroup label="This is a group">
                                                                    <option value="12" selected="">This is item 1
                                                                    </option>
                                                                    <option value="13">This is item 2</option>
                                                                    <option value="14">This is item 3</option>
                                                                </optgroup>
                                                            </select>
                                                            <div style="padding-top: 16px;"><input class="form-control"
                                                                    type="text" readonly=""></div>
                                                        </div>
                                                        <div style="padding-top: 16px;"><input class="btn btn-success"
                                                                type="submit"><input class="btn btn-danger"
                                                                type="submit" style="margin-left: 16px;"></div>
                                                    </form>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="tab-4" style="margin-top: 10px;">
                                    <div><label class="form-label" style="font-family: Inter, sans-serif;">Database
                                            backup</label></div>
                                    <div><a href="#"><button class="btn btn-primary" type="button">Download
                                                File</button></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script
        src="assets/js/Ludens---1-Dark-mode-Index-Table-with-Search-Filters-Ludens---1-Index-Table-with-Search--Sort-Filters-v20-1.js"></script>
    <script
        src="assets/js/Ludens---1-Dark-mode-Index-Table-with-Search-Filters-Ludens---1-Index-Table-with-Search--Sort-Filters-v20.js"></script>
    <script src="assets/js/Ludens---1-Dark-mode-Index-Table-with-Search-Filters-main.js"></script>
</body>

</html>