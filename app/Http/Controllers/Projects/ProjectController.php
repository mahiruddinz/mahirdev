<?php

namespace App\Http\Controllers\Projects;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\Projects\Project\CreateProjectRequest;
use App\Services\Projects\Project\CreateProjectService;
use App\Services\Employees\CreateEmployeeService;

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
    public function __construct(CreateProjectService $projectService, CreateEmployeeService $employeeService)
    {
        $this->projectService = $projectService;
        $this->employeeService = $employeeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('projects.project.index');
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
        $data = $this->employeeService->getWhereData('role', 'Marketing', 'name', 'DESC');
        return view('projects.project.create', ['marketing' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        $validated = $request->validated();
        $this->projectService->createData($request);

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

        return view('projects.project.edit', ['data' => $data]);
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
        $data = $this->projectService->getByIdData($id);
        $this->projectService->updateData($id, $request->all());

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
