<?php

namespace yii2tool\vendor\console\commands\domainUnitGenerator;

use yii\helpers\ArrayHelper;
use yii2tool\vendor\console\commands\Base;

class GenerateServiceCommand extends Base {
	
	public function run() {
		$event = $this->getEvent();
		if(!$this->isHasType('service')) {
			return;
		}
		\App::$domain->vendor->generator->generateService(ArrayHelper::toArray($event));
	}
	
}
