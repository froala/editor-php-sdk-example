<?php

require __DIR__ . '/vendor/froala/wysiwyg-editor-php-sdk/lib/FroalaEditor.php';

try {
  $response = FroalaEditor_File::delete($_POST['src']);
  echo stripslashes(json_encode('Success'));
} catch (Exception $e) {
  echo $e->getMessage();
  http_response_code(404);
}