<?php

require __DIR__ . '/vendor/froala/wysiwyg-editor-php-sdk/lib/FroalaEditor.php';

try {
	$src = $_POST['src'];
	$upload_folder = "/uploads/";
	
	// If the file is inside the uploads folder
	if (substr($src, 0, strlen($upload_folder)) === $upload_folder)
	{
		$response = FroalaEditor_Image::delete($src);
		echo stripslashes(json_encode('Success'));
	}
	else
	{
		echo stripslashes(json_encode('Error'));
	}
} catch (Exception $e) {
	echo $e->getMessage();
	http_response_code(404);
}
