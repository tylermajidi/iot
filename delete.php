<?php

include 'connection.php';

if (isset($_POST['deleteall'])) {
    $sql = "DELETE FROM `tbl_iot` ; SET @num:=0;    
update `tbl_iot` SET id= @num := (@num+1);
ALTER TABLE `tbl_iot` AUTO_INCREMENT=1;

";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

if (isset($_POST['deleterecord'])) {
    $stmt = $conn->prepare("
   CREATE 
EVENT `deleteEvent`
ON SCHEDULE EVERY 1 MINUTE STARTS '2016-03-23 00:00:00'
ON COMPLETION NOT PRESERVE
ENABLE
DO
DELETE FROM `tbl_iot`;
SET @num :=0;
update `tbl_iot` SET id =@num := (@num+1);
ALTER TABLE `tbl_iot` AUTO_INCREMENT=1;
");
    $stmt->execute();
    header("location:index:php");

}
//    $query = "DELETE FROM `tbl_iot` WHERE id > 0 AND id < 300;
//
//SET @num := 0;
//UPDATE `tbl_iot` SET id= @num:=(@num+1);
//ALTER TABLE `tbl_iot` AUTO_INCREMENT=1;";
//
//    $stmt1 = $conn->prepare($query);
//    $stmt->execute();



