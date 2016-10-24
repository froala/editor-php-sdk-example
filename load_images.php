<?php

require __DIR__ . '/vendor/froala/wysiwyg-editor-php-sdk/lib/FroalaEditor.php';

$response = FroalaEditor_Image::getList('/uploads/');

echo stripslashes(json_encode($response));
?>