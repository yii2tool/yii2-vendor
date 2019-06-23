<?php

namespace yii2tool\vendor\domain\commands\generators;

use yii2tool\vendor\domain\commands\Base;

class License extends Base {

	public function run() {
		$this->generateLicense($this->data);
	}
	
	protected function generateLicense($data) {
		$this->copyFile($data, 'LICENSE');
	}
}
