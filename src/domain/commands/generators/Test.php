<?php

namespace yii2tool\vendor\domain\commands\generators;

use yii2tool\vendor\domain\commands\Base;

class Test extends Base {

	public function run() {
		$this->generateTest($this->data);
	}
	
	protected function generateTest($data) {
		$this->copyDir($data, 'tests');
		$this->copyFile($data, 'codeception.yml');
	}
}
