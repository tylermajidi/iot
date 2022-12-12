<?php
// Database Connection
include 'connection.php';

if (isset($_POST['draw']) && isset($_POST['start']) && isset($_POST['length']) && isset($_POST['order'])) {

    // Reading value
    $draw = $_POST['draw'];
    $row = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    $searchValue = $_POST['search']['value']; // Search value

    $searchArray = array();

    // Search
    $searchQuery = " ";
    if ($searchValue != '') {
        $searchQuery = " AND (soil_hum LIKE :soil_hum OR 
              soil_temp LIKE :soil_temp OR
              air_hum LIKE :air_hum OR 
              air_temp LIKE :air_temp OR 
              light_intensity LIKE :light_intensity OR 
              date_time LIKE :date_time) ";
        $searchArray = array(
            'soil_hum' => "%$searchValue%",
            'soil_temp' => "%$searchValue%",
            'air_hum' => "%$searchValue%",
            'air_temp' => "%$searchValue%",
            'light_intensity' => "%$searchValue%",
            'date_time' => "%$searchValue%"
        );
    }

    // Total number of records without filtering
    $stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM tbl_iot ");
    $stmt->execute();
    $records = $stmt->fetch();
    $totalRecords = $records['allcount'];



    // Total number of records with filtering
    $stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM tbl_iot WHERE 1 " . $searchQuery);
    $stmt->execute($searchArray);
    $records = $stmt->fetch();
    $totalRecordwithFilter = $records['allcount'];

    // Fetch records
    $stmt = $conn->prepare("SELECT * FROM tbl_iot WHERE 1 " . $searchQuery . " ORDER BY " . $columnName . " " . $columnSortOrder . " LIMIT :limit,:offset");

    // Bind values
    foreach ($searchArray as $key => $search) {
        $stmt->bindValue(':' . $key, $search, PDO::PARAM_STR);
    }

    $stmt->bindValue(':limit', (int)$row, PDO::PARAM_INT);
    $stmt->bindValue(':offset', (int)$rowperpage, PDO::PARAM_INT);
    $stmt->execute();
    $empRecords = $stmt->fetchAll();

    $data = array();

    foreach ($empRecords as $row) {
        $data[] = array(
            "id" => $row['id'],
            "serial" => $row['serial'],
            "soil_hum" => $row['soil_hum'],
            "soil_temp" => $row['soil_temp'],
            "air_hum" => $row['air_hum'],
            "air_temp" => $row['air_temp'],
            "light_intensity" => $row['light_intensity'],
            "date_time" => $row['date_time']
        );
    }

    // Response
    $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
    );

    echo json_encode($response);
}


if (isset($_POST['number']) && !empty($_POST['number']) && isset($_POST['relay']) && !empty($_POST['relay'])) {
    $sql = "UPDATE `tbl_relay` SET `state` =:value1 where `number`=:value2";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':value1', $_POST['relay']);
    $stmt->bindParam(':value2', $_POST['number']);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count != 0) {
        echo 1;
    } else {
        echo 0;
    }
}



if (isset($_POST['check_status'])) {
    $data = array();
    $sql = "SELECT * FROM `tbl_relay` WHERE `number`=\"status\"";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row['number'] == "status") {
            $data[] = array(
                "out" => $row['state'],
                "time_relay" => $row['date_time']
            );
        }
    }
    $sql = "SELECT * FROM `tbl_iot` ORDER BY id DESC"; //DESC:descending * ASC:ascending
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $data[] = array(
            "serial" => $row['serial'],
            "soil_hum" => $row['soil_hum'],
            "soil_temp" => $row['soil_temp'],
            "air_hum" => $row['air_hum'],
            "air_temp" => $row['air_temp'],
            "light_intensity" => $row['light_intensity'],
            "time_iot" => $row['date_time']
        );
    }
    echo json_encode($data);
}

if (isset($_POST['serial']) && isset($_POST['soil_hum']) && isset($_POST['soil_temp']) && isset($_POST['air_hum']) && isset($_POST['air_temp'])
    && isset($_POST['light']) && isset($_POST['relay'])) {
    $sql = "INSERT INTO `tbl_iot` (`serial`,`soil_hum`,`soil_temp`,`air_hum`,`air_temp`,`light_intensity`)
 VALUES (:value1,:value2,:value3,:value4,:value5,:value6)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':value1', $_POST['serial']);
    $stmt->bindParam(':value2', $_POST['soil_hum']);
    $stmt->bindParam(':value3', $_POST['soil_temp']);
    $stmt->bindParam(':value4', $_POST['air_hum']);
    $stmt->bindParam(':value5', $_POST['air_temp']);
    $stmt->bindParam(':value6', $_POST['light']);
    $stmt->execute();

    $sql = "UPDATE `tbl_relay` SET `state` =:status where number=\"status\"";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':status', $_POST['relay']);
    $stmt->execute();

    $data = array();
    $sql = "SELECT * FROM `tbl_relay`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $str = "relay=\"";
        foreach ($row as $value) {
            if ($value['number'] != "status") {
                if ($value['state'] == "on") {
                    $str .= "1";
                } elseif ($value['state'] == "off") {
                    $str .= "0";
                }
            }
        }
        $str .= "\"";
        echo $str;
    }
}
