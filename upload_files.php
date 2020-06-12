<?php

require __DIR__ . '/vendor/froala/wysiwyg-editor-php-sdk/lib/FroalaEditor.php';

$options = array(
  'validation' => null
);

try {
  $response = FroalaEditor_File::upload('/uploads/', $options);
  echo stripslashes(json_encode($response));
} catch (Exception $e) {
  echo $e->getMessage();
  http_response_code(404);
}