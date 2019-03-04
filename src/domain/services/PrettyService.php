<?php

namespace yii2module\vendor\domain\services;

use yii\helpers\ArrayHelper;
use yii2rails\domain\data\EntityCollection;
use yii2rails\domain\data\Query;
use yii2rails\domain\services\base\BaseActiveService;
use yii2module\vendor\domain\entities\DomainEntity;
use yii2module\vendor\domain\entities\PackageEntity;
use yii2module\vendor\domain\helpers\FindHelper;
use yii2module\vendor\domain\helpers\PrettyHelper;
use yii2module\vendor\domain\repositories\file\PrettyRepository;

/**
 * Class PrettyService
 *
 * @package yii2module\vendor\domain\services
 *
 * @property-read PrettyRepository $repository
 * @property-read \yii2module\vendor\domain\Domain $domain
 */
class PrettyService extends BaseActiveService {

	public function updateById($id, $data) {
		PrettyHelper::refreshDomain($id);
	}
	
	public function oneById($id, Query $query = null) {
		return $this->repository->oneById($id, $query);
	}
	
	public function all(Query $query = null) {
        $aliases = $this->packageAliasArray();
        $aliases[] = 'domain';
		$domains = FindHelper::scanForDomain($aliases);
		$collection = new EntityCollection(DomainEntity::class);
		foreach($domains as $domain) {
			$domainEntity = new DomainEntity;
			$domainEntity->path = $domain;
			$collection[] = $domainEntity;
		}
		return $collection;
	}

	private function packageAliasArray() {
        $query = new Query;
        $query->with('config');
        /** @var PackageEntity[] $packageCollection */
        $packageCollection = \App::$domain->package->package->all($query);
        $autoloadMap = ArrayHelper::getColumn($packageCollection, 'config.autoload.psr-4');
        $autoloadArray = [];
        foreach ($autoloadMap as &$autoload) {
            $autoloadArray = ArrayHelper::merge($autoloadArray, $autoload);
        }
        $aliases = array_keys($autoloadArray);
        foreach ($aliases as &$alias) {
            $alias = trim($alias, '\\/');
            $alias = str_replace('\\', '/', $alias);
        }
        return $aliases;
    }

}
