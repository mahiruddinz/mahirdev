<?php 

namespace App\Repositories\Employees\Employee\Eloquent;

use App\Models\User;
use Yajra\Datatables\Datatables;

class EmployeeRepository 
{	
	protected $model;

	public function __construct(User $model)
	{
		$this->model = $model;
	}

	public function getDatatable()
    {
        $data = $this->model->select('*');
        return Datatables::of($data)->make(true);
    }

	public function getAll()
	{
		return $this->model->all();		
	}

	public function getPaginate($limit)
	{
		return $this->model->paginate($limit);
	}

	public function getById($id)
	{
		return $this->model->findOrFail($id);
	}

	public function create(array $payload)
	{
		return $this->model->create($payload);
	}

	public function update($id, array $payload)
	{
		return $this->model->findOrFail($id)->update($payload);
	}

	public function delete($id)
	{
		return $this->model->findOrFail($id)->delete();
	}
}