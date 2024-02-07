@extends('factory_admin.index')
@section('content')
    {{-- mobile flage and country code selected script --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .employee {
            border-radius: 13px 5px;
            background: #2b2c30;
            color: white;
            border: none;
            height: 38px;
            width: 8%;
            position: relative;
            margin-bottom: 10px;
        }

        .dataTables_wrapper {
            padding: 20px;
        }

     

        @media (min-width: 768px) and (max-width: 991px) {
            .employee {
                width: 13%;
            }

            .modal-dialog {
                max-width: 500px;
            }

            #image {
                width: 44%;
            }
        }

        @media only screen and (max-width: 768px) {
            .employee {
                width: 18%;
            }

            .modal-dialog {
                max-width: 500px;
            }

            #image {
                width: 44%;
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-eJqV9zdL8BPOld5+648jsl9IX7IScQ8mWwr7IzL0fEN1Rx6CK+BZ/GwOxiHwDUpz" crossorigin="anonymous">
    </script>
    <div style="display: flex; justify-content: space-between;">
        <h4 style="color: black">Employee List</h4>
        <button class="employee"><i class="fa fa-plus" aria-hidden="true"></i> Add Employee</button>
    </div>

    <div class="card">
        <div class="table-responsive text-nowrap">
            <table id="example" class="display nowrap" style="width:100%;background-color:#bdbfcb">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Employee Id</th>
                        <th>Employee Name</th>
                        <th>Profile Image</th>
                        <th>Employee Number</th>
                        <th>Notes</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($data as $item)
           
                    <tr>
                        <td> {{ $loop->index + 1 }}</td>
                        <td>{{$item->emp_id}}</td>
                        <td>{{$item->emp_name}}</td>
                        <td>
                          @if($item->emp_profile_image != null)
                            <a data-bs-toggle="modal" data-bs-target="#modal{{ $item->id }}"><img
                                    src="{{ asset('profile_image/' . $item->emp_profile_image) }}"
                                    style="width: 50px; height: 50px; border-radius: 50%; overflow: hidden;">
                            </a>
                            <div class="modal fade" id="modal{{ $item->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="margin-left: auto;margin-right: auto;width:50%">
                                        <div class="modal-body">
                                            <div class="input-group mb-3"
                                                style="justify-content: center;">
                                                <img src="{{ asset('profile_image/' . $item->emp_profile_image) }}"
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
                            @endif
                        </td>
                        <td>{{$item->emp_number}}</td>
                        <td>{{$item->notes}}</td>
                        <td>{{$item->emp_role}}</td>
                        
                        <td>
                            <a href="#" class="delete" data-id='{{$item->id}}'>
                                <i class="fa fa-trash" style="font-size:24px;color:red"  aria-hidden="true"></i>
                            </a>
                            <a href="#" class="edit" data-id='{{$item->id}}' data-emp_id='{{$item->emp_id}}' data-name='{{$item->emp_name}}'  data-emp_profile_image='{{$item->emp_profile_image}}'
                                 data-emp_number='{{$item->emp_number}}' data-emp_role='{{$item->emp_role}}' data-notes='{{$item->notes}}'>
                                <i class="fa fa-edit" style="font-size:24px;color:#36a50b"></i>
                            </a>
                        
                        </td>
                
                    </tr>
                @endforeach  
                </tbody>
            </table>
        </div>
    </div>
 
  

   <!-- add employee  -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #bdbfcb">
                <h5 class="modal-title" id="myModalLabel">Add New Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="factory_store" method="post" id="password" enctype="multipart/form-data">
                    @csrf
                    <div class="add_store_con">
                        <div class="w-50">
                            <div class="row mt-3">
                                    <strong>Name<span class="text-danger">*</span></strong>
                                    <input type="text" class="form-control"  placeholder="Enter Employee Name" name="emp_name" required/>
                                    
                            </div>
                            <div class="row mt-3">
                                <strong>Phone Number<span class="text-danger">*</span></strong>
                                <input type="tex" class="form-control"  placeholder="Enter Employee Number" id="phone_number" name="emp_number[main]"  required />        
                            </div>
                            <div class="d-flex mt-3">
                                <span class="mr-3 role-text">Role:</span>
                                <div>
                                    <div class="d-flex flex-wrap">
                                        <input type="checkbox" name="emp_role[]" value="Cutter" class="mr-1 ml-1 mb-0">
                                        <label for="vehicle1" class="mr-1 ml-1 mb-0">Cutter</label><br>
                                        <input type="checkbox" name="emp_role[]" value="Stitching artist" class="mr-1 ml-1 mb-0">
                                        <label for="vehicle1" class="mr-1 ml-1 mb-0">Stitching artist</label><br>
                                        <input type="checkbox" name="emp_role[]" value="Finishing Master" class="mr-1 ml-1 mb-0">
                                        <label for="vehicle1" class="mr-1 ml-1 mb-0">Finishing Master</label><br>
                                    </div>
                                    <div class="d-flex">
                                        <input type="checkbox" name="emp_role[]" value="Other" class="mr-1 ml-1 mb-0">
                                        <label for="vehicle1" class="mr-1 ml-1 mb-0">Other</label><br>
                                        <input type="checkbox"  name="emp_role[]" value="Checker" class="mr-1 ml-1 mb-0">
                                        <label for="vehicle1" class="mr-1 ml-1 mb-0">Checker</label><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profile_pic w-50">
                            <label for="img">Profile Image</label>
                            <span class="uplode_pic_view"></span>
                            <input type="file" name="emp_profile_image" id="image" accept="image/*" >
                        </div>
                    </div>
                    
                    <hr size="8" width="100%" color="green">  

                    <div class="row mt-3"> 
                        <strong>Notes</strong>
                        <textarea name="notes"  class="form-control"></textarea>
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
   <!--user Delete Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog" style="max-width: 30%;">
       <div class="modal-content">
           <div class="modal-header" style="background-color: #bdbfcb">
               <h5 class="modal-title" id="myModalLabel">Delete Employee</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
           </div>
           <div class="modal-body">
               <h5 class="text-center" style="margin-right: 8%;">Are you sure you want to Delete Employee?</h5>
           </div>
           <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #356a7f">Close</button>
            <button type="button" id="deletemember" class="btn btn-danger">Delete</button>
        </div>
       </div>
   </div>
</div>

  <!-- edit user  -->
<div class="modal fade" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header" style="background-color: #bdbfcb">
              <h5 class="modal-title" id="myModalLabel">Add New Store</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form action="factory_edit" method="post"  enctype="multipart/form-data">
                 <input type="hidden" id="id" name="id">
                  <input type="hidden" id="base_url" value="{{ asset('/profile_image') }}">
                  @csrf
                  <div class="add_store_con">
                      <div class="w-50">
                          <div class="row mt-3">
                              <strong>Name<span class="text-danger">*</span></strong>
                              <input type="text" class="form-control" placeholder="Enter User Name" id="name"
                                 name="name" required />

                          </div> 
                          <div class="row mt-3">
                              <strong>Phone Number<span class="text-danger">*</span></strong>
                              <input type="tex" class="form-control" placeholder="Enter Number"
                                  name="mobile_number[main]" id="mobile_number" required/>
                          </div>
                            <div class="d-flex mt-3">
                            <span class="mr-3 role-text">Role:</span>
                            <div>
                                <div class="d-flex flex-wrap">
                                    <input type="checkbox" name="emp_role[]" id="cutter" value="Cutter" class="mr-1 ml-1 mb-0">
                                    <label for="vehicle1" class="mr-1 ml-1 mb-0">Cutter</label><br>
                                    <input type="checkbox" name="emp_role[]" id="stitching_artist" value="Stitching artist" class="mr-1 ml-1 mb-0">
                                    <label for="vehicle1" class="mr-1 ml-1 mb-0">Stitching artist</label><br>
                                    <input type="checkbox" name="emp_role[]" id="finishing_master" value="Finishing Master" class="mr-1 ml-1 mb-0">
                                    <label for="vehicle1" class="mr-1 ml-1 mb-0">Finishing Master</label><br>
                                </div>
                                <div class="d-flex">
                                    <input type="checkbox" name="emp_role[]" id="other" value="Other" class="mr-1 ml-1 mb-0">
                                    <label for="vehicle1" class="mr-1 ml-1 mb-0">Other</label><br>
                                    <input type="checkbox"  name="emp_role[]" id="checker" value="Checker" class="mr-1 ml-1 mb-0">
                                    <label for="vehicle1" class="mr-1 ml-1 mb-0">Checker</label><br>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="profile_pic w-50">
                          <label for="img">Profile Image<span class="text-danger">*</span></label>
                          <span class="uplode_pic_view" id="show_image"></span>
                          <input type="file" name="emp_profile_image" id="edit_image" accept="image/*">
                      </div>
                  </div>

                  <hr size="8" width="100%" color="green">

                  <div class="row mt-3">
                      <strong>Notes</strong>
                      <textarea name="notes" class="form-control" id="notes"> </textarea>
                  </div>

                  <div class="mt-3">
                      <button type="submit" class="text-white p-2 border-0 rounded px-3 fw-bold send_inquiry_btn"
                          style="background-color: #16ae71;">Submit</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
  
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
        // --add store--
        $(document).on('click', '.employee', function(event) {
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
                $("input[name='emp_number[main]'").val(full_number);

        });
        // -----add contry code script------
        var mobile_no = window.intlTelInput(document.querySelector("#mobile_number"), {
            separateDialCode: true,
            preferredCountries: ["in"],
            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
        });

        $("form").submit(function() {
                var full_number = mobile_no.getNumber();
                $("input[name='mobile_number[main]'").val(full_number);

        });
    </script>
    <script>
        // Function to handle file input change event
        function handleFileInputChange() {
            var input = document.getElementById('image');
            var preview = document.querySelector('.uplode_pic_view');

            input.addEventListener('change', function() {
                var file = input.files[0];

                if (file) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        preview.style.backgroundImage = 'url(' + e.target.result + ')';
                        preview.style.backgroundSize = 'cover'; // Adjust this based on your requirements
                        preview.style.backgroundPosition =
                        'center center'; // Adjust this based on your requirements
                    };

                    reader.readAsDataURL(file);
                } else {
                    preview.style.backgroundImage = 'none';
                }
            });
        }

        // Call the function when the DOM is ready
        document.addEventListener('DOMContentLoaded', function() {
            handleFileInputChange();
        });

        function handleEditFileInputChange() {
            var input = document.getElementById('edit_image');
            var preview = document.getElementById('show_image');

            input.addEventListener('change', function() {
                var file = input.files[0];

                if (file) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        preview.style.backgroundImage = 'url(' + e.target.result + ')';
                        preview.style.backgroundSize = 'cover'; // Adjust this based on your requirements
                        preview.style.backgroundPosition =
                        'center center'; // Adjust this based on your requirements
                    };

                    reader.readAsDataURL(file);
                } else {
                    preview.style.backgroundImage = 'none';
                }
            });
        }

        // Call the function when the DOM is ready
        document.addEventListener('DOMContentLoaded', function() {
            handleEditFileInputChange();
        });
    </script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        $(document).on('click', '.edit', function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            var emp_number = $(this).data('emp_number');
            var emp_profile_image = $(this).data('emp_profile_image');
            var emp_roles = $(this).data('emp_role');
            var notes = $(this).data('notes');
            var emp_role = $(this).data('emp_role');
            var baseUrl = $('#base_url').val();
            var fileUrl = baseUrl + '/' + emp_profile_image;
              
            var truncatedPhoneNumber = String(emp_number).substring(3);

            $('#editmodel').modal('show');
            $('#id').val(id);
            $('#name').val(name);
            $('#mobile_number').val(truncatedPhoneNumber);
            $('#notes').val(notes);  
            $('#show_image').attr('style', 'background-image: url(' + fileUrl + '); background-size: cover; background-position: center center;');   
            var rolesArray = emp_roles.split(',');
            $('input[name="emp_role[]"]').prop('checked', false);

                // Check checkboxes based on roles
            rolesArray.forEach(function(role) {
                if (role.trim() === 'Cutter') {
                    $("input[id=cutter]").prop("checked", true);
                } else if (role.trim() === 'Stitching artist') {
                    $("input[id=stitching_artist]").prop("checked", true);
                } else if (role.trim() === 'Finishing Master') {
                    $("input[id=finishing_master]").prop("checked", true);
                } else if (role.trim() === 'Other') {
                    $("input[id=other]").prop("checked", true);
                } else if (role.trim() === 'Checker') {
                    $("input[id=checker]").prop("checked", true);
                }
            });
        });
        // $(document).on('click', '.delete', function(event){
        //     event.preventDefault();
        //     var id = $(this).data('id');
        //     $('#deletemodal').modal('show');
        //     $('#deletemember').val(id);
        // });

        $(document).on('click', '.delete', function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            $('#deletemodal').modal('show');
            $('#deletemember').val(id);
        });
        $('#deletemember').click(function() {
            var id = $(this).val();
            $.ajax({
                url: "{{ url('factory_delete') }}",
                type: 'POST',
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log("Success:", response);
                    $('#deletemodal').modal('hide');
                    location.reload();
                },
                error: function(error) {
                    console.error("Error:", error);
                }
            });
        });
    });
</script>


@endsection