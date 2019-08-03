<?php

use yii\helpers\ArrayHelper;
use yii2rails\domain\enums\Driver;
use yii2lab\test\helpers\TestHelper;

$config = [
	'account' => 'yii2bundle\account\domain\v3\Domain',
];

$baseConfig = TestHelper::loadConfig('common/config/domains.php');
return ArrayHelper::merge($baseConfig, $config);
