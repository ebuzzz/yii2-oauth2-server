<?php

namespace filsh\yii2\oauth2server\filters\auth;

use filsh\yii2\oauth2server\Module;
use \Yii;

class CompositeAuth extends \yii\filters\auth\CompositeAuth
{

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        $module = $this->getModuleNested('oauth2', Yii::$app);
        $oauthServer = $module->getServer();
        $oauthRequest = $module->getRequest();
        $oauthServer->verifyResourceRequest($oauthRequest);
        
        return parent::beforeAction($action);
    }

    /**
     * @param $needle
     * @param $app
     * @return bool|Module
     */
    public function getModuleNested($needle, $app)
    {
        /** @var $module Module */
        if (($module = $app->getModule($needle)) !== null)
            return $module;

        foreach ($app->getModules() as $id => $module) {
            $server = $app->getModule($id)->getModule($needle);
            if ($server != null) {
                return $server;
            } else {
                $this->getModuleNested($module->getModules());
            }
        }

        return false;
    }

}
