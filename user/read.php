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
		$query = mysqli_query($link, "SELECT * FROM user");

		$users = array();
		while ($data = mysqli_fetch_array($query)) {
			$user = array(
				"id" => $data['id'],
				"nama" => $data['nama'],
				"username" => $data['username'],
				"password" => $data['password'],
				"role" => $data['role']
			);
			array_push($users, $user);
		}

		echo json_encode($users);
	}
?>