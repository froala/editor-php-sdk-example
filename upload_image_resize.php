<?php

require __DIR__ . '/vendor/froala/wysiwyg-editor-php-sdk/lib/FroalaEditor.php';

$options = array(
  'resize' => array(
    'columns' => 300,
    'rows' => 300,
    'bestfit' => true
  )
);

try {
  $response = FroalaEditor_Image::upload('/uploads/', $options);
  echo stripslashes(json_encode($response));
} catch (Exception $e) {
  echo $e->getMessage();
  http_response_code(404);
}