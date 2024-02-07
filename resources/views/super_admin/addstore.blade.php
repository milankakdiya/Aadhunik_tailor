
@extends('super_admin.index')
@section('content')

{{-- mobile flage and country code selected script --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>

{{-- fa fa icon sacript  --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" /> --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
 
<style>
    .employee{
        border-radius: 13px 5px;
        background: #2b2c30;
        color: white;
        border: none;
        height: 38px;
        width: 8%;
        position: relative;
        margin-bottom: 10px;
    }
    .dataTables_wrapper{
        padding: 20px;
    }

    @media (min-width: 768px) and (max-width: 991px){
        .employee {
            width: 13%; 
        }
        .modal-dialog{
            max-width: 500px;
        }
        #image{
            width: 44%;
        }
    }
    @media only screen and (max-width: 768px) {
        .employee {
            width: 18%; 
        }
        .modal-dialog{
            max-width: 500px;
        }
        #image{
            width: 44%;
        }
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-eJqV9zdL8BPOld5+648jsl9IX7IScQ8mWwr7IzL0fEN1Rx6CK+BZ/GwOxiHwDUpz" crossorigin="anonymous"></script>
<div style="display: flex; justify-content: space-between;">
    <h4 style="color: black">Store List</h4>
    <button class="employee"><i class="fa fa-plus" aria-hidden="true"></i> Add Store</button>
</div>

<div class="card">
    <div class="table-responsive text-nowrap">
        <table id="example" class="display nowrap" style="width:100%;background-color:#bdbfcb">
            <thead>
                <tr>
                    <th>Sid</th>
                    <th>Storecode</th>
                    <th>Profile Image</th>
                    <th>Name</th>
                    <th>MobileNo.</th>
                    <th>Additional Information</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
           
                <tr>
                    <td> {{ $loop->index + 1 }}</td>
                    <td>{{$item->store_code}}</td>
                    <!-- <td>
                        <div style="width: 50px; height: 50px; border-radius: 50%; overflow: hidden;">
                            <a href="{{ asset('image/' . $item->image) }}" target="_blank">
                                 <img src="{{ asset('image/' . $item->image) }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                            </a>
                        </div>
                    </td> -->
                    <td>
                                                <a data-bs-toggle="modal" data-bs-target="#modal{{ $item->id }}i"><img
                                                        src="{{ asset('image/' . $item->image) }}"
                                                        style="height: 50px;width: 80px;cursor: pointer;">
                                                </a>
                                                <div class="modal fade" id="modal{{ $item->id }}i">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content" style="margin-left: auto;margin-right: auto;width:50%">
                                                            <div class="modal-body">
                                                                <div class="input-group mb-3"
                                                                    style="justify-content: center;">
                                                                    <img src="{{ asset('image/' . $item->image) }}"
                                                                        style="height:50%;width:50%;">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                    </td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->phone_number}}</td>
                    <td>{{$item->add}}</td>
                    <td>
                        <a href="#" class="delete" data-id='{{$item->id}}'>
                            <i class="fa fa-trash" style="font-size:24px;color:red"  aria-hidden="true"></i>
                        </a>
                        <a href="#" class="edit" data-id='{{$item->id}}' data-store_code='{{$item->store_code}}' data-name='{{$item->name}}'
                                                   data-phone_number='{{$item->phone_number}}' data-image='{{$item->image}}' data-add='{{$item->add}}'>
                            <i class="fa fa-edit" style="font-size:24px;color:#36a50b"></i>
                        </a>
                    </td>
             
                </tr>
                @endforeach  
            </tbody>
            
        </table>
    </div>
</div>
  <!-- add store  -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #bdbfcb">
                <h5 class="modal-title" id="myModalLabel">Add New Store</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="store_store" method="post" id="password" enctype="multipart/form-data">
                    @csrf
                    <div class="add_store_con">
                        <div class="w-50">
                            <div class="row mt-3">
                                    <strong>Store Code<span class="text-danger">*</span></strong>
                                    <input type="text" class="form-control"  placeholder="Enter Store Code" name="store_code" required/>
                                    
                            </div>
                            <div class="row mt-3">
                                    <strong>Name<span class="text-danger">*</span></strong>
                                    <input type="text" class="form-control"  placeholder="Enter Name" name="name" required/>
                                    
                            </div>
                            <div class="row mt-3">
                                <strong>Phone Number<span class="text-danger">*</span></strong>
                                <input type="tex" class="form-control"  placeholder="Enter Number" id="phone_number" name="phone_number[main]"  required />        
                            </div>
                        </div>
                        <div class="profile_pic w-50">
                            <label for="img">Profile Image<span class="text-danger">*</span></label>
                            <span class="uplode_pic_view"></span>
                            <input type="file" name="image" id="image" accept="image/*" required>
                        </div>
                    </div>

                    <hr size="8" width="100%" color="green">  

                    <div class="row mt-3"> 
                         <strong>Additional Information</strong>
                         <textarea name="add"  class="form-control"></textarea>
                    </div>
                   
                    <div class="mt-3">
                        <button type="submit"
                            class="text-white p-2 border-0 rounded px-3 fw-bold send_inquiry_btn" style="background-color: #16ae71;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- edit store  -->
<div class="modal fade" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #bdbfcb">
                <h5 class="modal-title" id="myModalLabel">Add New Store</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
             </button>
            </div>
            <div class="modal-body">
                <form action="store_edit" method="post" id="password" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="base_url" value="{{ asset('/image') }}">
                    <div class="add_store_con">
                        <div class="w-50">
                            <div class="row mt-3">
                                    <strong>Store Code<span class="text-danger">*</span></strong>
                                    <input type="text" class="form-control"  placeholder="Enter Store Code" name="store_code" id="store_code" required/>
                                    
                            </div>
                            <div class="row mt-3">
                                    <strong>Name<span class="text-danger">*</span></strong>
                                    <input type="text" class="form-control"  placeholder="Enter Name" id="name" name="name" required/>
                                    
                            </div>
                            <div class="row mt-3">
                                <strong>Phone Number<span class="text-danger">*</span></strong>
                                <input type="tex" class="form-control"  placeholder="Enter Number" id="mobile_number" name="mobile_no[main]"  required />        
                            </div>
                        </div>
                        <div class="profile_pic w-50">
                            <label for="img">Profile Image<span class="text-danger">*</span></label>
                            <span class="uplode_pic_view"  id="show_image"></span>
                            <input type="file" name="image" id="edit_image"  accept="image/*" >
                        </div>
                    </div>

                    <hr size="8" width="100%" color="green">  

                    <div class="row mt-3"> 
                         <strong>Additional Information</strong>
                         <textarea name="add" id="add" class="form-control"></textarea>
                    </div>
                   
                    <div class="mt-3">
                        <button type="submit"
                            class="text-white p-2 border-0 rounded px-3 fw-bold send_inquiry_btn" style="background-color: #16ae71;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--employee Delete Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 30%;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #dfe8eb">
                <h5 class="modal-title" id="myModalLabel">Delete Store</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
                <h5 class="text-center" style="margin-right: 8%;">Are you sure you want to delete Store?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    style="background-color:#356a7f ">Close</button>
                <button type="button" id="deletemember" class="btn btn-danger">Delete</button>
                </form>
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
    // --add store--
    $(document).on('click', '.employee', function(event){
        event.preventDefault(); 
        $('#exampleModalCenter').modal('show');
    });
  
    var phone_number = window.intlTelInput(document.querySelector("#phone_number"), {
        separateDialCode: true,
        preferredCountries: ["in"],
        utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
    });

    $("form").submit(function() {
            var full_number = phone_number.getNumber();
            $("input[name='phone_number[main]'").val(full_number);

    });
    // -----add contry code script------
    var mobile_no = window.intlTelInput(document.querySelector("#mobile_number"), {
        separateDialCode: true,
        preferredCountries: ["in"],
        utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
    });

    $("form").submit(function() {
            var full_number = mobile_no.getNumber();
            $("input[name='mobile_no[main]'").val(full_number);

    });
 

</script>
<script>
    // Function to handle file input change event
    function handleFileInputChange() {
        var input = document.getElementById('image');
        var preview = document.querySelector('.uplode_pic_view');
        
        input.addEventListener('change', function () {
            var file = input.files[0];
            
            if (file) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    preview.style.backgroundImage = 'url(' + e.target.result + ')';
                    preview.style.backgroundSize = 'cover';  // Adjust this based on your requirements
                    preview.style.backgroundPosition = 'center center';  // Adjust this based on your requirements
                };
                
                reader.readAsDataURL(file);
            } else {
                preview.style.backgroundImage = 'none';
            }
        });
    }

    // Call the function when the DOM is ready
    document.addEventListener('DOMContentLoaded', function () {
        handleFileInputChange();
    });

    function handleEditFileInputChange() {
        var input = document.getElementById('edit_image');
        var preview = document.getElementById('show_image');

        input.addEventListener('change', function () {
            var file = input.files[0];  

            if (file) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    preview.style.backgroundImage = 'url(' + e.target.result + ')';
                    preview.style.backgroundSize = 'cover';  // Adjust this based on your requirements
                    preview.style.backgroundPosition = 'center center';  // Adjust this based on your requirements
                };

                reader.readAsDataURL(file);
            } else {
                preview.style.backgroundImage = 'none';
            }
        });
    }

    // Call the function when the DOM is ready
    document.addEventListener('DOMContentLoaded', function () {
        handleEditFileInputChange();
    });
