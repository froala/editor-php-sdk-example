<?php

require __DIR__ . '/vendor/froala/wysiwyg-editor-php-sdk/lib/FroalaEditor.php';

// Create upload folder if it does not exists.
$directoryName = __DIR__ . '/uploads';
if(!is_dir($directoryName)){
  mkdir($directoryName, 0755, true);
}

// Load Amazon S3 config from system environment variables.
$bucket = getenv('AWS_BUCKET');
$region = getenv('AWS_REGION');
$keyStart = getenv('AWS_KEY_START');
$acl = getenv('AWS_ACL');
$accessKeyId = getenv('AWS_ACCESS_KEY');
$secretKey = getenv('AWS_SECRET_ACCESS_KEY');

// Get hash.
$config = array(
  'timezone' => 'Europe/Bucharest',
  'bucket' => $bucket,
  'region' => $region,
  'keyStart' => $keyStart,
  'acl' => $acl,
  'accessKey' => $accessKeyId,
  'secretKey' => $secretKey
);

$hash = FroalaEditor_S3::getHash($config);
$hash = stripslashes(json_encode($hash));

?>

<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0"./>

    <!-- Include Font Awesome. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

  <!-- Include Froala Editor styles -->
  <link rel="stylesheet" href="./vendor/froala/wysiwyg-editor/css/froala_editor.min.css" />
  <link rel="stylesheet" href="./vendor/froala/wysiwyg-editor/css/froala_style.min.css" />

  <!-- Include Froala Editor Plugins styles -->
  <link rel="stylesheet" href="./vendor/froala/wysiwyg-editor/css/plugins/char_counter.css">
  <link rel="stylesheet" href="./vendor/froala/wysiwyg-editor/css/plugins/code_view.css">
  <link rel="stylesheet" href="./vendor/froala/wysiwyg-editor/css/plugins/colors.css">
  <link rel="stylesheet" href="./vendor/froala/wysiwyg-editor/css/plugins/emoticons.css">
  <link rel="stylesheet" href="./vendor/froala/wysiwyg-editor/css/plugins/file.css">
  <link rel="stylesheet" href="./vendor/froala/wysiwyg-editor/css/plugins/fullscreen.css">
  <link rel="stylesheet" href="./vendor/froala/wysiwyg-editor/css/plugins/image_manager.css">
  <link rel="stylesheet" href="./vendor/froala/wysiwyg-editor/css/plugins/image.css">
  <link rel="stylesheet" href="./vendor/froala/wysiwyg-editor/css/plugins/line_breaker.css">
  <link rel="stylesheet" href="./vendor/froala/wysiwyg-editor/css/plugins/table.css">
  <link rel="stylesheet" href="./vendor/froala/wysiwyg-editor/css/plugins/video.css">

  <!-- Include Froala Editor -->
  <script src="./vendor/froala/wysiwyg-editor/js/froala_editor.min.js"></script>

  <!-- Include Froala Editor Plugins -->
  <script src="./vendor/froala/wysiwyg-editor/js/plugins/align.min.js"></script>
  <script src="./vendor/froala/wysiwyg-editor/js/plugins/char_counter.min.js"></script>
  <script src="./vendor/froala/wysiwyg-editor/js/plugins/code_beautifier.min.js"></script>
  <script src="./vendor/froala/wysiwyg-editor/js/plugins/code_view.min.js"></script>
  <script src="./vendor/froala/wysiwyg-editor/js/plugins/colors.min.js"></script>
  <script src="./vendor/froala/wysiwyg-editor/js/plugins/emoticons.min.js"></script>
  <script src="./vendor/froala/wysiwyg-editor/js/plugins/entities.min.js"></script>
  <script src="./vendor/froala/wysiwyg-editor/js/third_party/embedly.min.js"></script>
  <script src="./vendor/froala/wysiwyg-editor/js/plugins/file.min.js"></script>
  <script src="./vendor/froala/wysiwyg-editor/js/plugins/font_family.min.js"></script>
  <script src="./vendor/froala/wysiwyg-editor/js/plugins/font_size.min.js"></script>
  <script src="./vendor/froala/wysiwyg-editor/js/plugins/fullscreen.min.js"></script>
  <script src="./vendor/froala/wysiwyg-editor/js/plugins/image.min.js"></script>
  <script src="./vendor/froala/wysiwyg-editor/js/plugins/image_manager.min.js"></script>
  <script src="./vendor/froala/wysiwyg-editor/js/plugins/inline_style.min.js"></script>
  <script src="./vendor/froala/wysiwyg-editor/js/plugins/line_breaker.min.js"></script>
  <script src="./vendor/froala/wysiwyg-editor/js/plugins/link.min.js"></script>
  <script src="./vendor/froala/wysiwyg-editor/js/plugins/lists.min.js"></script>
  <script src="./vendor/froala/wysiwyg-editor/js/plugins/paragraph_format.min.js"></script>
  <script src="./vendor/froala/wysiwyg-editor/js/plugins/paragraph_style.min.js"></script>
  <script src="./vendor/froala/wysiwyg-editor/js/plugins/print.min.js"></script>
  <script src="./vendor/froala/wysiwyg-editor/js/plugins/quote.min.js"></script>
  <script src="./vendor/froala/wysiwyg-editor/js/plugins/save.min.js"></script>
  <script src="./vendor/froala/wysiwyg-editor/js/third_party/spell_checker.min.js"></script>
  <script src="./vendor/froala/wysiwyg-editor/js/plugins/table.min.js"></script>
  <script src="./vendor/froala/wysiwyg-editor/js/plugins/video.min.js"></script>
  <script src="./vendor/froala/wysiwyg-editor/js/third_party/font_awesome.min.js"></script>
  <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

  
  <!-- Include TUI JS. -->
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.6.7/fabric.min.js"></script>
 <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/tui-code-snippet@1.4.0/dist/tui-code-snippet.min.js"></script>
 <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/tui-image-editor@3.2.2/dist/tui-image-editor.min.js"></script>

 <script src="./vendor/froala/wysiwyg-editor/js/third_party/image_tui.min.js"></script>

 <!-- Include TUI CSS. -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tui-image-editor@3.2.2/dist/tui-image-editor.css">
 <link rel="stylesheet" href="https://uicdn.toast.com/tui-color-picker/latest/tui-color-picker.css">

  <!-- End Froala -->

  <link rel="stylesheet" href="./app.css">


