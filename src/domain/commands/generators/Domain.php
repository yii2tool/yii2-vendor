<?php

namespace yii2tool\vendor\domain\commands\generators;

use yii2rails\extension\code\helpers\generator\ClassGeneratorHelper;
use yii2tool\vendor\domain\commands\Base;

class Domain extends Base {

	public function run() {
		$this->generateDomain($this->data);
		$this->copyDir($this->data, 'src/domain');
	}
	
	protected function generateDomain($data) {
		$config = [
			'className' => $this->getBaseAlias($data) . '/domain/Domain',
			'afterClassName' => 'extends \yii2rails\domain\Domain',
			'code' => $this->getCode(),
		];
		ClassGeneratorHelper::generate($config);
	}
	
	protected function getCode() {
		return <<<EOT
	public function config() {
		return [
			'repositories' => [
			
			],
			'services' => [
			
			],
		];
	}
EOT;
	}
	
}
