<?php 

namespace App\Services\Projects\Project;

use App\Repositories\Projects\TaskProject\Eloquent\TaskProjectRepository;
use App\Repositories\Projects\UserTask\Eloquent\UserTaskRepository;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CreateTaskProjectService
{	
	private $taskProjectRepository;

	public function __construct(TaskProjectRepository $taskProjectRepository, UserTaskRepository $userTaskRepository)
	{
		$this->taskProjectRepository = $taskProjectRepository;
		$this->userTaskRepository = $userTaskRepository;
	}

	public function getAllDatatables($query)
	{
		return $this->taskProjectRepository->getDatatable($query);
	}

	public function getAllData()
	{
		return $this->taskProjectRepository->getAll();
	}

	public function getWhereData($key, $param, $orderby, $sort)
	{
		return $this->taskProjectRepository->getWhere($key, $param, $orderby, $sort);
	}

	public function getPaginateData($limit)
	{
		return $this->taskProjectRepository->getPaginate($limit);
	}

	public function getByIdData($id)
	{
		return $this->taskProjectRepository->getById($id);
	}

	public function createData($payload)
	{
		$data_task = [
			'project_id' => $payload['project_id'],
            'name' => $payload['name'],  
            'target' => $payload['target'],
            'amount' => $payload['amount'],
            'platform' => $payload['platform'],
            'description' => $payload['description'],
            'start_time' => $payload['start_time'],
            'due_time' => $payload['due_time'],
			'status' => 'Pending',
			'is_approved' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ];
		$execute = $this->taskProjectRepository->create($data_task);
		if ($execute == TRUE) {
			foreach ($payload['user_id'] as $value) {
				$data = [
					'task_id' => $execute->id,
					'user_id' => $value
				];
				$this->userTaskRepository->create($data);
			}
			return true;
		} else {
			return 403;
		}

	}

	public function updateData($id, $payload)
	{
		$payload = [
			'client_id' => $payload['client_id'],
            'name' => $payload['name'],  
            'type' => $payload['type'],
            'platform' => $payload['platform'],
            'description' => $payload['description'],
            'start_time' => $payload['start_time'],
            'due_time' => $payload['due_time'],
            'client_by' => Auth::user()->id,
            'created_at' => now(),
            'updated_at' => now(),
		];
		
		return $this->taskProjectRepository->update($id, $payload);
	}

	public function deleteData($id)
	{
		return $this->taskProjectRepository->delete($id);
	}
}