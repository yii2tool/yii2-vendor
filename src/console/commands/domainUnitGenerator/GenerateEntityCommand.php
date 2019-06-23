<?php

namespace yii2tool\vendor\console\commands\domainUnitGenerator;

use yii\helpers\ArrayHelper;
use yii2tool\vendor\console\commands\Base;

class GenerateEntityCommand extends Base {
	
	public function run() {
		$event = $this->getEvent();
		if(!$this->isHasType('entity')) {
			return;
		}
		if(empty($event->attributes)) {
			return;
		}
		\App::$domain->vendor->generator->generateEntity(ArrayHelper::toArray($event));
	}
	
}
