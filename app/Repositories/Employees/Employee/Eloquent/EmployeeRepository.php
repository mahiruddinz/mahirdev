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

	public function getDatatable($query)
    {
		return Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $btn = "<a href=\"javascript:;\" onclick=\"modal_open('detail', '".url('employees/user/'.$row->id.'')."')\" class=\"btn btn-sm btn-primary\" data-bs-toggle=\"tooltip\" data-bs-trigger=\"hover\" data-bs-placement=\"top\" title=\"Detail\"><i class=\"ri-eye-fill\"></i></a> <a href=\"javascript:;\" onclick=\"modal_open('edit', '".url('employees/user/'.$row->id.'/edit')."')\" class=\"btn btn-sm btn-warning\" data-bs-toggle=\"tooltip\" data-bs-trigger=\"hover\" data-bs-placement=\"top\" title=\"Ubah\"><i class=\"fa fa-pencil\"></i></a> <a href=\"javascript:;\" onclick=\"modal_open('delete', '".url('employees/user/'.$row->id.'/delete')."')\" class=\"btn btn-sm btn-danger\" data-bs-toggle=\"tooltip\" data-bs-trigger=\"hover\" data-bs-placement=\"top\" title=\"Hapus\"><i class=\"fa fa-trash\"></i></a>";
                return $btn;
            })->editColumn('join_date', function ($row) {
                return $row->created_at->toDayDateTimeString();
            })
			->editColumn('salary', function ($row) {
                return 'Rp '.number_format($row->salary);
            })->rawColumns(['action'])->make(true);
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