<!-- product_form.php -->
<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<!-- Page Wrapper -->
<div id="wrapper">
<?= $this->include('layouts/navsidebar.php'); ?>
<div class="container-fluid">

<div class="card">
         <div class="card-header">
             <div class="row">
             <div class="col">Add Product</div>
                 <div class="col text-right">
                     
                 </div>
             </div>
         </div>
    
         <div class="card-body">

    <form action="<?= base_url('admin/products/store') ?>" method="post">
    <div class="form-group mb-3">
        <label for="name">Product Name:</label><br>
        <input type="text" class="form-control" id="name" name="name"><br>
        </div>
<div class="form-group mb-3">
        <label for="sell">Sell Price:</label><br>
        <input type="text"class="form-control"  id="sell" name="sell"><br><br>
        </div>
<div class="form-group mb-3 text-right">
        <button type="submit" class="btn btn-success">Submit</button>
        </div> 
    </form>

    </div> 
    </div> 

    </div> 
    </div> <!--wrapper end div -->


<?= $this->endSection() ?>
<?= $this->section("footer") ?>
<?= $this->endSection() ?>