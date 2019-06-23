<?php

namespace yii2tool\vendor\console\commands\domainUnitInput;

use yii2rails\extension\console\helpers\input\Enter;
use yii2tool\vendor\console\commands\Base;

class InputEntityAttributesCommand extends Base {
	
	public function run() {
		$event = $this->getEvent();
		if(!$this->isHasType('entity')) {
			return;
		}
		if(!empty($event->attributes)) {
			return;
		}
		$attributes = Enter::display('Enter entity attributes');
		$event->attributes = explode(',', $attributes);
	}
	
}
