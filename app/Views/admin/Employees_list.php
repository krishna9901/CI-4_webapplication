<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<!-- Page Wrapper -->
<div id="wrapper">

<?= $this->include('layouts/navsidebar.php'); ?>

    <div class="card">
         <div class="card-header">
             <div class="row">
                 <div class="col">Employee List</div>
                 <div class="col text-right">
             <a href="<?= route_to('admin.employee.create') ?>" class="btn btn-secondary btn-sm">Add Employee</a>
                 </div>
            
                </div>
         </div>
         <div class="card-body">
    <table >
        <thead>
            <tr>
                <th  class="col-md-1 text-center mr-1">ID</th>
                <th  class="col-md-4 text-center mr-1">Name</th>
                <th  class="col-md-3 text-center mr-1">Email</th>
                <th  class="col-md-2 text-center mr-1">Phone</th>
                <th  class="col-md-2 text-center mr-1">Actions</th>
             
            </tr>
        </thead>
        <tbody id="employeeTable">
            <!-- Employee records will be appended here dynamically -->
        </tbody>
    </table>

</div>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Fetch employees and display in the table
            $.ajax({
                type: 'GET',
                url: 'http://localhost:8080/api/employees',
                success: function(response) {
                    $.each(response, function(index, employees) {
                        $('#employeeTable').append(
                            '<tr class="">' +
                            '<td class="col-md-1  text-center">' + employees.id + '</td>' +
                            '<td class="col-md-3  text-center">' + employees.name + '</td>' +
                            '<td class="col-md-3  text-center">' + employees.email + '</td>' +
                            '<td class="col-md-2  text-center" >' + employees.phone + '</td>' +
                            '<td class="col-md-3  text-center " >' +
                            '<button class="mr-2" onclick="editEmployee('+ employees.id +')"><i class="fas fa-edit"></i></button>' +'<button onclick="deleteEmployee(' + employees.id + ')"><i class="fas fa-trash"></i></button>' +
                         '</td>' +
                           
                            '</tr>'
                        );
                    });
                },
                error: function(xhr, status, error) {
                    alert('Error: ' + error);
                }
            });
        });

        function editEmployee(id) {
            // Implement edit functionality
            alert('Edit Employee with ID ' + id);
           
            window.location.href="<?php echo base_url(); ?>admin/api/employees/edit/"+id;
        }

        function deleteEmployee(id) {
            // Implement delete functionality
            alert('Delete Employee with ID ' + id);
            window.location.href="<?php echo base_url(); ?>admin/api/employees/delete/"+id;
        }
    </script>
</div> <!--wrapper end div -->


<?= $this->endSection() ?>
<?= $this->section("footer") ?>
<?= $this->endSection() ?>