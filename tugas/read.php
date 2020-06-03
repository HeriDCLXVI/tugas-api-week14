<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "../connect.php";

	$data = json_decode(file_get_contents("php://input"));

	$token = $data->token;

	$response = array();

	if ($token != $auth_token) {
		$response['error'] = true;
		$response['message'] = "Token salah";

		echo json_encode($response);
	}
	else {
		$query = mysqli_query($link, "SELECT * FROM tugas");

		$tugass = array();
		while ($data = mysqli_fetch_array($query)) {
			$tugas = array(
				"id" => $data['id'],
				"deskripsi" => $data['deskripsi'],
				"deadline" => $data['deadline'],
				"id_user" => $data['id_user']
			);
			array_push($tugass, $tugas);
		}

		echo json_encode($tugass);
	}
?>