<?php

require __DIR__ . '/vendor/froala/wysiwyg-editor-php-sdk/lib/FroalaEditor.php';

$options = array(
  'fieldname' => 'myImage',
  'validation' => function($filePath, $mimetype) {

    $imagick = new \Imagick($filePath);
    $size = $imagick->getImageGeometry();
    $imagick->destroy();

    if ($size['width'] != $size['height']) {
      return false;
    }

    return true;
  }
);

try {
  $response = FroalaEditor_Image::upload('/uploads/', $options);
  echo stripslashes(json_encode($response));
} catch (Exception $e) {
  echo $e->getMessage();
  http_response_code(404);
}