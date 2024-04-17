<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use App\Models\EmployeeModel;

class EmployeeController extends ResourceController
{
    use ResponseTrait;


    //rest api function crud//
    public function index()
    {
        $model = new EmployeeModel();
        $employees = $model->getEmployees();
       // dd($employees);
        return $this->respond($employees);
        
    }

    public function list(){
        $model = new EmployeeModel();
        $employees = $model->getEmployees(); // Retrieve employees data
        $userRole = 'admin'; // Example value
        // Load the navsidebar.php view and pass the $userRole variable
         
        return view('admin/employees_list', ['employees' => $employees,'userRole' => $userRole]);
    }


    //rest api function crud//
    public function show($id = null)
    {
        $model = new EmployeeModel();
        $employee = $model->getEmployee($id);
        return $this->respond($employee);
    }


    //rest api function crud//
    public function create()
    {
        $model = new EmployeeModel();
        $data = $this->request->getPost();
        $model->createEmployee($data);
        return $this->respondCreated(['status' => 'Employee created successfully']);
        
    }

    public function storeform()
    {
        $userRole = 'admin'; // Example value
        // Load the navsidebar.php view and pass the $userRole variable
            $data['userRole'] = $userRole;
        return view('admin/employee_form',$data);
   
    }

    public function editForm($id)
    {
        $model = new EmployeeModel();
        $employee = $model->getEmployee($id);
        $userRole = 'admin'; // Example value
        // Load the navsidebar.php view and pass the $userRole variable
       
        return view('admin/employeeedit_form', ['employee' => $employee ,'userRole' => $userRole]);
    }
    

//rest api function crud//
    public function update($id = null)
    {
        $model = new EmployeeModel();
        $data = $this->request->getRawInput();
        $model->updateEmployee($id, $data);
     return $this->respond(['status' => 'Employee updated successfully']);
        //return view('employees_list');
    }

    

    public function updatedata($id = null)
    {
        $model = new EmployeeModel();
        $data = $this->request->getRawInput();
        $model->updateEmployee($id, $data);
        $userRole = 'admin'; // Example value
        $data['userRole'] = $userRole;
      return view('admin/employees_list',$data);
    }

    //rest api function crud//
    public function delete($id = null)
    {
        $model = new EmployeeModel();
        $model->deleteEmployee($id);
        return $this->respond(['status' => 'Employee deleted successfully']);
        //return view('employees_list');
    }

    public function destroy($id = null)
    {
        $model = new EmployeeModel();
        $model->deleteEmployee($id);
        $userRole = 'admin'; // Example value
        $data['userRole'] = $userRole;
       // return $this->respond(['status' => 'Employee deleted successfully']);
        return view('admin/employees_list',$data);
    }
}
