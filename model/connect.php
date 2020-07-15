<?php
class database
{
	var $host = "localhost";
	var $uname = "root";
	var $pass = "";
	var $db = "forum";
	var $connect;

	//CONSTRUCTOR
	function __construct()
	{
		$this->connect = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
		mysqli_select_db($this->connect, $this->db);
	}

	//METHOD TAMPIL DATA USER
	function tampil_data_user()
	{
		$data = mysqli_query($this->connect, "select * from user");
		while ($d = mysqli_fetch_array($data)) {
			$hasil[] = $d;
		}
		return $hasil;
	}

	//METHOD HITUNG POST
	function hitung_post()
	{
            
	}

	//METHOD TAMPIL POST
	function tampil_post()
	{
		$query = mysqli_query($this->connect, "SELECT COUNT(idPost) FROM post");
		$jumlahPost = mysqli_fetch_assoc($query);

		if($jumlahPost > 0)
		{
			$data = mysqli_query($this->connect, "SELECT * FROM post LEFT JOIN user ON post.idUser=user.idUser;");

			while ($d = mysqli_fetch_array($data)) {
				$hasil[] = $d;
			}
			return $hasil;
		}
	}


	//METHOD AUTO INCREMENT VARCHAR ID
	function latest_id($id, $table)
	{
		$query = "SELECT $id FROM $table WHERE $id=(SELECT max($id) FROM $table);";
		// $query = "SELECT idPost FROM post WHERE idPost=(SELECT max(idPost) FROM post);";

		$result = mysqli_query($this->connect, $query);
		$idPost = mysqli_fetch_assoc($result);

		foreach ($idPost as $data) {
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

	// function add_post(){
	// 	$idPost = mysqli_real_escape_string($this->connect, $_REQUEST['idPost']);
	// 	$idUser = mysqli_real_escape_string($this->connect, $_REQUEST['idUser']);
	// 	$category = mysqli_real_escape_string($this->connect, $_REQUEST['category']);
	// 	$title = mysqli_real_escape_string($this->connect, $_REQUEST['title']);
	// 	$article = mysqli_real_escape_string($this->connect, $_REQUEST['article']);


	// 	mysqli_query($this->connect, "insert into post values('$idPost', '$idUser', '$category', now(), '$title', '$article')");
	// }

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
