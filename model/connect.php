<?php
class database
{
	var $host = "localhost";
	var $uname = "root";
	var $pass = "";
	var $db = "forum";
	var $connect;

	function __construct()
	{
		$this->connect = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
		mysqli_select_db($this->connect, $this->db);
	}

	function tampil_data()
	{
		$data = mysqli_query($this->connect, "select * from user");
		while ($d = mysqli_fetch_array($data)) {
			$hasil[] = $d;
		}
		return $hasil;
	}

	function tampil_post()
	{
		$data = mysqli_query(
			$this->connect,
			"SELECT * FROM post LEFT JOIN user ON post.idUser=user.idUser;"
		);
		while ($d = mysqli_fetch_array($data)) {
			$hasil[] = $d;
		}
		return $hasil;

		// $idUser = $fetch_username;
	}

	function latest_idPost()
	{
		$query = "SELECT idPost FROM post WHERE idPost=(SELECT max(idPost) FROM post);";

		// $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
		$result = mysqli_query($this->connect, $query);
		$idPost = mysqli_fetch_assoc($result);
		// var_dump($idPost);
		// die();

		foreach ($idPost as $data) {
			// var_dump($data);
			// die();
			if ($data) {
				$alpha = substr($data, 0, 1); // Get the first three characters and put them in $alpha
				$numeric = substr($data, 3, 9); // Get the following six digits and put them in $numeric
				$numeric++; // Add one to $numeric
				$numeric = str_pad($numeric, 9, '0', STR_PAD_LEFT); // Pad $numeric with leading zeros
				$newids = $alpha . $numeric; // Concatenate the two variables into $newids
			}
		}




		return $newids;
	}

	function add_post()
	{
		mysqli_query($this->connect, "insert into post values('idPost', 'idUser', 'category', 'date', 'title', 'article')");
	}

	// function input($nama, $alamat, $usia)
	// {
	// 	mysqli_query($this->connect, "insert into user values('','$nama','$alamat','$usia')");
	// }



	// function edit($id)
	// {
	// 	$data = mysqli_query($this->connect, "select * from user where id='$id'");
	// 	while ($d = mysqli_fetch_array($data))
	// 	{
	// 		$hasil[] = $d;
	// 	}
	// 	return $hasil;
	// }

	// function update($id, $nama, $alamat, $usia)
	// {
	// 	mysqli_query($this->connect, "update user set nama='$nama', alamat='$alamat', usia='$usia' where id='$id'");
	// }


}
