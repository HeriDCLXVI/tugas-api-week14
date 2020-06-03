<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "../connect.php";

	$data = json_decode(file_get_contents("php://input"));

	$id_tugas = $data->id_tugas;
	$deskripsi = $data->deskripsi;
	$id_user = $data->id_user;
	$token = $data->token;

	$response = array();

	if ($token != $auth_token) {
		$response['error'] = true;
		$response['message'] = "Token salah";

		echo json_encode($response);
	}
	else {
		$query = mysqli_query($link, "INSERT INTO jawaban(id_tugas, deskripsi, id_user) VALUES('$id_tugas', '$deskripsi', '$id_user')");

		if ($query) {
			$response['error'] = false;
			$response['message'] = "Data berhasil disimpan";
		}
		else {
			$response['error'] = true;
			$response['message'] = "Data gagal disimpan";
		}

		echo json_encode($response);
	}
?>