</head>

<body>
  <div class="sample">
    <h2>Sample 1: Save to disk</h2>
    <form>
      <textarea id="edit" name="content"></textarea>
    </form>
  </div>
  <script>
    (function() {
      new FroalaEditor('#edit',{
        scaytCustomerId: '1:BaPcJ-zIoA84-HsdxA4-AlMum2-hrr633-cGEma1-WMaXJ-DfFbh4-Vo2ew4-plJvP1-IMwbD-La3',
        imageUploadURL: './upload_image.php',
        imageUploadParams: {
          id: 'my_editor'
        },

        videoUploadURL: './upload_video.php',
        videoUploadParams: {
          id: 'my_editor'
        },
        
        fileUploadURL: './upload_file.php',
        fileUploadParams: {
          id: 'my_editor'
        },

        imageManagerLoadURL: './load_images.php',
        imageManagerDeleteURL: "./delete_image.php",
        imageManagerDeleteMethod: "POST"
      })
      'video.removed', function (e, editor, $video) {
        $.ajax({
          // Request method.
          method: "POST",

          // Request URL.
          url: "./delete_video.php",

          // Request params.
          data: {
            src: $video.attr('src')
          }
        })
        .done (function (data) {
          if(data=='"Success"'){
            console.log ('video was deleted');  
          } else {
            console.log('could not access the path');
          }
        })
        .fail (function (err) {
          console.log ('video delete problem: ' + JSON.stringify(err));
        })
      }
      // Catch image removal from the editor.
      'image.removed', function (e, editor, $img) {
        $.ajax({
          // Request method.
          method: "POST",

          // Request URL.
          url: "./delete_image.php",

          // Request params.
          data: {
            src: $img.attr('src')
          }
        })
        .done (function (data) {
          if(data=='"Success"'){
            console.log ('image was deleted');  
          } else {
            console.log('could not access the path');
          }
        })
        .fail (function (err) {
          console.log ('image delete problem: ' + JSON.stringify(err));
        })
      }

      // Catch image removal from the editor.
      'file.unlink', function (e, editor, link) {

        $.ajax({
          // Request method.
          method: "POST",

          // Request URL.
          url: "./delete_file.php",

          // Request params.
          data: {
            src: link.getAttribute('href')
          }
        })
        .done (function (data) {
          if(data=='"Success"'){
            console.log ('file was deleted');  
          } else {
            console.log('could not access the path');
          }
        })
        .fail (function (err) {
          console.log ('file delete problem: ' + JSON.stringify(err));
        })
      }
    })();
  </script>

  <div class="sample">
    <h2>Sample 2: Save to disk (resize on server)</h2>
    <form>
      <textarea id="edit-resize" name="content"></textarea>
    </form>
  </div>
  <script>
    (function() {
      new FroalaEditor('#edit-resize',{

        imageUploadURL: './upload_image_resize.php',
        imageUploadParams: {
          id: 'my_editor'
        },

        fileUploadURL: './upload_file.php',
        fileUploadParams: {
          id: 'my_editor'
        },

        imageManagerLoadURL: './load_images.php',
        imageManagerDeleteURL: "./delete_image.php",
        imageManagerDeleteMethod: "POST"
      })
      // Catch image removal from the editor.
      'image.removed', function (e, editor, $img) {
        $.ajax({
          // Request method.
          method: "POST",

          // Request URL.
          url: "./delete_image.php",

          // Request params.
          data: {
            src: $img.attr('src')
          }
        })
        .done (function (data) {
          if(data=='"Success"'){
            console.log ('image was deleted');  
          } else {
            console.log('could not access the path');
          }
        })
        .fail (function (err) {
          console.log ('image delete problem: ' + JSON.stringify(err));
        })
      }

      // Catch image removal from the editor.
      'file.unlink', function (e, editor, link) {

        $.ajax({
          // Request method.
          method: "POST",

          // Request URL.
          url: "./delete_file.php",

          // Request params.
          data: {
            src: link.getAttribute('href')
          }
        })
        .done (function (data) {
          if(data=='"Success"'){
            console.log ('file was deleted');  
          } else {
            console.log('could not access the path');
          }
        })
        .fail (function (err) {
          console.log ('file delete problem: ' + JSON.stringify(err));
        })
      }
    })();
  </script>

    <div class="sample">
    <h2>Sample 3: Save to disk with custom validation: Images must be squares (width == height). Files must not exceed 10M.</h2>
    <form>
      <textarea id="edit-validation" name="content"></textarea>
    </form>
  </div>
  <script>
    (function() {
      new FroalaEditor('#edit-validation',{

        imageUploadURL: './upload_image_validation.php',
        imageUploadParams: {
          id: 'my_editor'
        },
        imageUploadParam: 'myImage',

        fileUploadURL: './upload_file_validation.php',
        fileUploadParams: {
          id: 'my_editor'
        },
        fileUploadParam: 'myFile',
        fileMaxSize: 1024 * 1024 * 50,

        imageManagerLoadURL: './load_images.php',
        imageManagerDeleteURL: "./delete_image.php",
        imageManagerDeleteMethod: "POST"
      })
      // Catch image removal from the editor.
      'image.removed', function (e, editor, $img) {
        $.ajax({
          // Request method.
          method: "POST",

          // Request URL.
          url: "./delete_image.php",

          // Request params.
          data: {
            src: $img.attr('src')
          }
        })
        .done (function (data) {
          if(data=='"Success"'){
            console.log ('image was deleted');  
          } else {
            console.log('could not access the path');
          }
        })
        .fail (function (err) {
          console.log ('image delete problem: ' + JSON.stringify(err));
        })
      }

      // Catch image removal from the editor.
      'file.unlink', function (e, editor, link) {

        $.ajax({
          // Request method.
          method: "POST",

          // Request URL.
          url: "./delete_file.php",

          // Request params.
          data: {
            src: link.getAttribute('href')
          }
        })
        .done (function (data) {
          if(data=='"Success"'){
            console.log ('file was deleted');  
          } else {
            console.log('could not access the path');
          }
        })
        .fail (function (err) {
          console.log ('file delete problem: ' + JSON.stringify(err));
        })
      }
    })();
  </script>

  <div class="sample">
    <h2>Sample 4: Save to Amazon using signature version 4</h2>
    <form>
      <textarea id="edit-amazon" name="content"></textarea>
    </form>
  </div>

  <script>
    (function() {
      new FroalaEditor('#edit-amazon',{
          imageUploadToS3: JSON.parse('<?php echo $hash; ?>'),
          fileUploadToS3: JSON.parse('<?php echo $hash; ?>'),
          videoUploadToS3: JSON.parse('<?php echo $hash; ?>')
      });

    })();
  </script>
</body>

</html>
