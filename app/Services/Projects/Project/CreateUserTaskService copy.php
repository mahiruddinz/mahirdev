<?php 

namespace App\Services\Projects\Project;

use App\Repositories\Projects\UserTask\Eloquent\UserTaskRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CreateUserTaskService
{	
	private $userTaskRepository;

	public function __construct(UserTaskRepository $userTaskRepository)
	{
		$this->userTaskRepository = $userTaskRepository;
	}

	public function getAllDatatables($query)
	{
		return $this->userTaskRepository->getDatatable($query);
	}

	public function getAllData()
	{
		return $this->userTaskRepository->getAll();
	}

	public function getWhereData($key, $param, $orderby, $sort)
	{
		return $this->userTaskRepository->getWhere($key, $param, $orderby, $sort);
	}

	public function getPaginateData($limit)
	{
		return $this->userTaskRepository->getPaginate($limit);
	}

	public function getByIdData($id)
	{
		return $this->userTaskRepository->getById($id);
	}

	public function createData($payload)
	{
		foreach ($payload['user_id'] as $value) {
			dd($value);
		}
		$payload = [
            'project_id' => $payload['project_id'],
            'name' => $payload['name'],  
            'target' => $payload['target'],
            'amount' => $payload['amount'],
            'platform' => $payload['platform'],
            'description' => $payload['description'],
            'start_date' => convert_date($payload['start_date']),
            'due_date' => convert_date($payload['due_date']),
			'status' => 'Pending',
			'completed_time' => NULL,
			'is_approved' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ];
		return $this->userTaskRepository->create($payload);
	}

	public function updateData($id, $payload)
	{
		$start_date = $payload['start_date'];
		$ConvertStartDate = str_replace('/"', '-', $start_date);  
   		$NewStartDate = date("Y-m-d H:i:s", strtotime($ConvertStartDate));  

		$due_date = $payload['due_date'];
		$ConvertDueDate = str_replace('/"', '-', $due_date);  
		$NewDueDate = date("Y-m-d H:i:s", strtotime($ConvertDueDate));  

		$payload = [
			'client_id' => $payload['client_id'],
            'name' => $payload['name'],  
            'type' => $payload['type'],
            'platform' => $payload['platform'],
            'description' => $payload['description'],
            'start_date' => $NewStartDate,
            'due_date' => $NewDueDate,
            'client_by' => Auth::user()->id,
            'created_at' => now(),
            'updated_at' => now(),
		];
		
		return $this->userTaskRepository->update($id, $payload);
	}

	public function deleteData($id)
	{
		return $this->userTaskRepository->delete($id);
	}
}