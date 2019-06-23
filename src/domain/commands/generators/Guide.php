<?php

namespace yii2tool\vendor\domain\commands\generators;

use yii2tool\vendor\domain\commands\Base;

class Guide extends Base {

	public function run() {
		$this->generateGuide($this->data);
	}
	
	protected function generateGuide($data) {
		$this->copyDir($data, 'guide');
	}
}
