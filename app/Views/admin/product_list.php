<!-- product_list.php -->
<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<!-- Page Wrapper -->
<div id="wrapper">
<?= $this->include('layouts/navsidebar.php'); ?>
   
    <div class="card">
         <div class="card-header">
             <div class="row">
                 <div class="col">Product List</div>
                 <div class="col text-right">
             <a href="<?= route_to('admin.product.create') ?>" class="btn btn-secondary btn-sm">Add New Product</a>
                 </div>
            
                </div>
         </div>
            

                 <div class="card-body">
    <table>
        <thead>
            <tr class="row">
                <th  class="col-md-1 text-center mr-1">ID</th>
                <th  class="col-md-4 text-center mr-1">Name</th>
                <th  class="col-md-4 text-center mr-1"> Sell Price</th>
                <th class="col-md-1 text-center mr-1">Edit</th>
                <th class="col-md-1 text-center mr-1">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr class="row">
                    <td class="col-md-1 form-control text-center mr-1"><?= $product['id'] ?></td>
                    <td class="col-md-4 form-control text-center mr-1"><?= $product['name'] ?></td>
                    <td class="col-md-4 form-control text-center mr-1"><?= $product['sell'] ?></td>
                    <td class="col-md-1 form-control text-center mr-1">
                    <a href="<?= route_to('admin.product.edit', $product['id']) ?>"><i class="fas fa-edit"></i></a>
            </td>
             <td class="col-md-1 form-control text-center mr-1"> 
             <a href="#myModal" class="trigger-btn" data-toggle="modal"><i class="fas fa-trash"></i></a>
                </td >
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    </div>
    </div> <!--wrapper end div -->


<!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>						
				<h4 class="modal-title w-100">Are you sure?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Do you really want to delete these records? This process cannot be undone.</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			
                <form action="<?= route_to('admin.product.destroy', $product['id']) ?>" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="form-control btn btn-danger">Delete</button>
                    </form>
			</div>
		</div>
	</div>
</div> 



<?= $this->endSection() ?>
<?= $this->section("footer") ?>
<?= $this->endSection() ?>
