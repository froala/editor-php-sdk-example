# Example for using Froala WYSIWYG Editor PHP SDK

Easing the [Froala WYSIWYG HTML Editor](https://github.com/froala/wysiwyg-editor) server side integration in PHP projects.

## Dependencies

PHP version >= 5.4.0 is required.

The following PHP extensions are required:

* fileinfo
* imagick

## Third party plugins

```html
<!-- Include third party plugins -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<script src="./vendor/froala/wysiwyg-editor/js/third_party/font_awesome.min.js"></script>
<script src="./vendor/froala/wysiwyg-editor/js/third_party/spell_checker.min.js"></script>
<script src="./vendor/froala/wysiwyg-editor/js/third_party/embedly.min.js"></script>
<script src="./vendor/froala/wysiwyg-editor/js/third_party/image_tui.min.js"></script>
<link rel="stylesheet" href="./vendor/froala/wysiwyg-editor/css/third_party/image_tui.min.css">
```

## Setup Instructions
1. Install composer within the example directory. You can find instructions on how to install composer on composer’s website (https://getcomposer.org/download/)
2. Add Froala WYSIWYG Editor PHP SDK in your compose.json file

        {
          "require" : {
            "froala/wysiwyg-editor-php-sdk" : ""
          }
        }
3. Run composer:

        php composer.phar install

 Or if you installed composer globally:

        composer install

## Documentation

 * [Official documentation](https://www.froala.com/wysiwyg-editor/docs/sdks/php)

## Help
- Found a bug or have some suggestions? Just submit an issue.
- Having trouble with your integration? [Contact Froala Support team](http://froala.dev/wysiwyg-editor/contact).

## License

The Froala WYSIWYG Editor PHP SDK is licensed under MIT license.  However, in order to use Froala WYSIWYG HTML Editor plugin you should purchase a license for it.

Froala Editor has [3 different licenses](http://froala.com/wysiwyg-editor/pricing) for commercial use.
For details please see [License Agreement](http://froala.com/wysiwyg-editor/terms).

