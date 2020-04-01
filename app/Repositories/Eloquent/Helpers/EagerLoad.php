<?php

namespace App\Repositories\Eloquent\Helpers;

use App\Repositories\Contracts\HelpersInterfaces\SingleHelperInterface;


class EagerLoad implements SingleHelperInterface
{
	protected $relations;

	public function __construct(array $relations)
	{
		$this->relations = $relations;
	}

	public function apply($entity)
	{
		return $entity->with($this->relations);
	}
}