<?php

namespace App\Http\Controllers\FrontPage;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

// LOAD REQUEST & SERVICES //
use App\Services\FrontPage\CreateCategoryService;
use App\Http\Requests\FrontPage\CreateCategoriesRequest;

// LOAD MODEL & DATATABLES 
use App\Models\FrontPage\Categories;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class CategoriesController extends Controller
{
    
    /**
     * categoryService  Implementation.
     * 
     * @var CreateCategoryService
     */
    private $categoryService;

     /**
     * Constructor of the controller.
     * 
     * @param \App\Services\Projects\CreateCategoryService $categoryService
     * @return void
     */
    public function __construct(CreateCategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->categoryService->getAllData();
        return view('frontpage.categories.index', ['data' => $data]);
    }

    public function getList(Request $request)
    {
        if ($request->ajax()) {
            return $this->categoryService->getAllDatatables($this->categoryService->getAllData());
        }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontpage.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoriesRequest $request)
    {
        //dd($request->all());
        $validate = $request->validated();
        if ($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
        }
        $this->categoryService->createData($request->validated());

        return redirect()->route('categories.index')->with(['response' => true, 'type' => 'success', 'title' => 'Berhasil!', 'alert' => 'success', 'message' => 'Data project berhasil di tambah']);
    }

    /** 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->categoryService->getByIdData($id);

        return view('frontpage.categories.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->categoryService->getByIdData($id);

        return view('frontpage.categories.edit', ['data' => $data]);
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCategoriesRequest $request, $id)
    {
        $validate = $request->validated();
        $this->categoryService->updateData($id, $validate);

        return redirect()->route('categories.index')->with(['response' => true, 'type' => 'success', 'title' => 'Berhasil!', 'alert' => 'success', 'message' => 'Data project berhasil di ubah']);
    }

    public function delete($id)
    {
        $data = $this->categoryService->getByIdData($id);

        return view('frontpage.categories.delete', ['data' => $data]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryService->deleteData($id);

        return redirect()->route('categories.index')->with(['response' => true, 'type' => 'success', 'title' => 'Berhasil!', 'alert' => 'success', 'message' => 'Data project berhasil di hapus']);
    }
}
