<?php

function check_login($conn)
{

	if(isset($_SESSION['Roll_No']))
	{

		$id = $_SESSION['Roll_No'];
		$query = "select * from user_details where Roll_No = '$id'";

		$result = mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: ../mlogin/mlogin.php");
	die;

}