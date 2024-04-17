<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<!-- Page Wrapper -->
<div id="wrapper">
<?= $this->include('layouts/navsidebar.php'); ?>
<div class="container-fluid">

<div class="card">
         <div class="card-header">
             <div class="row">
             <div class="col">Edit Employee</div>
                 <div class="col text-right">
                     
                 </div>
             </div>
         </div>
    
         <div class="card-body">
    <form id="employeeeditForm" action="/admin/api/employee/update/<?= $employee['id'] ?>" method="post" >
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?= $employee['name'] ?>"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?= $employee['email'] ?>"><br>
        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone" value="<?= $employee['phone'] ?>"><br><br>
        <button type="submit">Update</button>
    </form>
</div>
</div>
</div>
   
    </div> <!--wrapper end div -->


<?= $this->endSection() ?>
<?= $this->section("footer") ?>
<?= $this->endSection() ?>

