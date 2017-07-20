<?php
/**
 * Created by PhpStorm.
 * User: decadal
 * Date: 11.01.17
 * Time: 17:03
 */
namespace common\traits;
use yii;

trait SimpleYiiTrait
{
    /**
     * @return bool|int|string
     */
    public function getUserId() {
        if (Yii::$app->user->isGuest) {
            return false;
        }
        return Yii::$app->user->identity->getId();
    }

    /** get parameters from yii application
     * @param null|string $param
     * @return mixed
     */
    public function getParams($param = null)
    {
        if(is_null($param))
        {
            return Yii::$app->params;
        }
        return (isset(Yii::$app->params[$param]))
            ? Yii::$app->params[$param]
            : null;
    }
}