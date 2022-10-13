<?php

namespace App\Http\Controllers\Employees;
use App\Http\Controllers\Controller;
use App\Services\Employees\CreateEmployeeService;
use App\Http\Requests\Employees\CreateEmployeeRequest;

use App\Http\Controllers\Employees\EmployeeController;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\Datatables\Datatables;

class EmployeeController extends Controller
{
    
    /**
     * EmployeeService Implementation.
     * 
     * @var CreateEmployeeService
     */
    private $employeeService;

     /**
     * Constructor of the controller.
     * 
     * @param \App\Services\Employees\CreateEmployeeService $employeeService
     * @return void
     */
    public function __construct(CreateEmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = $this->employeeService->getAllData();
        //dd($data);
        return view('employees.employee.index');
    }

    public function getList(Request $request)
    {
        $employees = $this->employeeService->getAllData();
        if ($request->ajax()) {
            // dd($employees);
            return Datatables::of($employees)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $btn = "<a href=\"javascript:;\" onclick=\"modal_open('detail', '".url('employees/user/'.$row->id.'')."')\" class=\"btn btn-sm btn-primary\" data-bs-toggle=\"tooltip\" data-bs-trigger=\"hover\" data-bs-placement=\"top\" title=\"Detail\"><i class=\"ri-eye-fill\"></i></a> <a href=\"javascript:;\" onclick=\"modal_open('add', '".url('employees/user/'.$row->id.'/edit')."')\" class=\"btn btn-sm btn-primary\" data-bs-toggle=\"tooltip\" data-bs-trigger=\"hover\" data-bs-placement=\"top\" title=\"Detail\"><i class=\"ri-eye-fill\"></i></a> <a href=\"javascript:;\" onclick=\"modal_open('add', '".route('user.create')."')\" class=\"btn btn-sm btn-primary\" data-bs-toggle=\"tooltip\" data-bs-trigger=\"hover\" data-bs-placement=\"top\" title=\"Detail\"><i class=\"ri-eye-fill\"></i></a>";
                return $btn;
            })->rawColumns(['action'])->make(true);
        }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEmployeeRequest $request)
    {
        $this->employeeService->createData($request);

        return redirect()->route('employees.employee.index')->with('success','Data karyawan berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = $this->employeeService->getByIdData($id);
        //dd($employee);

        return view('employees.employee.show', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = $this->employeeService->getByIdData($id);

        return view('employees.employee.edit', ['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        $this->employeeService->updateData($id, $request);

        return redirect()->route('employees.employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->employeeService->deleteData($id);

        return redirect()->route('employees.employee.index');
    }
}
