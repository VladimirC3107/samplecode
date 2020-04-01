<?php

namespace App\Repositories;


use App\Exceptions\NoEntityDefined;
use App\Repositories\Contracts\AbstractInterfaces\RepositoryAbstractInterface;
use App\Repositories\Contracts\HelpersInterfaces\AllHelpersInterface;

abstract class RepositoryAbstract implements RepositoryAbstractInterface, AllHelpersInterface
{
	protected $entity;

	public function __construct()
	{
		$this->entity = $this->resolveEntity();
	}

	public function all()
	{
		return $this->entity->get();
	}

	public function find($id)
	{
		return $this->entity->findOrFail($id);	
	}

	public function findWhere($column, $value)
	{
		return $this->entity->where($column, $value)->get();
	}

	public function findWhereFirst($column, $value)
	{
		return $this->entity->where($column, $value)->firstOrFail();
	}

	public function paginate($perPage = 10)
	{
		return $this->entity->paginate($perPage);
	}

	public function create(array $properties)
	{
		return $this->entity->create($properties);
	}

	public function firstOrCreate(array $properties)
	{
		return $this->entity->firstOrCreate($properties);
	}

	public function update($id, array $properties)
	{
		return $this->find($id)->update($properties);
	}

	public function delete($id)
	{
		return $this->find($id)->delete();
	}

	public function withHelpers(array $helpers)
	{
		foreach ($helpers as $helper) {
			$this->entity = $helper->apply($this->entity);
		}
		return $this;
	}

	public function resolveEntity()
	{
		if (!method_exists($this, 'entity')) {
			throw new NoEntityDefined();
		}
		return app()->make($this->entity());
	}
}