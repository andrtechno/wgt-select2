<?php

/**
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 */

namespace panix\ext\select2;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\JsExpression;
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
     * See: https://select2.org/configuration/options-api
     * @var array
     */
    public $clientOptions = [

    ];
    public $theme = 'bootstrap4';
    public $language = 'ru';
    public $hideSearch = false;

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
        $assets = Select2Asset::register($view);

        if ($this->theme == 'bootstrap4') {
            ThemeBootstrap4Asset::register($view);
            $this->clientOptions['theme'] = $this->theme;
        } elseif ($this->theme == 'bootstrap5') {

        }

        if (file_exists($assets->basePath . "/js/i18n/{$this->language}.js")) {
            $view->registerJsFile($assets->baseUrl . "/js/i18n/{$this->language}.js", ['depends' => Select2Asset::class]);
        } else {
            throw new \yii\base\InvalidArgumentException("file not exist js/i18n/{$this->language}.js");
        }


        if ($this->hideSearch) {
            $this->clientOptions['minimumResultsForSearch'] = new JsExpression('Infinity');
        }
        $this->placeholder();
        $clientOptions = Json::encode($this->clientOptions);

        $view->registerJs("$('#{$this->options['id']}').select2({$clientOptions});");
    }


    /**
     * Initializes the placeholder for Select2
     * @throws Exception
     */
    protected function placeholder()
    {
        $isMultiple = ArrayHelper::getValue($this->options, 'multiple', false);
        if (isset($this->options['prompt']) && !isset($this->clientOptions['placeholder'])) {
            $this->clientOptions['placeholder'] = $this->options['prompt'];
            if ($isMultiple) {
                unset($this->options['prompt']);
            }
            return;
        }
        if (isset($this->options['placeholder'])) {
            $this->clientOptions['placeholder'] = $this->options['placeholder'];
            unset($this->options['placeholder']);
        }
        if (isset($this->clientOptions['placeholder']) && is_string($this->clientOptions['placeholder']) && !$isMultiple) {
            $this->options['prompt'] = $this->clientOptions['placeholder'];
        }
    }

}
