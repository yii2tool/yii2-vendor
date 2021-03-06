<?php

namespace yii2tool\vendor\admin;

use yii\base\Module as YiiModule;
use yii2rails\domain\helpers\DomainHelper;

/**
 * welcome module definition class
 */
class Module extends YiiModule
{

	public static $langDir = '@yii2module/vendor/domain/messages';
	
	public function init() {
		DomainHelper::forgeDomains([
			'vendor' => 'yii2tool\vendor\domain\Domain',
		]);
		parent::init();
	}
	
}
