<?php 

namespace App\Repositories\GeneralAffairs\Assets\Eloquent;

use App\Models\GeneralAffairs\Assets;
use Yajra\Datatables\Datatables;

class AssetsRepository 
{	
	protected $model;

	public function __construct(Assets $model)
	{
		$this->model = $model;
	}

	public function getDatatable($query)
    {
		return Datatables::of($query)
            ->addIndexColumn()

            ->addColumn('action', function($row) {
                $btn = "<a href=\"javascript:;\" onclick=\"modal_open('detail', '".route('assets.show', $row->id)."')\" class=\"btn btn-sm btn-primary\" data-bs-toggle=\"tooltip\" data-bs-trigger=\"hover\" data-bs-placement=\"top\" title=\"Detail\"><i class=\"fa fa-eye\"></i></a> <a href=\"".route('assets.edit', $row->id)."\"class=\"btn btn-sm btn-warning\" data-bs-toggle=\"tooltip\" data-bs-trigger=\"hover\" data-bs-placement=\"top\" title=\"Ubah\"><i class=\"fa fa-edit\"></i></a> <a href=\"javascript:;\" onclick=\"modal_open('delete', '".route('assets.delete', $row->id)."')\" class=\"btn btn-sm btn-danger\" data-bs-toggle=\"tooltip\" data-bs-trigger=\"hover\" data-bs-placement=\"top\" title=\"Hapus\"><i class=\"fa fa-trash\"></i></a>";
                return $btn;
			})->editColumn('price', function ($row) {
                return 'Rp '.number_format($row->price);
            })->rawColumns(['action'])->make(true);
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