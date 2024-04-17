<!-- app/Views/admin/edit_question.php -->
<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<!-- Page Wrapper -->
<div id="wrapper">
<?= $this->include('layouts/navsidebar.php'); ?>


<div class="container-fluid">
 
    
    <div class="card">
         <div class="card-header">
             <div class="row">
                 <div class="col">Edit Product Detail</div>
                 <div class="col text-right">
                     
                 </div>
             </div>
         </div>
    
         <div class="card-body">

    <form action="<?= route_to('admin.product.update', $products['id']) ?>" method="post">
  
<div class="form-group mb-3">
        <input type="hidden" class="form-control" name="_method" value="PUT">
        <label for="name">Product Name:</label>
        <input type="text" id="name" class="form-control" name="name" value="<?= $products['name'] ?>">
        </div>
<div class="form-group mb-3">
        <label for="sell">Sell Price:</label>
        <input type="text" id="sell"  class="form-control" name="sell" value="<?= $products['sell'] ?>">
        </div>

<div class="form-group mb-3 text-right">
        <button type="submit" class="btn btn-info">Update Product</button>
        </div>

    </form>


    </div>

</div> <!--card-->
</div>










    </div> <!--wrapper end div -->
<?= $this->endSection() ?>
<?= $this->section("footer") ?>
<?= $this->endSection() ?>