<?php 

namespace App\Services\Projects\Project;

use App\Repositories\Projects\Project\Eloquent\ProjectRepository;
use Illuminate\Support\Facades\Hash;

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
            'nik' => $payload->nik,
			'name' => $payload->name,
	        'email' => $payload->email,
			'birthdate' => $payload->birthdate,
	        'password' => Hash::make('password'),
	        'role' => $payload->role,
            'join_date' => $payload->join_date,
            'salary' => $payload->salary,
            'address' => $payload->address,
            'npwp' => $payload->npwp,
            'created_at' => now(),
		];

		return $this->projectRepository->create($payload);
	}

	public function updateData($id, $payload)
	{
		//dd($payload['join_date']);
		$project = $this->projectRepository->getById($id);
		//dd($project['birthdate']);
		$payload = [
			'nik' => $payload['nik'],
			'name' => $payload['name'],
	        'email' => $payload['email'],
			'join_date' => $payload['join_date'] == null ? $project['join_date'] : $payload['join_date'],
			'birthdate' => $payload['birthdate'] == null ? $project['birthdate'] : $payload['birthdate'],	
	        'role' => $payload['role'],
            'salary' => $payload['salary'],
            'address' => $payload['address'],
            'npwp' => $payload['npwp'],
            'updated_at' => now(),
		];
		
		return $this->projectRepository->update($id, $payload);
	}

	public function deleteData($id)
	{
		return $this->projectRepository->delete($id);
	}
}