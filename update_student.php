<?php
 header('Content-Type: application/json');
 header('Access-Control-Allow-Origin: *');
 header('Access-Control-Allow-Methods: PUT');
 header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods, Access-Control-Allow-Headers, Authorization, X-Requested-With');

 $data = json_decode(file_get_contents("php://input"), true);

 $sname = $data['student_name'];
 $sid = $data['id'];

 include 'database_connection.php';
 
 $sql = "update student set student_name = '$sname' where id = '$sid'";

 if (mysqli_query($conn, $sql)) {
    echo json_encode(['msg' => 'Data Updated Successfully!', 'status' => true]);
  } else {
    echo json_encode(['msg' => 'Data Failed to be Updated!', 'status' => false]);
  }
?>