<?php 

namespace App\Repositories\Projects\TaskProject\Eloquent;

use App\Models\Projects\TaskProject;
use Yajra\Datatables\Datatables;

class TaskProjectRepository 
{	
	protected $model;

	public function __construct(TaskProject $model)
	{
		$this->model = $model;
	}

	public function getDatatable($query)
    {
		return Datatables::of($query)
            ->addIndexColumn()

            ->addColumn('action', function($row) {
                $btn = "<a href=\"javascript:;\" onclick=\"modal_open('detail', '".route('task-project.show', $row->id)."')\" class=\"btn btn-sm btn-primary\" data-bs-toggle=\"tooltip\" data-bs-trigger=\"hover\" data-bs-placement=\"top\" title=\"Detail\"><i class=\"ri-eye-fill\"></i></a> <a href=\"".route('task-project.edit', $row->id)."\"class=\"btn btn-sm btn-warning\" data-bs-toggle=\"tooltip\" data-bs-trigger=\"hover\" data-bs-placement=\"top\" title=\"Ubah\"><i class=\"fa fa-pencil\"></i></a> <a href=\"javascript:;\" onclick=\"modal_open('delete', '".route('task-project.delete', $row->id)."')\" class=\"btn btn-sm btn-danger\" data-bs-toggle=\"tooltip\" data-bs-trigger=\"hover\" data-bs-placement=\"top\" title=\"Hapus\"><i class=\"fa fa-trash\"></i></a>";
                return $btn;
			})->editColumn('status', function ($row) {
                return status_info($row->status);
			})->editColumn('project_name', function ($row) {
                return "<a href=\"".url('user/project/'.$row->project->id.'')."\">".$row->project->name."<a>";
            })->editColumn('created_at', function ($row) {
                return format_datetime($row->created_at);
            })->rawColumns(['action', 'status', 'project_name'])->make(true);
    }

	public function getAll()
	{
		return $this->model->orderByDesc('id')->get();		
	}

	public function getWhere($key, $param, $orderby, $sort) {
		return $this->model->where($key, $param)->orderBy($orderby, $sort)->get();
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