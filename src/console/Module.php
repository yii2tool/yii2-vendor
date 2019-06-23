<?php

namespace yii2tool\vendor\console;

use yii\base\Module as YiiModule;
use yii2rails\domain\helpers\DomainHelper;

/**
 * offline module definition class
 */
class Module extends YiiModule
{
	
	public function init() {
		DomainHelper::forgeDomains([
			'vendor' => 'yii2tool\vendor\domain\Domain',
		]);
		parent::init();
	}
	
}
