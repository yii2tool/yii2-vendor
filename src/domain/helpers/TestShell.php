<?php

namespace yii2tool\vendor\domain\helpers;

use yii2rails\extension\shell\base\BaseShell;
use yii2rails\extension\shell\exceptions\ShellException;

class TestShell extends BaseShell {
	
	public function codeceptionRun() {
		try {
			$defaultCommand = 'php ' . VENDOR_DIR . DS . 'codeception' . DS . 'base' . DS . 'codecept run';
			$command = param('codeception.command', $defaultCommand);
		    $result = $this->extractFromCommand($command, 'trim');
			$result = implode(PHP_EOL, $result);
		} catch(ShellException $e) {
			$result = 'error';
		}
		$result = trim($result);
		return $result;
	}
	
}
