<?php 

namespace App\Services\FrontPage;

use App\Repositories\FrontPage\Blogs\Eloquent\BlogRepository;
use Illuminate\Support\Facades\Hash;

class CreateBlogService
{	
	private $blogRepository;

	public function __construct(BlogRepository $blogRepository)
	{
		$this->blogRepository = $blogRepository;
	}

	public function getAllDatatables($query)
	{
		return $this->blogRepository->getDatatable($query);
	}

	public function getAllData()
	{
		return $this->blogRepository->getAll();
	}

	public function getWhereData($key, $param, $orderby, $sort)
	{
		return $this->blogRepository->getWhere($key, $param, $orderby, $sort);
	}

	public function getPaginateData($limit)
	{
		return $this->blogRepository->getPaginate($limit);
	}

	public function getBySlugData($slug)
	{
		return $this->blogRepository->getBySlug($slug);
	}

	public function getByIdData($id)
	{
		return $this->blogRepository->getById($id);
	}

	public function createData($payload)
	{
		
		$data = [
			'author_id' => $payload['author_id'],
			'category_id' => $payload['category_id'],
			'title' => $payload['title'],
			'slug' => $payload['slug'],
			'content' => $payload['content'],
			'thumbnail' => $payload['thumbnail'],
            'created_at' => now(),
		];

		$execute = $this->blogRepository->create($data);
		if ($execute == true) {			
			$tagsData = explode(',', $payload['tags']);
			foreach ($tagsData as $value) {
				$tagsPayload = [
					'blog_id' => $execute->id,
					'name' => $value,
					'created_at' => now()
				];
				$executeTags = \App\Models\FrontPage\ArticleTags::create($tagsPayload);
			}
			return true;
		} else {
			return false;
		}
	}

	public function updateData($id, $payload)
	{
		$blog = \App\Models\FrontPage\Blog::find($id);
		$data = [
			'author_id' => $payload['author_id'],
			'category_id' => $payload['category_id'],
			'title' => $payload['title'],
			'slug' => $payload['slug'],
			'content' => $payload['content'],
			'thumbnail' => ($payload['thumbnail'] == 'blog-image.jpg' ? $blog->thumbnail : $payload['thumbnail']),
            'updated_at' => now(),
		];

		$execute = $this->blogRepository->update($id, $data);
		if ($execute == true) {			
			$articleTags = \App\Models\FrontPage\ArticleTags::where('blog_id', $id);
			if ($articleTags->delete()) {
				$tagsData = explode(',', $payload['tags']);
				foreach ($tagsData as $value) {
					$tagsPayload = [
						'blog_id' => $blog->id,
						'name' => $value,
						'created_at' => now()
					];
					$executeTags = \App\Models\FrontPage\ArticleTags::create($tagsPayload);
				}
				return true;
			}
		} else {
			return false;
		}		
	}

	public function deleteData($id)
	{
		return $this->blogRepository->delete($id);
	}
}