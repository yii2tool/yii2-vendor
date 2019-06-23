<?php

namespace yii2tool\vendor\console\commands\domainUnitInput;

use yii2rails\extension\console\helpers\input\Question;
use yii2tool\vendor\console\commands\Base;

class QuestionIsActiveCommand extends Base {
	
	public function run() {
		$event = $this->getEvent();
		if($event->isActive === null && (in_array('service', $event->types) || in_array('repository', $event->types))) {
			$event->isActive = Question::confirm2('Is active?', false);
		}
	}
	
}
