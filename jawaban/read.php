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
		$query = mysqli_query($link, "SELECT * FROM jawaban");

		$jawabans = array();
		while ($data = mysqli_fetch_array($query)) {
			$jawaban = array(
				"id" => $data['id'],
				"id_tugas" => $data['id_tugas'],
				"deskripsi" => $data['deskripsi'],
				"nilai" => $data['nilai'],
				"id_user" => $data['id_user']
			);
			array_push($jawabans, $jawaban);
		}

		echo json_encode($jawabans);
	}
?>