<?php 

namespace App\Services\GeneralAffairs;

use App\Repositories\GeneralAffairs\Assets\Eloquent\AssetsRepository;
use Illuminate\Support\Facades\Hash;

class CreateAssetService
{	
	private $assetsRepository;

	public function __construct(AssetsRepository $assetsRepository)
	{
		$this->assetsRepository = $assetsRepository;
	}

	public function getAllDatatables($query)
	{
		return $this->assetsRepository->getDatatable($query);
	}

	public function getAllData()
	{
		return $this->assetsRepository->getAll();
	}

	public function getWhereData($key, $param, $orderby, $sort)
	{
		return $this->assetsRepository->getWhere($key, $param, $orderby, $sort);
	}

	public function getPaginateData($limit)
	{
		return $this->assetsRepository->getPaginate($limit);
	}

	public function getByIdData($id)
	{
		return $this->assetsRepository->getById($id);
	}

	public function createData($payload)
	{
		$buy_date = $payload['buy_date'];
		$ConvertBuyDate = str_replace('/"', '-', $buy_date);  
   		$NewBuyDate = date("Y-m-d H:i:s", strtotime($ConvertBuyDate));  

		$payload = [
			'name' => $payload['name'],
	        'location' => $payload['location'],
            'amount' => $payload['amount'],
			'price' => $payload['price'],
			'buy_date' => $NewBuyDate,
            'created_at' => now(),
		];

		return $this->assetsRepository->create($payload);
	}

	public function updateData($id, $payload)
	{
		$buy_date = $payload['buy_date'];
		$ConvertBuyDate = str_replace('/"', '-', $buy_date);  
   		$NewBuyDate = date("Y-m-d H:i:s", strtotime($ConvertBuyDate));  

		$payload = [
			'name' => $payload['name'],
	        'location' => $payload['location'],
            'amount' => $payload['amount'],
			'price' => $payload['price'],
			'buy_date' => $NewBuyDate,
            'updated_at' => now(),
		];
		
		return $this->assetsRepository->update($id, $payload);
	}

	public function deleteData($id)
	{
		return $this->assetsRepository->delete($id);
	}
}