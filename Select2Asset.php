<?php
/**
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 */

namespace panix\ext\select2;

use yii\web\AssetBundle;
use yii\helpers\ArrayHelper;
use yii\web\View;

/**
 * Class Select2Asset
 * @package panix\ext\select2
 */
class Select2Asset extends AssetBundle
{

    public $jsOptions = [
        'position' => View::POS_END
    ];

    public $sourcePath = '@vendor/select2/select2/dist';

    public $css = [
        'css/select2.min.css'
    ];

    public $js = [
        'js/select2.min.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        //'yii\bootstrap4\BootstrapAsset',
      //  'yii\bootstrap4\BootstrapPluginAsset',
    ];

    public function init()
    {

        parent::init();
    }
}
