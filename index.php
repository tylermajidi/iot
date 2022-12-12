<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/datatables.min.css">
    <link rel="stylesheet" href="public/css/bootstrap4-toggle.min.css">
    <link rel="stylesheet" href="public/css/style.css">


    <title>Wellcom</title>
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center">Monitoring Sensor and Data Loger</h1>
            <hr>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <ul class="nav nav-tabs nav-justified bg-light">
                <li class="nav-item"><a class="nav-link active" href="#tab1" data-toggle="tab">Table</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab2" data-toggle="tab">Output</a></li>
            </ul>
            <div class="tab-content border border-top-0 p-2 mb-2">
                <!-- ##########start tab 1 ################## -->
                <div class="tab-pane active show" id="tab1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center text-truncate shadow-sm bg-light  mt-3 mb-3 p-3 border rounded">
                                <div class="col-md-1"></div>
                                <div class="col-md-2 d-md-inline-block d-sm-block" id="soil_hum">رطوبت خاک : ...</div>
                                <div class="col-md-2 d-md-inline-block d-sm-block" id="soil_temp">دمای خاک : ...</div>
                                <div class="col-md-2 d-md-inline-block d-sm-block" id="air_hum">رطوبت هوا : ...</div>
                                <div class="col-md-2 d-md-inline-block d-sm-block" id="air_temp">دمای هوا : ...</div>
                                <div class="col-md-2 d-md-inline-block d-sm-block" id="light_intensity">شدت نور : ...
                                </div>
                                <div class="col-md-1"></div>
                                <hr>
                                <div class="col-md-2 d-md-inline-block d-sm-block" id="serial">سریال برد : ...</div>

                                <div class="col-md-12 mx-auto" id="time_iot">Last update : ...</div>
                            </div>
                        </div>

                    </div>
                    <div class="row mt-3">

                        <div class="col-md-12">
                            <div class="text-center text-truncate shadow-sm bg-light  mt-3 mb-3 p-3 border rounded">
                                <!-- Table -->
                                <div class="table-responsive">
                                    <table class="table mb-2 table-striped table-hover display nowrap"
                                           id="datatable_iot" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>serial</th>
                                            <th>soil_hum</th>
                                            <th>soil_temp</th>
                                            <th>air_hum</th>
                                            <th>air_temp</th>
                                            <th>light_intensity</th>
                                            <th>date_time</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-light" id="delete_all">Clear Database</button>
                   <?php
                    echo "<td><input type='hidden'  value='deleterecord' /></td>";
                ?>
                    </div>
                <!-- ############ end tab1 ################# -->
                <div class="tab-pane" id="tab2">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="text-center shadow-sm bg-light  mt-3 mb-3 pt-4 border rounded">
                                <div class="form-check form-check-inline mb-2">
                                    <label for="stackedCheck1" class="form-check-label mr-3">Relay 1 : </label>
                                    <div><input type="checkbox" data-toggle="toggle" data-on="ON" data-off="OFF"
                                                data-onstyle="success" data-offstyle="danger" id="relay1"
                                                data-width="80"></div>
                                    <label for="stackedCheck1" class="form-check-label ml-3 led_off"
                                           id="status_relay1"></label>
                                </div>
                                <div class="form-check form-check-inline mb-2">
                                    <label for="stackedCheck1" class="form-check-label mr-3">Relay 2 : </label>
                                    <div><input type="checkbox" data-toggle="toggle" data-on="ON" data-off="OFF"
                                                data-onstyle="success" data-offstyle="danger" id="relay2"
                                                data-width="80"></div>
                                    <label for="stackedCheck1" class="form-check-label ml-3 led_off"
                                           id="status_relay2"></label>
                                </div>
                                <div class="form-check form-check-inline mb-2">
                                    <label for="stackedCheck1" class="form-check-label mr-3">Relay 3 : </label>
                                    <div><input type="checkbox" data-toggle="toggle" data-on="ON" data-off="OFF"
                                                data-onstyle="success" data-offstyle="danger" id="relay3"
                                                data-width="80"></div>
                                    <label for="stackedCheck1" class="form-check-label ml-3 led_off"
                                           id="status_relay3"></label>
                                </div>
                                <div class="form-check form-check-inline mb-2">
                                    <label for="stackedCheck1" class="form-check-label mr-3">Relay 4 : </label>
                                    <div><input type="checkbox" data-toggle="toggle" data-on="ON" data-off="OFF"
                                                data-onstyle="success" data-offstyle="danger" id="relay4"
                                                data-width="80"></div>
                                    <label for="stackedCheck1" class="form-check-label ml-3 led_off"
                                           id="status_relay4"></label>
                                </div>
                                <div class="form-check form-check-inline mb-2">
                                    <label for="stackedCheck1" class="form-check-label mr-3">Relay 5 : </label>
                                    <div><input type="checkbox" data-toggle="toggle" data-on="ON" data-off="OFF"
                                                data-onstyle="success" data-offstyle="danger" id="relay5"
                                                data-width="80"></div>
                                    <label for="stackedCheck1" class="form-check-label ml-3 led_off"
                                           id="status_relay5"></label>
                                </div>
                                <div class="form-check form-check-inline mb-2">
                                    <label for="stackedCheck1" class="form-check-label mr-3">Relay 6 : </label>
                                    <div><input type="checkbox" data-toggle="toggle" data-on="ON" data-off="OFF"
                                                data-onstyle="success" data-offstyle="danger" id="relay6"
                                                data-width="80"></div>
                                    <label for="stackedCheck1" class="form-check-label ml-3 led_off"
                                           id="status_relay6"></label>
                                </div>
                                <div class="form-check form-check-inline mb-2">
                                    <label for="stackedCheck1" class="form-check-label mr-3">Relay 7 : </label>
                                    <div><input type="checkbox" data-toggle="toggle" data-on="ON" data-off="OFF"
                                                data-onstyle="success" data-offstyle="danger" id="relay7"
                                                data-width="80"></div>
                                    <label for="stackedCheck1" class="form-check-label ml-3 led_off"
                                           id="status_relay7"></label>
                                </div>
                                <div class="form-check form-check-inline mb-2">
                                    <label for="stackedCheck1" class="form-check-label mr-3">Relay 8 : </label>
                                    <div><input type="checkbox" data-toggle="toggle" data-on="ON" data-off="OFF"
                                                data-onstyle="success" data-offstyle="danger" id="relay8"
                                                data-width="80"></div>
                                    <label for="stackedCheck1" class="form-check-label ml-3 led_off"
                                           id="status_relay8"></label>
                                </div>
                                <hr class="mb-0">
                                <div class="col-md-12 mx-auto mt-1 mb-2" id="time_relay">Last update : ...</div>
                            </div>
                        </div>
                        <div class="col-md-4"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
</div>


<script src="public/js/jquery-3.6.0.min.js"></script>
<script src="public/js/popper.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/datatables.min.js"></script>
<script src="public/js/moment.min.js"></script>
<script src="public/js/bootstrap4-toggle.min.js"></script>
<script src="public/js/pdfmake.min.js"></script>
<script src="public/js/vfs_fonts.js"></script>
<script src="public/js/custom.js"></script>

</body>

</html>
