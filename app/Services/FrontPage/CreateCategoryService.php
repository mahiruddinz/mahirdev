<?php 

namespace App\Services\FrontPage;

use App\Repositories\FrontPage\Categories\Eloquent\CategoriesRepository;
use Illuminate\Support\Facades\Hash;

class CreateCategoryService
{	
	private $categoriesRepository;

	public function __construct(CategoriesRepository $categoriesRepository)
	{
		$this->categoriesRepository = $categoriesRepository;
	}

	public function getAllDatatables($query)
	{
		return $this->categoriesRepository->getDatatable($query);
	}

	public function getAllData()
	{
		return $this->categoriesRepository->getAll();
	}

	public function getWhereData($key, $param, $orderby, $sort)
	{
		return $this->categoriesRepository->getWhere($key, $param, $orderby, $sort);
	}

	public function getPaginateData($limit)
	{
		return $this->categoriesRepository->getPaginate($limit);
	}

	public function getByIdData($id)
	{
		return $this->categoriesRepository->getById($id);
	}

	public function createData($payload)
	{
		$payload = [
			'name' => $payload['name'],
            'created_at' => now(),
		];

		return $this->categoriesRepository->create($payload);
	}

	public function updateData($id, $payload)
	{
		$payload = [
			'name' => $payload['name'],
            'updated_at' => now(),
		];
		
		return $this->categoriesRepository->update($id, $payload);
	}

	public function deleteData($id)
	{
		return $this->categoriesRepository->delete($id);
	}
}