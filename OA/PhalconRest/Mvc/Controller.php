<?php

namespace OA\PhalconRest\Mvc;

use League\Fractal\Resource\Collection,
	League\Fractal\Resource\Item;

class Controller extends \Phalcon\Mvc\Controller
{

	public function respondWithArray($array, $key)
	{

		return [$key=>$array];
	}

	public function respondWithOK()
	{

		return ['result'=>'OK'];
	}

	public function createItemWithOK($item, $callback, $resource_key)
	{

		$response = $this->createItem($item, $callback, $resource_key);
		$response['result'] = 'OK';

		return $response;
	}

	public function createItem($item, $callback, $resource_key, $meta = [])
	{

		$resource = new Item($item, $callback, $resource_key);
		$data = $this->fractal->createData($resource)->toArray();
		return array_merge($data, $meta);
	}

	public function createCollection($collection, $callback, $resource_key, $meta = [])
	{

		$resource = new Collection($collection, $callback, $resource_key);
		$data = $this->fractal->createData($resource)->toArray();
		return array_merge($data, $meta);
	}
}
