<?php 

namespace App\Services\Projects\Project;

use App\Repositories\Projects\Project\Eloquent\ProjectRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CreateProjectService
{	
	private $projectRepository;

	public function __construct(ProjectRepository $projectRepository)
	{
		$this->projectRepository = $projectRepository;
	}

	public function getAllDatatables($query)
	{
		return $this->projectRepository->getDatatable($query);
	}

	public function getAllData()
	{
		return $this->projectRepository->getAll();
	}

	public function getWhereData($key, $param, $orderby, $sort)
	{
		return $this->projectRepository->getWhere($key, $param, $orderby, $sort);
	}

	public function getPaginateData($limit)
	{
		return $this->projectRepository->getPaginate($limit);
	}

	public function getByIdData($id)
	{
		return $this->projectRepository->getById($id);
	}

	public function createData($payload)
	{
		$payload = [
            'client_id' => $payload['client_id'],
			'leader_id' => $payload['leader'],
            'name' => $payload['name'],  
            'type' => $payload['type'],
            'platform' => $payload['platform'],
            'description' => $payload['description'],
            'start_date' => $payload['start_date'],
            'due_date' => $payload['due_date'],
            'client_by' => Auth::user()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];



		return $this->projectRepository->create($payload);
	}

	public function updateData($id, $payload)
	{

		$payload = [
			'client_id' => $payload['client_id'],
            'name' => $payload['name'],  
            'type' => $payload['type'],
            'platform' => $payload['platform'],
            'description' => $payload['description'],
            'start_date' => $payload['start_date'],
            'due_date' => $payload['due_date'],
            'client_by' => Auth::user()->id,
            'created_at' => now(),
            'updated_at' => now(),
		];
		
		return $this->projectRepository->update($id, $payload);
	}

	public function deleteData($id)
	{
		return $this->projectRepository->delete($id);
	}
}