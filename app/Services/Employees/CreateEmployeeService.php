<?php 

namespace App\Services\Employees;

use App\Repositories\Employees\Employee\Eloquent\EmployeeRepository;
use Illuminate\Support\Facades\Hash;

class CreateEmployeeService
{	
	private $employeeRepository;

	public function __construct(EmployeeRepository $employeeRepository)
	{
		$this->employeeRepository = $employeeRepository;
	}

	public function getAllDatatables($query)
	{
		return $this->employeeRepository->getDatatable($query);
	}

	public function getAllData()
	{
		return $this->employeeRepository->getAll();
	}

	public function getWhereData($key, $param, $orderby, $sort)
	{
		return $this->employeeRepository->getWhere($key, $param, $orderby, $sort);
	}

	public function getPaginateData($limit)
	{
		return $this->employeeRepository->getPaginate($limit);
	}

	public function getByIdData($id)
	{
		return $this->employeeRepository->getById($id);
	}

	public function createData($payload)
	{
		$payload = [
            'nik' => $payload['nik'],
			'name' => $payload['name'],
	        'email' => $payload['email'],
			'birthdate' => $payload['birthdate'],
	        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
	        'role' => $payload['role'],
            'join_date' => $payload['join_date'],
            'salary' => $payload['salary'],
            'address' => $payload['address'],
            'npwp' => $payload['npwp'],
            'created_at' => now(),
		];

		return $this->employeeRepository->create($payload);
	}

	public function updateData($id, $payload)
	{
		//dd($payload['join_date']);
		$employee = $this->employeeRepository->getById($id);
		//dd($employee['birthdate']);
		$payload = [
			'nik' => $payload['nik'],
			'name' => $payload['name'],
	        'email' => $payload['email'],
			'join_date' => $payload['join_date'] == null ? $employee['join_date'] : $payload['join_date'],
			'birthdate' => $payload['birthdate'] == null ? $employee['birthdate'] : $payload['birthdate'],	
	        'role' => $payload['role'],
            'salary' => $payload['salary'],
            'address' => $payload['address'],
            'npwp' => $payload['npwp'],
            'updated_at' => now(),
		];
		
		return $this->employeeRepository->update($id, $payload);
	}

	public function deleteData($id)
	{
		return $this->employeeRepository->delete($id);
	}
}