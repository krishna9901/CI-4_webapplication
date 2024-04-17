<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<!-- Page Wrapper -->
<div id="wrapper">
<?= $this->include('layouts/navsidebar.php'); ?>
<div class="container-fluid">

<div class="card">
         <div class="card-header">
             <div class="row">
             <div class="col">Add Employee</div>
                 <div class="col text-right">
                     
                 </div>
             </div>
         </div>
    
         <div class="card-body">
    <form id="employeeForm">  
<div class="form-group mb-3">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name">
        </div>
<div class="form-group mb-3">
        <label for="email">Email:</label><br>
        <input type="email" class="form-control" id="email" name="email">
        </div>
<div class="form-group mb-3">
        <label for="phone">Phone:</label><br>
        <input type="text" class="form-control" id="phone" name="phone">
        </div>
<div class="form-group mb-3 text-right">
        <button type="submit" class="btn btn-success">Submit</button>
        </div>

    </form>
</div>
</div>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#employeeForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '/api/employees',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert('Employee created successfully');
                        // Clear form fields
                        $('#name').val('');
                        $('#email').val('');
                        $('#phone').val('');
                    },
                    error: function(xhr, status, error) {
                        alert('Error: ' + error);
                    }
                });
            });
        });
    </script>


</div> <!--wrapper end div -->


<?= $this->endSection() ?>
<?= $this->section("footer") ?>
<?= $this->endSection() ?>
