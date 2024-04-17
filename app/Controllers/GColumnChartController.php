<?php 
namespace App\Controllers;
use CodeIgniter\Controller;

class GColumnChartController extends Controller
{
    public function index() {
        return view('chart');
    }
    
    public function initChart() {
        
        $db = \Config\Database::connect();
        $builder = $db->table('product');
        $query = $builder->select("COUNT(id) as count, sell as s, DAYNAME(created_at) as day");
        $query = $builder->where("DAY(created_at) GROUP BY DAYNAME(created_at), s")->get();
        $record = $query->getResult();
        $products = [];
        foreach($record as $row) {
            $products[] = array(
                'day'   => $row->day,
                'sell' => floatval($row->s)
            );
        }
        $userRole = 'admin'; // Example value
     
        // Load the navsidebar.php view and pass the $userRole variable
        $data['userRole'] = $userRole;


        $data['products'] = ($products);    
        return view('admin/gchart', $data);                
    }

    public function clientinitChart() {
        
        $db = \Config\Database::connect();
        $builder = $db->table('product');
        $query = $builder->select("COUNT(id) as count, sell as s, DAYNAME(created_at) as day");
        $query = $builder->where("DAY(created_at) GROUP BY DAYNAME(created_at), s")->get();
        $record = $query->getResult();
        $products = [];
        foreach($record as $row) {
            $products[] = array(
                'day'   => $row->day,
                'sell' => floatval($row->s)
            );
        }
        $userRole = 'client'; // Example value
     
        // Load the navsidebar.php view and pass the $userRole variable
        $data['userRole'] = $userRole;


        $data['products'] = ($products);    
        return view('client/gchart', $data);                
    }
 

 
}