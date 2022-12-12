$(document).ready(function () {
    $('#datatable_iot').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'POST',
        // buttons
        "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        "buttons": [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        'ajax': {
            'url': 'records.php',

        },
        'columns': [{
            data: 'id'
        },
            {data: 'serial'},
            {
                data: 'soil_hum'
            }, {
                data: 'soil_temp'
            }, {
                data: 'air_hum'
            }, {
                data: 'air_temp'
            }, {
                data: 'light_intensity'
            }, {
                data: 'date_time'
            }]
    });


    function check_status_relay() {
        $.ajax({
            url: "records.php",
            type: "POST",
            data: {
                check_status: true
            },
            success: function (data, textStatus, jqXHR) {
                data = JSON.parse(data);
                if (data[0].out !== undefined) {
                    if ((data[0].out.substr(0, 1)) == "1") {
                        $("#status_relay1").removeClass("led_off");
                        $("#status_relay1").addClass("led_on");
                        $('#relay1').bootstrapToggle('on', true);
                    } else {
                        $("#status_relay1").removeClass("led_on");
                        $("#status_relay1").addClass("led_off");
                        $('#relay1').bootstrapToggle('off', true);
                    }
                    if ((data[0].out.substr(1, 1)) == "1") {
                        $("#status_relay2").removeClass("led_off");
                        $("#status_relay2").addClass("led_on");
                        $('#relay2').bootstrapToggle('on', true);
                    } else {
                        $("#status_relay2").removeClass("led_on");
                        $("#status_relay2").addClass("led_off");
                        $('#relay2').bootstrapToggle('off', true);
                    }
                    if ((data[0].out.substr(2, 1)) == "1") {
                        $("#status_relay3").removeClass("led_off");
                        $("#status_relay3").addClass("led_on");
                        $('#relay3').bootstrapToggle('on', true);
                    } else {
                        $("#status_relay3").removeClass("led_on");
                        $("#status_relay3").addClass("led_off");
                        $('#relay3').bootstrapToggle('off', true);
                    }
                    if ((data[0].out.substr(3, 1)) == "1") {
                        $("#status_relay4").removeClass("led_off");
                        $("#status_relay4").addClass("led_on");
                        $('#relay4').bootstrapToggle('on', true);
                    } else {
                        $("#status_relay4").removeClass("led_on");
                        $("#status_relay4").addClass("led_off");
                        $('#relay4').bootstrapToggle('off', true);
                    }
                    if ((data[0].out.substr(4, 1)) == "1") {
                        $("#status_relay5").removeClass("led_off");
                        $("#status_relay5").addClass("led_on");
                        $('#relay5').bootstrapToggle('on', true);
                    } else {
                        $("#status_relay5").removeClass("led_on");
                        $("#status_relay5").addClass("led_off");
                        $('#relay5').bootstrapToggle('off', true);
                    }
                    if ((data[0].out.substr(5, 1)) == "1") {
                        $("#status_relay6").removeClass("led_off");
                        $("#status_relay6").addClass("led_on");
                        $('#relay6').bootstrapToggle('on', true);
                    } else {
                        $("#status_relay6").removeClass("led_on");
                        $("#status_relay6").addClass("led_off");
                        $('#relay6').bootstrapToggle('off', true);
                    }
                    if ((data[0].out.substr(6, 1)) == "1") {
                        $("#status_relay7").removeClass("led_off");
                        $("#status_relay7").addClass("led_on");
                        $('#relay7').bootstrapToggle('on', true);
                    } else {
                        $("#status_relay7").removeClass("led_on");
                        $("#status_relay7").addClass("led_off");
                        $('#relay7').bootstrapToggle('off', true);
                    }
                    if ((data[0].out.substr(7, 1)) == "1") {
                        $("#status_relay8").removeClass("led_off");
                        $("#status_relay8").addClass("led_on");
                        $('#relay8').bootstrapToggle('on', true);
                    } else {
                        $("#status_relay8").removeClass("led_on");
                        $("#status_relay8").addClass("led_off");
                        $('#relay8').bootstrapToggle('off', true);
                    }
                    $('#time_relay').html(`Last update : ${data[0].time_relay}`);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
            }
        });

    }

    check_status_relay();
    setInterval(update_status, 3000);

    function update_status() {
        $.ajax({
            url: "records.php",
            type: "POST",
            data: {
                check_status: true
            },
            success: function (data, textStatus, jqXHR) {
                data = JSON.parse(data);
                $('#serial').html(`سریال : ${data[1].serial}`);
                $('#soil_hum').html(`رطوبت خاک : ${data[1].soil_hum}`);
                $('#soil_temp').html(`دمای خاک : ${data[1].soil_temp}`);
                $('#air_hum').html(`رطوبت هوا : ${data[1].air_hum}`);
                $('#air_temp').html(`دمای هوا : ${data[1].air_temp}`);
                $('#light_intensity').html(`شدت نور : % ${data[1].light_intensity}`);
                $('#time_iot').html(`Last update : ${data[1].time_iot}`);
                if (data[0].out !== undefined) {
                    if ((data[0].out.substr(0, 1)) == "1") {
                        $("#status_relay1").removeClass("led_off");
                        $("#status_relay1").addClass("led_on");
                    } else {
                        $("#status_relay1").removeClass("led_on");
                        $("#status_relay1").addClass("led_off");
                    }
                    if ((data[0].out.substr(1, 1)) == "1") {
                        $("#status_relay2").removeClass("led_off");
                        $("#status_relay2").addClass("led_on");
                    } else {
                        $("#status_relay2").removeClass("led_on");
                        $("#status_relay2").addClass("led_off");
                    }
                    if ((data[0].out.substr(2, 1)) == "1") {
                        $("#status_relay3").removeClass("led_off");
                        $("#status_relay3").addClass("led_on");
                    } else {
                        $("#status_relay3").removeClass("led_on");
                        $("#status_relay3").addClass("led_off");
                    }
                    if ((data[0].out.substr(3, 1)) == "1") {
                        $("#status_relay4").removeClass("led_off");
                        $("#status_relay4").addClass("led_on");
                    } else {
                        $("#status_relay4").removeClass("led_on");
                        $("#status_relay4").addClass("led_off");
                    }
                    if ((data[0].out.substr(4, 1)) == "1") {
                        $("#status_relay5").removeClass("led_off");
                        $("#status_relay5").addClass("led_on");
                    } else {
                        $("#status_relay5").removeClass("led_on");
                        $("#status_relay5").addClass("led_off");
                    }
                    if ((data[0].out.substr(5, 1)) == "1") {
                        $("#status_relay6").removeClass("led_off");
                        $("#status_relay6").addClass("led_on");
                    } else {
                        $("#status_relay6").removeClass("led_on");
                        $("#status_relay6").addClass("led_off");
                    }
                    if ((data[0].out.substr(6, 1)) == "1") {
                        $("#status_relay7").removeClass("led_off");
                        $("#status_relay7").addClass("led_on");
                    } else {
                        $("#status_relay7").removeClass("led_on");
                        $("#status_relay7").addClass("led_off");
                    }
                    if ((data[0].out.substr(7, 1)) == "1") {
                        $("#status_relay8").removeClass("led_off");
                        $("#status_relay8").addClass("led_on");
                    } else {
                        $("#status_relay8").removeClass("led_on");
                        $("#status_relay8").addClass("led_off");
                    }
                    $('#time_relay').html(`Last update : ${data[0].time_relay}`);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
            }
        });

    };


    $('#relay1').change(function () {
        var data = $(this).prop('checked') ? "on" : "off";
        // alert(data);
        $.ajax({
            url: "records.php",
            type: "POST",
            data: {
                number: "relay1",
                relay: data
            },
            success: function (data, textStatus, jqXHR) {
                //data - response from server
                // console.log(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    })

    $('#relay2').change(function () {
        var data = $(this).prop('checked') ? "on" : "off";
        // alert(data);
        $.ajax({
            url: "records.php",
            type: "POST",
            data: {
                number: "relay2",
                relay: data
            },
            success: function (data, textStatus, jqXHR) {
                //data - response from server
                // console.log(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    })

    $('#relay3').change(function () {
        var data = $(this).prop('checked') ? "on" : "off";
        // alert(data);
        $.ajax({
            url: "records.php",
            type: "POST",
            data: {
                number: "relay3",
                relay: data
            },
            success: function (data, textStatus, jqXHR) {
                //data - response from server
                // console.log(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    })

    $('#relay4').change(function () {
        var data = $(this).prop('checked') ? "on" : "off";
        // alert(data);
        $.ajax({
            url: "records.php",
            type: "POST",
            data: {
                number: "relay4",
                relay: data
            },
            success: function (data, textStatus, jqXHR) {
                //data - response from server
                // console.log(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    })

    $('#relay5').change(function () {
        var data = $(this).prop('checked') ? "on" : "off";
        // alert(data);
        $.ajax({
            url: "records.php",
            type: "POST",
            data: {
                number: "relay5",
                relay: data
            },
            success: function (data, textStatus, jqXHR) {
                //data - response from server
                // console.log(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    })
    $('#relay6').change(function () {
        var data = $(this).prop('checked') ? "on" : "off";
        // alert(data);
        $.ajax({
            url: "records.php",
            type: "POST",
            data: {
                number: "relay6",
                relay: data
            },
            success: function (data, textStatus, jqXHR) {
                //data - response from server
                // console.log(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    })
    $('#relay7').change(function () {
        var data = $(this).prop('checked') ? "on" : "off";
        // alert(data);
        $.ajax({
            url: "records.php",
            type: "POST",
            data: {
                number: "relay7",
                relay: data
            },
            success: function (data, textStatus, jqXHR) {
                //data - response from server
                // console.log(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    })
    $('#relay8').change(function () {
        var data = $(this).prop('checked') ? "on" : "off";
        // alert(data);
        $.ajax({
            url: "records.php",
            type: "POST",
            data: {
                number: "relay8",
                relay: data
            },
            success: function (data, textStatus, jqXHR) {
                //data - response from server
                // console.log(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    })

    $("#delete_all").click(function () {
        if (confirm("Are you sure?")) {
            $.ajax({
                url: "delete.php",
                type: "POST",
                data: {deleteall: 1},
                success: function (data, textStatus, jqXHR) {
                    //data - response from server
                    // console.log(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {

                }
            });

        }

    });
    $("#delete_records").addEventListener(function () {

            $.ajax({
                url: "delete.php",
                type: "POST",
                data: {deleterecords: 1},
                success: function (data, textStatus, jqXHR) {


                },
                error: function (jqXHR, textStatus, errorThrown) {

                }
            })
    });


});
