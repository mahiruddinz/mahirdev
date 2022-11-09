<?php 

namespace App\Services\Marketings;

use App\Repositories\Marketings\Client\Eloquent\ClientRepository;
use Illuminate\Support\Facades\Hash;

class CreateClientService
{	
	private $clientRepository;

	public function __construct(ClientRepository $clientRepository)
	{
		$this->clientRepository = $clientRepository;
	}

	public function getAllDatatables($query)
	{
		return $this->clientRepository->getDatatable($query);
	}

	public function getAllData()
	{
		return $this->clientRepository->getAll();
	}

	public function getWhereData($key, $param, $orderby, $sort)
	{
		return $this->clientRepository->getWhere($key, $param, $orderby, $sort);
	}

	public function getPaginateData($limit)
	{
		return $this->clientRepository->getPaginate($limit);
	}

	public function getByIdData($id)
	{
		return $this->clientRepository->getById($id);
	}

	public function createData($payload)
	{
		$payload = [
			'name' => $payload['name'],
	        'email' => $payload['email'],
            'address' => $payload['address'],
			'number_phone' => $payload['number_phone'],
            'created_at' => now(),
		];

		return $this->clientRepository->create($payload);
	}

	public function updateData($id, $payload)
	{
		$payload = [
			'name' => $payload['name'],
	        'email' => $payload['email'],
            'address' => $payload['address'],
			'number_phone' => $payload['number_phone'],
            'updated_at' => now(),
		];
		
		return $this->clientRepository->update($id, $payload);
	}

	public function deleteData($id)
	{
		return $this->clientRepository->delete($id);
	}
}