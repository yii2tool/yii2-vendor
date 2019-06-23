<?php

namespace yii2tool\vendor\domain\filters\generator;

use yii\helpers\Inflector;
use yii2rails\extension\code\entities\ClassEntity;
use yii2rails\extension\code\entities\DocBlockEntity;
use yii2rails\extension\code\entities\DocBlockParameterEntity;
use yii2rails\extension\code\entities\InterfaceEntity;
use yii2rails\extension\code\helpers\ClassHelper;

/**
 * Class ServiceGenerator
 *
 * @package yii2tool\vendor\domain\filters\generator
 *
 * @property boolean $isActive
 */
class ServiceGenerator extends BaseGenerator {

	public $isActive = false;
	
	public function run() {
		$this->generateServiceInterface();
		$this->generateService();
	}
	
	private function generateService() {
		$ServiceInterfaceClassName = $this->ServiceInterfaceClassName();
		$classEntity = new ClassEntity();
		$classEntity->name = $this->namespace . '\\services\\' . Inflector::camelize($this->name) . 'Service';
		$classEntity->implements = basename($ServiceInterfaceClassName);
		$uses = [
			['name' => $ServiceInterfaceClassName],
		];
		if($this->isActive) {
			$uses[] = ['name' => 'yii2rails\domain\services\base\BaseActiveService'];
			$classEntity->extends = 'BaseActiveService';
			
		} else {
			$uses[] = ['name' => 'yii2rails\domain\services\base\BaseService'];
			$classEntity->extends = 'BaseService';
		}
		$classEntity->doc_block = new DocBlockEntity([
			'title' => 'Class' . SPC . $classEntity->name,
			'parameters' => $this->docComment(),
		]);
		
		ClassHelper::generate($classEntity, $uses);
	}
	
	private function generateServiceInterface() {
		$uses = [];
		$classEntity = new InterfaceEntity();
		$classEntity->name = $this->ServiceInterfaceClassName();
		if($this->isActive) {
			$classEntity->extends = 'CrudInterface';
			$uses = [
				['name' => 'yii2rails\domain\interfaces\services\CrudInterface'],
			];
		}
		$classEntity->doc_block = new DocBlockEntity([
			'title' => 'Interface' . SPC . $classEntity->name,
			'parameters' => $this->docComment(),
			
		]);
		ClassHelper::generate($classEntity, $uses);
	}
	
	private function ServiceInterfaceClassName() {
		return $this->namespace . '\\interfaces\\services\\' . Inflector::camelize($this->name) . 'Interface';
	}
	
	private function repositoryInterfaceClassName() {
		return $this->namespace . '\\interfaces\\repositories\\' . Inflector::camelize($this->name) . 'Interface';
	}
	
	private function docComment() {
		$ServiceDocBlock = [
			[
				'name' => DocBlockParameterEntity::NAME_PROPERTY_READ,
				'type' => '\\' . $this->namespace . '\\Domain',
				'value' => 'domain',
			],
			[
				'name' => DocBlockParameterEntity::NAME_PROPERTY_READ,
				'type' => '\\' . $this->repositoryInterfaceClassName(),
				'value' => 'repository',
			],
		];
		return $ServiceDocBlock;
	}
	
}
