<?php

namespace App\Http\Controllers\FrontPage;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

// LOAD REQUEST & SERVICES //
use App\Services\FrontPage\CreateBlogService;
use App\Services\FrontPage\CreateCategoryService;

use App\Http\Requests\FrontPage\CreateBlogRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;

// LOAD MODEL & DATATABLES 
use App\Models\FrontPage\Blogs;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class BlogController extends Controller
{
    
    /**
     * blogService  Implementation.
     * 
     * @var CreateBlogService
     */
    private $blogService;

     /**
     * Constructor of the controller.
     * 
     * @param \App\Services\FrontPage\CreateBlogService $blogService
     * @return void
     */
    public function __construct(CreateBlogService $blogService, CreateCategoryService $categoryService)
    {
        $this->blogService = $blogService;
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->blogService->getAllData();
        return view('frontpage.blogs.index', ['data' => $data]);
    }

    public function getList(Request $request)
    {
        if ($request->ajax()) {
            return $this->blogService->getAllDatatables($this->blogService->getAllData());
        }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontpage.blogs.create', ['categories' => $this->categoryService->getAllData()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBlogRequest $request)
    {
        $request = $request->validated();
        $slug = SlugService::createSlug(\App\Models\FrontPage\Blog::class, 'slug', $request['title']);
        $filename = 'blog-image.jpg';
		if ($request['thumbnail']) {
            $file = $request['thumbnail'];
            $filename = $file->getClientOriginalName();
            $file->storeAs(public_path('blog-img'), $filename);
        } else {
            echo 'lah kok ilang?!'; die;
        }
        $data_blog = [
            'author_id' => Auth::user()->id,
            'category_id' => $request['category_id'],
            'title' => $request['title'],
            'slug' => $slug,
            'thumbnail' => $filename,
            'content' => $request['content'],
            'tags' => $request['tags'],
        ];

        $this->blogService->createData($data_blog);

        return redirect()->route('blogs.index')->with(['response' => true, 'type' => 'success', 'title' => 'Berhasil!', 'alert' => 'success', 'message' => 'Data artikel berhasil di tambah']);
    }

    /** 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $data = $this->blogService->getWhereData('slug', $slug, 'title', 'ASC');

        return view('landing.blog', ['data' => $data, 'blog' => \App\Models\FrontPage\Blog::inRandomOrder()->get(), 'categories' => \App\Models\FrontPage\Categories::all(), 'tags' => \App\Models\FrontPage\ArticleTags::all()]);
    }

    public function article($slug) {
        $data = $this->blogService->getByIdData($id);

        return view('frontpage.blogs.show', ['data' => $data]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->blogService->getByIdData($id);
        $articleTags = \App\Models\FrontPage\ArticleTags::all();
        return view('frontpage.blogs.edit', ['data' => $data, 'articleTags' => $articleTags, 'categories' => \App\Models\FrontPage\Categories::all()]);
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateBlogRequest $request, $id)
    {
        $validate = $request->validated();
        $slug = SlugService::createSlug(\App\Models\FrontPage\Blog::class, 'slug', $request->title);
        $filename = 'blog-image.jpg';
		if ($request->file('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('blog-img'), $filename);
        }
        $data_blog = [
            'author_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => $slug,
            'thumbnail' => $filename,
            'content' => $request->content,
            'tags' => $request->tags,
        ];

        $this->blogService->updateData($id, $data_blog);

        return redirect()->route('blogs.index')->with(['response' => true, 'type' => 'success', 'title' => 'Berhasil!', 'alert' => 'success', 'message' => 'Data artikel berhasil di ubah']);
    }

    public function delete($id)
    {
        $data = $this->blogService->getByIdData($id);

        return view('frontpage.blogs.delete', ['data' => $data]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->blogService->deleteData($id);

        return redirect()->route('blogs.index')->with(['response' => true, 'type' => 'success', 'title' => 'Berhasil!', 'alert' => 'success', 'message' => 'Data artikel berhasil di hapus']);
    }
}
