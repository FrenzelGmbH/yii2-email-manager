<?php

namespace net\frenzel\email\backend;

use yii\base\Module as BaseModule;

/**
 * @author Alexey Samoylov <alexey.samoylov@gmail.com>
 * @author Valentin Konusov <rlng-krsk@yandex.ru>
 *
 * Class Module
 * @package net\frenzel\email\backend
 */
class Module extends BaseModule
{
    /**
    * @var User the user class which is used within the application framework
    */
    public $userIdentityClass = NULL;
    
    /**
     * [init description]
     * @return [type] [description]
     */
    public function init()
    {
        parent::init();
        if ($this->userIdentityClass === null) {
            $this->userIdentityClass = \Yii::$app->getUser()->identityClass;
        }
        if (Yii::$app instanceof \yii\console\Application) {
            $this->controllerNamespace = 'net\frenzel\email\backend\controllers';
        }
    }
}
