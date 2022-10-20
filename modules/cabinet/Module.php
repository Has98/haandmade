<?php

namespace app\modules\cabinet;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\cabinet\controllers';

    /**
     * @inheritdoc
     */
     public $defaultRoute = 'admin\default\index';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
