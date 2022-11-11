<?php 

namespace App\Repositories\FrontPage\Blogs\Eloquent;

use App\Models\FrontPage\Blog;
use Yajra\Datatables\Datatables;

class BlogRepository 
{	
	protected $model;

	public function __construct(Blog $model)
	{
		$this->model = $model;
	}

	public function getDatatable($query)
    {
		return Datatables::of($query)
            ->addIndexColumn()

            ->addColumn('action', function($row) {
                $btn = "<a href=\"javascript:;\" onclick=\"modal_open('detail', '".route('blogs.show', $row->id)."')\" class=\"btn btn-sm btn-primary\" data-bs-toggle=\"tooltip\" data-bs-trigger=\"hover\" data-bs-placement=\"top\" title=\"Detail\"><i class=\"ri-eye-fill\"></i></a> <a href=\"".route('blogs.edit', $row->id)."\"class=\"btn btn-sm btn-warning\" data-bs-toggle=\"tooltip\" data-bs-trigger=\"hover\" data-bs-placement=\"top\" title=\"Ubah\"><i class=\"fa fa-pencil\"></i></a>";
                return $btn;
			})->editColumn('thumbnail', function ($row) {
                return "<div class=\"d-flex align-items-center\">
							<div class=\"flex-shrink-0\">
								<img src=\"".url('blog-img/'.$row->thumbnail.'')."\" alt=\"\" class=\"avatar-md image_src object-cover\">
							</div>
							<div class=\"flex-grow-1 ms-2\">
							</div>
						</div>";
			})->editColumn('category', function ($row) {
                return $row->categories->name;
			})->editColumn('title', function ($row) {
                return (strlen($row->title) > 75) ? ''.substr(nl2br($row->title),0, 75).'...'  : nl2br($row->title);
            })->editColumn('created_at', function ($row) {
                return format_datetime($row->created_at);
            })->rawColumns(['action', 'thumbnail'])->make(true);
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

	public function getBySlug($table, $slug)
	{
		return $this->model->findOrFail('slug', $slug);
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