<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "../connect.php";

	$data = json_decode(file_get_contents("php://input"));

	$id = $data->id;
	$nilai = $data->nilai;
	$token = $data->token;

	$response = array();

	if ($token != $auth_token) {
		$response['error'] = true;
		$response['message'] = "Token salah";

		echo json_encode($response);
	}
	else {
		$query = mysqli_query($link, "UPDATE jawaban SET nilai = '$nilai' WHERE id = '$id'");

		if ($query) {
			$response['error'] = false;
			$response['message'] = "Data berhasil diubah";
		}
		else {
			$response['error'] = true;
			$response['message'] = "Data gagal diubah";
		}

		echo json_encode($response);
	}
?>