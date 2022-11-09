<?php

namespace App\Http\Controllers\Projects;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\Projects\Project\CreateProjectRequest;
use App\Services\Projects\Project\CreateProjectService;
use App\Services\Employees\CreateEmployeeService;
use App\Services\Marketings\CreateClientService;

use App\Models\Projects\Projects;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Projects\ProjectController;

class ProjectController extends Controller
{
    
    /**
     * projectService  Implementation.
     * 
     * @var CreateProjectService
     */
    private $projectService;

     /**
     * Constructor of the controller.
     * 
     * @param \App\Services\Projects\CreateProjectService $projectService
     * @return void
     */
    public function __construct(CreateProjectService $projectService, CreateEmployeeService $employeeService, CreateClientService $clientService)
    {
        $this->projectService = $projectService;
        $this->employeeService = $employeeService;
        $this->clientService = $clientService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->projectService->getAllData();
        return view('projects.project.index', ['data' => $data]);
    }

    public function getList(Request $request)
    {
        if ($request->ajax()) {
            return $this->projectService->getAllDatatables($this->projectService->getAllData());
        }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.project.create', ['client' => $this->clientService->getAllData(), 'leader' => $this->employeeService->getWhereData('role', 'Leader Project', 'name', 'ASC')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        //dd($request->all());
        $validate = $request->validated();
        if ($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
        }
        $this->projectService->createData($request->validated());

        return redirect()->route('project.index')->with(['response' => true, 'type' => 'success', 'title' => 'Berhasil!', 'alert' => 'success', 'message' => 'Data project berhasil di tambah']);
    }

    /** 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->projectService->getByIdData($id);

        return view('projects.project.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->projectService->getByIdData($id);

        return view('projects.project.edit', ['data' => $data, 'client' => $this->clientService->getAllData(), 'leader' => $this->employeeService->getWhereData('role', 'Leader Project', 'name', 'ASC')]);
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateprojectRequest $request, $id)
    {
        $validate = $request->validated();
        $this->projectService->updateData($id, $validate);

        return redirect()->route('project.index')->with(['response' => true, 'type' => 'success', 'title' => 'Berhasil!', 'alert' => 'success', 'message' => 'Data project berhasil di ubah']);
    }

    public function delete($id)
    {
        $data = $this->projectService->getByIdData($id);

        return view('projects.project.delete', ['data' => $data]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->projectService->deleteData($id);

        return redirect()->route('project.index')->with(['response' => true, 'type' => 'success', 'title' => 'Berhasil!', 'alert' => 'success', 'message' => 'Data project berhasil di hapus']);
    }
}
