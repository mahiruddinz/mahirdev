<?php

namespace App\Http\Controllers\Projects;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\Projects\CreateUserTaskRequest;

/* LOAD SERVICES */
use App\Services\Employees\CreateEmployeeService;
use App\Services\Projects\Project\CreateUserTaskService;
use App\Services\Projects\Project\CreateProjectService;

use Yajra\Datatables\Datatables;
use App\Http\Controllers\Projects\UserTaskController;

class UserTaskController extends Controller
{
    
    /**
     * userTaskService  Implementation.
     * 
     * @var CreateUserTaskService
     */
    private $userTaskService;

     /**
     * Constructor of the controller.
     * 
     * @param \App\Services\Projects\CreateUserTaskService $userTaskService
     * @return void
     */
    public function __construct(CreateUserTaskService $userTaskService, CreateEmployeeService $employeeService, CreateProjectService $projectService)
    {
        $this->userTaskService = $userTaskService;
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
        $data = $this->userTaskService->getAllData();
        return view('projects.task.index', ['data' => $data]);
    }

    public function getList(Request $request)
    {
        if ($request->ajax()) {
            return $this->userTaskService->getAllDatatables($this->userTaskService->getAllData());
        }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.task.create', ['user' => $this->employeeService->getWhereData('role', 'Project', 'name', 'ASC'), 'project' => $this->projectService->getAllData()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserTaskRequest $request)
    {
        $validate = $request->validated();
        //dd($validate);
        $this->userTaskService->createData($validate);

        return redirect()->route('task-project.index')->with(['response' => true, 'type' => 'success', 'title' => 'Berhasil!', 'alert' => 'success', 'message' => 'Data tugas project berhasil di tambah']);
    }

    /** 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->userTaskService->getByIdData($id);

        return view('projects.task.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->userTaskService->getByIdData($id);

        return view('projects.task.edit', ['data' => $data, 'client' => $this->clientService->getAllData(), 'leader' => $this->employeeService->getWhereData('role', 'Leader Project', 'name', 'ASC')]);
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUserTaskRequest $request, $id)
    {
        $validate = $request->validated();
        $this->userTaskService->updateData($id, $validate);

        return redirect()->route('task-project.index')->with(['response' => true, 'type' => 'success', 'title' => 'Berhasil!', 'alert' => 'success', 'message' => 'Data tugas project berhasil di ubah']);
    }

    public function delete($id)
    {
        $data = $this->userTaskService->getByIdData($id);

        return view('projects.task.delete', ['data' => $data]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userTaskService->deleteData($id);

        return redirect()->route('task-project.index')->with(['response' => true, 'type' => 'success', 'title' => 'Berhasil!', 'alert' => 'success', 'message' => 'Data tugas project berhasil di hapus']);
    }
}
