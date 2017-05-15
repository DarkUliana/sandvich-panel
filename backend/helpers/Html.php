<?php

namespace backend\helpers;

use Yii;

/**
 * Class Html - extend \yii\helpers\Html
 * @package backend\helpers
 */
class Html extends \yii\helpers\Html
{
    /**
     * Return button with link to current page without $_GET array
     * @param array $options additional options
     * @return null|string
     */
    public static function clearSearchLink($options = [])
    {
        $queryParams = Yii::$app->request->queryParams;

        if (!empty($options['except']) && is_array($options['except'])) {
            foreach ($options['except'] as $key) {
                if (isset($queryParams[ $key ])) {
                    unset($queryParams[ $key ]);
                }
            }
        }

        if (empty($queryParams)) {
            return null;
        }

        return parent::a('<i class="glyphicon glyphicon-search"></i> ' . Yii::t('backend', "Clear search"), ['/' . Yii::$app->request->getPathInfo()], [
            'class' => 'dotted-link dotted-danger',
        ]);
    }
}