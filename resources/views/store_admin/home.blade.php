@extends('store_admin.index')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-eJqV9zdL8BPOld5+648jsl9IX7IScQ8mWwr7IzL0fEN1Rx6CK+BZ/GwOxiHwDUpz" crossorigin="anonymous"></script>
<!-- 
<div style="display: flex; justify-content: space-between;">
    <h4 style="color: black">Customer List</h4>
    <button class="employee"><i class="fa fa-plus" aria-hidden="true"></i> Add Customer</button>
</div> -->

<div class="card">
    <div class="table-responsive text-nowrap">
        <table id="example" class="display nowrap" style="width:100%;background-color:#bdbfcb">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Invoice ID</th>
                    <th>Delivery Date</th>
                    <th>Stuts</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>No</td>
                    <td>Customer ID</td>
                    <td>Customer Name</td>
                    <td>Invoice ID</td>
                    <td>Delivery Date</td>
                    <td>Stuts</td>
                    <td><a href="#" class="view_model"><i class="fa fa-eye"  style="font-size:24px"></i></a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

  <!-- edit customer  -->
  <div class="modal fade" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #bdbfcb">
                <!-- <h5 class="modal-title" id="myModalLabel">Add New Store</h5> -->
               <button type="button" id="edit_close" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            </div>
            <div class="modal-body"> 
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });

    $(document).on('click', '.view_model', function(event){
        event.preventDefault(); 
        $('#editmodel').modal('show');
    });

</script>
@endsection