</script>
<script>
    $(document).on('click','.edit', function(event){
        event.preventDefault(); 
        var id = $(this).data('id');
        var store_code = $(this).data('store_code');
        var name = $(this).data('name');
        var phone_number = $(this).data('phone_number');
        var image = $(this).data('image');
        var add = $(this).data('add');
        var baseUrl = $('#base_url').val();
        var fileUrl = baseUrl + '/' + image ;

         // Extract the first 3 characters of phone_number
         var truncatedPhoneNumber = String(phone_number).substring(3);

        $('#editmodel').modal('show');
        $('#store_code').val(store_code);
        $('#name').val(name);
        $('#add').val(add);
        $('#mobile_number').val(truncatedPhoneNumber);
        $('#show_image').attr('style', 'background-image: url(' + fileUrl + '); background-size: cover; background-position: center center;');
        $('#id').val(id);
        $('input[name="emp_role[]"]').prop('checked', false); // Uncheck all checkboxes first
        emp_roles.forEach(function(role) {
            console.log('swdasd', emp_roles);
            $('input[name="emp_role[]"][value="' + role + '"]').prop('checked', true);
        });
        // console.log(emp_roles);

    });

    $(document).on('click', '.delete', function(event){
        event.preventDefault();
        var id = $(this).data('id');
        $('#deletemodal').modal('show');
        $('#deletemember').val(id);
    });
    $('#deletemember').click(function() {
        var id = $(this).val();
        console.log(id);
        $.post("{{ url('store_delete') }}", {
            id: id,
            _token: "{{ csrf_token() }}"
        }, function() {
            $('#deletemodal').modal('hide');
            location.reload();
        });
    });
</script>

@endsection