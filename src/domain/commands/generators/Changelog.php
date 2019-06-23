<?php

namespace yii2tool\vendor\domain\commands\generators;

use yii2tool\vendor\domain\commands\Base;

class Changelog extends Base {

	public function run() {
		$this->generate($this->data);
	}
	
	protected function generate($data) {
		$this->copyFile($data, 'CHANGELOG.md');
	}
}
