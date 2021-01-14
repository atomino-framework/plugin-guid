<?php namespace Atomino\Molecules\EntityPlugin\Guid;

use Atomino\Entity\Attributes\EventHandler;
use Atomino\Entity\Entity;

trait GuidTrait{
	#[EventHandler( Entity::EVENT_BEFORE_INSERT )]
	protected function GuidPlugin_BeforeInsert($event, $data){
		/** @var \Atomino\Entity\Model $model */
		$model = static::model();
		$this->{Guid::fetch($model)->field} = $model->getConnection()->getSmart()->getValue("SELECT uuid()");
	}
}