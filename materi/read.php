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
		$query = mysqli_query($link, "SELECT * FROM materi");

		$materis = array();
		while ($data = mysqli_fetch_array($query)) {
			$materi = array(
				"id" => $data['id'],
				"deskripsi" => $data['deskripsi'],
				"id_user" => $data['id_user']
			);
			array_push($materis, $materi);
		}

		echo json_encode($materis);
	}
?>