<?php

	
	require_once '../include_login/Auth.php';
    
    $pdo = new DBController();
    $auth = new Auth();

    

    $user_id = $_COOKIE['user_login'];
	$error = "";
    

	if (isset($_POST["btn_upload"]) == "Last opp")
	{
		$uploadOk = 1;

		$file_tmp = $_FILES["fileImg"]["tmp_name"];
		$file_name = $_FILES["fileImg"]["name"];

		$image_name = $_POST["img-name"];

		$file_path = "profilbilde/".$file_name;

		$target_file = $file_path . basename($file_name);	

	if($image_name == "")
	{
		$error = "Please enter Image name.";
	}

	else
	{
		if(file_exists($file_path))
		{
			$error = "Bildet <b>".$file_name."</b> finnest allerede.";
			$uploadOk = 0;
		}
			else
			{   
                $query = "INSERT INTO image_table(bruker_id,img_name,img_path)
                VALUES(:user_id, :image_name, :file_path)";
                $param_value_array = array(':user_id' => $user_id, ':image_name' => $image_name, ':file_path' => $file_path);
                $pdo->update($query, $param_value_array);
                
			}
		}
	}
	
	if (isset($_POST["btn_endre"]) == "Endre bilde")
	{
		$uploadOk = 1;

		$file_tmp = $_FILES["fileImg"]["tmp_name"];
		$file_name = $_FILES["fileImg"]["name"];

		$image_name = $_POST["img-name"];

		$file_path = "profilbilde/".$file_name;

		$target_file = $file_path . basename($file_name);	

	if($image_name == "")
	{
		$error = "Please enter Image name.";
	}

	else
	{
		if(file_exists($file_path))
		{
			$error = "Bildet <b>".$file_name."</b> finnest allerede.";
			$uploadOk = 0;
		}
			else
			{
                
                $query = "UPDATE image_table SET img_name = :image_name, img_path= :file_path 
                WHERE bruker_id = :user_id";
                $param_value_array = array(':user_id' => $user_id, ':image_name' => $image_name, ':file_path' => $file_path);
                $pdo->update($query, $param_value_array);
                
			}
		}
	}

?>