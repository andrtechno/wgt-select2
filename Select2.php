<?php

/**
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 */

namespace panix\ext\select2;

use yii\helpers\Json;
use yii\widgets\InputWidget;
use yii\helpers\Html;
use panix\ext\bootstrapselect\BootstrapSelectAsset;

/**
 * Class Select2
 * @package panix\ext\select2
 */
class Select2 extends InputWidget
{

    public $items = [];

    /**
     * See: https://developer.snapappointments.com/bootstrap-select/options/#bootstrap-version
     * @var array
     */
    public $jsOptions = [
        'liveSearch' => false,
        'tickIcon' => 'icon-check'
    ];

    public $zIndex = 1060;

    /**
     * @inheritdoc
     */
    public function run()
    {
        if ($this->hasModel()) {
            echo Html::activeDropDownList($this->model, $this->attribute, $this->items, $this->options);
        } else {
            echo Html::dropDownList($this->name, $this->value, $this->items, $this->options);
        }
        $this->registerClientScript();
    }

    protected function registerClientScript()
    {
        $view = $this->getView();
        $assets = BootstrapSelectAsset::register($view);
        $view->registerCss(".bootstrap-select .dropdown-menu{z-index:{$this->zIndex};}");
        $jsOptions = Json::encode($this->jsOptions);
       // $js[] = "$('#{$this->options['id']}').selectpicker({$jsOptions});";
        $view->registerJs("$('#{$this->options['id']}').selectpicker({$jsOptions});");
    }

}
