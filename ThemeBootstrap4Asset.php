<?php
/**
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 */

namespace panix\ext\select2;

use panix\engine\web\AssetBundle;
use yii\helpers\ArrayHelper;

/**
 * Class ThemeBootstrap4Asset
 * @package panix\ext\select2
 */
class ThemeBootstrap4Asset extends AssetBundle
{
    public $sourcePath = '@vendor/ttskch/select2-bootstrap4-theme/dist';

    public $css = [
        'select2-bootstrap4.min.css'
    ];


    public $depends = [
        'panix\ext\select2\Select2Asset',
    ];

}
