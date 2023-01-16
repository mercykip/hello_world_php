<?php

// header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

$data = json_decode(file_get_contents("php://input"), true);

$searchterm = $data['student_name'];

include 'database_connection.php';

$sql = "select * from student where student_name like '%$searchterm%'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
  echo json_encode($data);
} else {  
  echo json_encode(['msg' => 'No Data Found to search query!', 'status' => false]);
}

?>