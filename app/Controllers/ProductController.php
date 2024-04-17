<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;

class ProductController extends Controller
{
    public function index()
    {
        // return view('products'); // Load the form view
        $model = new ProductModel();
        $data['products'] = $model->findAll(); // Fetch all products from the database
        $userRole = 'admin'; // Example value
     
        // Load the navsidebar.php view and pass the $userRole variable
        $data['userRole'] = $userRole;
        return view('admin/product_list', $data); // Pass the data to the view
    }
    

    public function store()
    {
        $model = new ProductModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'sell' => $this->request->getPost('sell'),
            'created_at' => date('Y-m-d') // Set the current date as created_at
        ];

        $model->insert($data); // Insert data into the database
      
        // return redirect()->to('admin/product_list'); 
        // return view('admin/product_list', $data);// Redirect back to the form after insertion
          // Fetch the updated list of products
    $products = $model->findAll();
    $userRole = 'admin'; // Example value
     
    // Load the navsidebar.php view and pass the $userRole variable
    //$data['userRole'] = $userRole;
    // Pass the product data to the view
    return view('admin/product_list', ['products' => $products,  'userRole' => $userRole]);
    }

    public function create()
    {
        $userRole = 'admin'; // Example value
     
        // Load the navsidebar.php view and pass the $userRole variable
        $data['userRole'] = $userRole;
        return view('admin/product_form',$data); // Load the product creation form view
    }

    public function edit($id)
    {
        $productModel = new ProductModel();
        $userRole = 'admin'; // Example value
        // Load the navsidebar.php view and pass the $userRole variable
            $data['userRole'] = $userRole;
        $data['products'] = $productModel->find($id);
        return view('admin/edit_product', $data);
    }

    public function update($id)
    {
        $productModel = new ProductModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'sell' => $this->request->getPost('sell'),
          
        ];
        $productModel->update($id, $data);
        return redirect()->route('admin.product.index')->with('success', 'Product Details updated successfully.');
    }

    public function destroy($id)
    {
        $productModel = new ProductModel();
        $productModel->delete($id);
        return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully.');
    }


}
