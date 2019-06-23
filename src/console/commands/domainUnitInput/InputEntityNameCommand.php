<?php

namespace yii2tool\vendor\console\commands\domainUnitInput;

use yii2rails\extension\console\helpers\input\Enter;
use yii2tool\vendor\console\commands\Base;

class InputEntityNameCommand extends Base {
	
	public function run() {
		$event = $this->getEvent();
		if(!empty($event->name)) {
			return;
		}
		$event->name = Enter::display('Enter name');
	}
	
}
