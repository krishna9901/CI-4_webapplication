<?php 
namespace App\Models;
use CodeIgniter\Model;
class EmployeeModel extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'phone'];

    public function getEmployees()
    {
        return $this->findAll();
    }

    public function getEmployee($id)
    {
        return $this->find($id);
    }

    public function createEmployee($data)
    {
        return $this->insert($data);
    }

    public function updateEmployee($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteEmployee($id)
    {
        return $this->delete($id);
    }
}