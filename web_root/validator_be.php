<?php

function _validate_uploaded_app(){
	
	$target_dir = "uploads";
	$s_codefile_fnp = "tasks\\".$_POST["codefile"]."\\code.txt";

	//$s_codefile_fnp = "c:\\xampp\\htdocs\\validator\\validation_scripts\\code1.txt";

	//using uploaded fn:
	//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

	//using unique name: (for multiple users):
	$target_file = $target_dir . uniqid(rand(), true) . '.exe';

	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if file already exists:
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size:
	if ($_FILES["fileToUpload"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats:
	if($imageFileType != "exe") {
		echo "Вибачте, лише файли типу EXE дозволені!";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error:
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file:
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "Файл ". basename( $_FILES["fileToUpload"]["name"]). " завантажено на сервер Ок! Запускаемо валідатор...";
			$command = "validator.exe $target_file $s_codefile_fnp";
			$ret = system($command);
			//delete file:
			unlink($target_file);
		} else {
			echo "Вибачте, завантажити файл не вдалося!";
		}
	}
}

?>