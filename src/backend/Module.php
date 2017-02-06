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
     * [init description]
     * @return [type] [description]
     */
    public function init()
    {
        parent::init();
        if ($this->userIdentityClass === null) {
            $this->userIdentityClass = \Yii::$app->getUser()->identityClass;
        }
    }
}
