@extends('super_admin.index')
@section('content')
    {{-- mobile flage and country code selected script --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>

    {{-- fa fa icon sacript  --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" /> --}}

    <!-- Bootstrap CSS -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->

<!-- Bootstrap JS (Popper.js and Bootstrap JS) -->
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script> -->
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
        <h4 style="color: black">User List</h4>
        <button class="employee"><i class="fa fa-plus" aria-hidden="true"></i> Add user</button>
    </div>

    <div class="card">
        <div class="table-responsive text-nowrap">
            <table id="example" class="display nowrap" style="width:100%;background-color:#bdbfcb">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>UID</th>
                        <th>NAME</th>
                        <th>Profile Image</th>
                        <th>MobileNo.</th>
                        <th>Store Access</th>
                        <th>Role</th>
                        <th>Additional Information</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($data as $item)
           
                    <tr>
                        <td> {{ $loop->index + 1 }}</td>
                        <td>{{$item->user_id}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                                    <a data-bs-toggle="modal" data-bs-target="#modal{{ $item->id }}i"><img
                                            src="{{ asset('profile_image/' . $item->profile_image) }}"
                                            style="height: 50px;width: 80px;cursor: pointer;">
                                    </a>
                                    <div class="modal fade" id="modal{{ $item->id }}i">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="margin-left: auto;margin-right: auto;width:50%">
                                                <div class="modal-body">
                                                    <div class="input-group mb-3"
                                                        style="justify-content: center;">
                                                        <img src="{{ asset('profile_image/' . $item->profile_image) }}"
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
                        <td>{{$item->phone_number}}</td>
                        <td>{{$item->store_access}}</td>
                        <td>
                              @if($item->role == 1)
                              Super Admin
                              @elseif($item->role == 2)
                              Store Admin
                              @elseif($item->role == 3)
                                Factory Admin
                              @endif
                        </td>
                        <td>{{$item->add}}</td>
                        
                        <td>
                            <a href="#" class="delete" data-id='{{$item->id}}'>
                                <i class="fa fa-trash" style="font-size:24px;color:red"  aria-hidden="true"></i>
                            </a>
                            <a href="#" class="edit" data-id='{{$item->id}}' data-name='{{$item->name}}' data-role='{{$item->role}}' data-profile_image='{{$item->profile_image}}' data-phone_number='  {{$item->phone_number}}' data-store_access='{{$item->store_access}}' data-add='{{$item->add}}' data-user_id='{{$item->user_id}}'> 
                                <i class="fa fa-edit" style="font-size:24px;color:#36a50b"></i>
                            </a>
                            {{-- user lock fa-unlock- --}}
                            @if($item->is_lock == 0)
                            <a href="#" class="lock" data-id='{{$item->id}}' data-is_lock='{{$item->is_lock}}'>
                                <i class="fa fa-unlock-alt" style="font-size: 24px;color:#163048"></i>
                            </a>
                            @else
                            <a href="#" class="lock" data-id='{{$item->id}}' data-is_lock='{{$item->is_lock}}'>
                                <i class="fa fa-lock"style="font-size: 24px;color:#163048"></i>
                            </a>
                            @endif

                             {{-- user change password --}}
                            <a href="#" class="editpassword" data-id='{{$item->id}}' data-password='{{$item->password}}'>
                                <i class="fa fa-key" style="font-size:24px;color:#7a57ff"></i>
                            </a>
                        </td>
                
                    </tr>
                @endforeach  
                </tbody>
            </table>
        </div>
    </div>
<!-- add user   -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #bdbfcb">
                <h5 class="modal-title" id="myModalLabel">Add User</h5>
                <button type="button" class="close add_user_close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="user_store" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="add_store_con">
                        <div class="w-50">
                            <div class="row mt-3">
                                <strong>Name<span class="text-danger">*</span></strong>
                                <input type="text" class="form-control" placeholder="Enter User Name"
                                    name="name" required />

                            </div>
                            <div class="row mt-3">
                                <strong>Password<span class="text-danger">*</span></strong>
                                <input type="password" placeholder="Enter Password" class="form-control" name="password" required/>
                            </div>
                            <div class="row mt-3">
                                <strong>Phone Number<span class="text-danger">*</span></strong>
                                <input type="tex" class="form-control" placeholder="Enter Number" minlength="10" maxlength="10" name="phone_number[main]" id="phone_number" required/>
                            </div>
                            <div style="add-new-con">
                                <div class="row mt-3">
                                    <input type="checkbox"  name="role" value="3">
                                    <strong class="ml-2">Factory Access</strong>
                                </div>
                                <div class="row mt-3">
                                    <input type="checkbox"  name="role" value="2">
                                    <strong class="ml-2">Store Access</strong>
                                    <input type="text" class="form-control ml-2 w-auto" id="store_access" >
                                </div>
                                <div class="row mt-3">
                                    <input type="checkbox" name="role" value="1">
                                    <strong class="ml-2">Super Admin Access</strong>
                                </div>
                            </div>
                            {{-- popup start --}}
                            <div class="nestedpopup">
                                <div class="popup-window">
                                    <div class="popup-box">
                                        <div class="closed-it">
                                            <span class="close-menu"><i class="fa fa-close" style="font-size:24px"></i></span>
                                        </div>
                                        @foreach ($store as $index => $item)
                                        
                                            @if ($index % 3 == 0)
                                                <div class="checkbox-row">
                                            @endif
                            
                                            <strong>
                                                <input type="checkbox" name="store_access[]" value="{{$item->store_code}}">
                                                <span>{{$item->name}}</span>
                                            </strong>
                            
                                            @if (($index + 1) % 3 == 0 || $index + 1 == count($store))
                                                </div>
                                            @endif
                                        @endforeach
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="profile_pic w-50">
                            <label for="img">Profile Image<span class="text-danger">*</span></label>
                            <span class="uplode_pic_view"></span>
                            <input type="file" name="profile_image" id="image" accept="image/*" required>
                        </div>
                    </div>

                    <hr size="8" width="100%" color="green">

                    <div class="row mt-3">
                        <strong>Address</strong>
                        <textarea name="add" class="form-control" required></textarea>
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
<!-- edit user  -->
<div class="modal fade" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #bdbfcb">
                <h5 class="modal-title" id="myModalLabel">Edit User</h5>
                <button type="button" class="close edit_user_close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="user_edit" method="post"  enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="base_url" value="{{ asset('/profile_image') }}">
                    @csrf
                    <div class="add_store_con">
                        <div class="w-50">

                            <div class="row mt-3">
                                <strong>User Id<span class="text-danger">*</span></strong>
                                <input type="text" class="form-control" id="user_id" readonly />

                            </div> 
                            <div class="row mt-3">
                                <strong>Name<span class="text-danger">*</span></strong>
                                <input type="text" class="form-control" placeholder="Enter User Name" id="name"
                                    name="name" required />

                            </div> 
                            <div class="row mt-3">
                                <strong>Phone Number<span class="text-danger">*</span></strong>
                                <input type="tex" class="form-control" placeholder="Enter Number" minlength="10" maxlength="10"
                                    name="mobile_number[main]" id="mobile_number" required/>
                            </div>
                            
                            <div style="add-new-con">
                                <div class="row mt-3">
                                <input type="checkbox"  name="role" id="factory_access" value="3">
                                    <strong class="ml-2">Factory Access</strong>
                                </div>
                                <div class="row mt-3">
                                <input type="checkbox" id="store_acess_checed"  name="role" value="2">
                                    <strong class="ml-2">Store Access</strong>
                                    <input type="text" class="form-control ml-2 w-auto" id="stor_access" >
                                </div>
                                <div class="row mt-3">
                                    <input type="checkbox" name="role" id="super_admin_access" value="1">
                                    <strong class="ml-2">Super Admin Access</strong>
                                </div>
                            </div>
                            {{-- popup start --}}
                            <div class="nestedpopup">
                                <div class="popup-window popup2">
                                    <div class="popup-box">
                                        <div class="closed-it">
                                            <span class="close-menu close"><i class="fa fa-close" style="font-size:24px"></i></span>
                                        </div>
                                        @foreach ($store as $index => $item)
                                        
                                            @if ($index % 3 == 0)
                                                <div class="checkbox-row">
                                            @endif 

                                            <strong>
                                                <input type="checkbox" name="store_access[]"  value="{{$item->store_code}}">
                                                <span>{{$item->name}}</span>
                                            </strong>
                            
                                            @if (($index + 1) % 3 == 0 || $index + 1 == count($store))
                                                </div>
                                            @endif
                                        @endforeach
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profile_pic w-50">
                            <label for="img">Profile Image<span class="text-danger">*</span></label>
                            <span class="uplode_pic_view" id="show_image"></span>
                            <input type="file" name="image" id="edit_image" accept="image/*">
                        </div>
                    </div>

                    <hr size="8" width="100%" color="green">

                    <div class="row mt-3">
                        <strong>Additional Information</strong>
                        <textarea name="add" class="form-control" id="add"> </textarea>
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

<!--user Delete Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog" style="max-width: 30%;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #bdbfcb">
                <h5 class="modal-title" id="myModalLabel">Delete User</h5>
                <button type="button" class="close user_delete_close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
                <h5 class="text-center" style="margin-right: 8%;">Are you sure you want to Delete User?</h5>
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
<!-- Edit user password Modal -->
<div class="modal fade" id="passwordeditmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 30%;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #bdbfcb">
                <h5 class="modal-title" id="myModalLabel">Change Password</h5>
                <button type="button" class="close change_pass_close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
                <form action="change_passowed" method="post" id="password" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="pass_id" name="id">
                    
                    <div class="row mt-3">
                        <div class="col-md-6 form-group">
                            <strong>Password<span class="text-danger">*</span></strong>
                            <input type="password" class="form-control" name="password" id="emp_password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="basic-default-password2" required/>
                            
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <strong>Confirm Password <span class="text-danger">*</span></strong>
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="basic-default-password2" required/>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="text-white p-2 border-0 rounded px-3 fw-bold send_inquiry_btn" style="background-color: #16ae71;">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <!--user lock  Modal -->
<div class="modal fade" id="lockemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-hidden="true">
    <div class="modal-dialog" style="max-width: 30%;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #bdbfcb">
                <h5 class="modal-title" id="myModalLabel">Lock User</h5>
                <button type="button" class="close lock_user_close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
                <h5 class="text-center" style="margin-right: 8%;">Are you sure you want to Lock User?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    style="background-color:#356a7f ">NO</button>
                <button type="button" id="lockemember" class="btn btn-danger">YES</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--user Unlock  Modal -->
<div class="modal fade" id="unlockemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-hidden="true">
    <div class="modal-dialog" style="max-width: 30%;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #bdbfcb">
                <h5 class="modal-title" id="myModalLabel">Un-Lock User</h5>
                <button type="button" class="close un_lock_user_lock" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
                <h5 class="text-center" style="margin-right: 8%;">Are you sure you want to Un-Lock User?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    style="background-color:#356a7f ">NO</button>
                <button type="button" id="unlockemember" class="btn btn-danger">YES</button>
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
                $("input[name='mobile_number[main]'").val(full_number);

        });
     
        // start js
        $('body').on('click','#store_access', function(){
            $('.popup-window').css('display',"block");
        });
        $('body').on('click','.close-menu', function(){
            $('.popup-window').css('display',"none");
        });
        $('body').on('click','#stor_access', function(){
            $('.popup2').css('display',"block");
        });
        $('body').on('click','.close', function(){
            $('.popup2').css('display',"none");
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
            $("#super_admin_access").prop("checked", false);
            $("#store_acess_checed").prop("checked", false);
            $("#factory_access").prop("checked", false);

            var id = $(this).data('id');
            var role = $(this).data('role');
            var store_access = $(this).data('store_access').toString();
            var name = $(this).data('name');
            var phone_number = $(this).data('phone_number');
            var image = $(this).data('profile_image');
            var add = $(this).data('add');
            var user_id = $(this).data('user_id');
            var baseUrl = $('#base_url').val();
            var fileUrl = baseUrl + '/' + image;

            $('#editmodel').modal('show');   
            $('#name').val(name);
            $('#add').val(add);
            $('#user_id').val(user_id);
            $('#mobile_number').val(phone_number);
            $('#show_image').attr('style', 'background-image: url(' + fileUrl + '); background-size: cover; background-position: center center;');
            $('#id').val(id);

            if (role == 1) {
                $("#super_admin_access").prop("checked", true);
            } else if (role == 2) {
                $("#store_acess_checed").prop("checked", true);
            } else if (role == 3) {
                $("#factory_access").prop("checked", true);
            }

            var rolesArray = store_access.split(',');
            rolesArray.forEach(function(roleId) {
                $("input[name='store_access[]'][value='" + roleId + "']").prop("checked", true);
            });
        });
             
        $(document).on('click','.add_user_close', function(event){
            event.preventDefault();
            $('#exampleModalCenter').modal('hide');

        })
        $(document).on('click','.edit_user_close', function(event){
            event.preventDefault();
            $('#editmodel').modal('hide');

        })
        $(document).on('click','.user_delete_close', function(event){
            event.preventDefault();
            $('#deletemodal').modal('hide');

        })
        
        $(document).on('click','.change_pass_close', function(event){
            event.preventDefault();
            $('#passwordeditmodal').modal('hide');

        })
        $(document).on('click','.lock_user_close', function(event){
            event.preventDefault();
            $('#lockemodal').modal('hide');

        })
        $(document).on('click','.un_lock_user_lock', function(event){
            event.preventDefault();
            $('#unlockemodal').modal('hide');

        })
        $(document).on('click','.lock', function(event){
            event.preventDefault();
            var id = $(this).data('id');
            var is_lock = $(this).data('is_lock');
                console.log(is_lock);
            if(is_lock == 0){
                $('#lockemodal').modal('show');
            }else{
                $('#unlockemodal').modal('show');
            }
        
            $('#lockemember').val(id);
            $('#unlockemember').val(id);

        });

        $('#lockemember').click(function() {
            var id = $(this).val();
            $.post("{{ URL::to('user_lock') }}", {
                    id: id
                },
                function() {
                    $('#lockemodal').modal('hide');
                    $('#unlockemodal').modal('hide');
                    location.reload();
                })
        });
        $('#unlockemember').click(function() {
            var id = $(this).val();
            $.post("{{ URL::to('user_lock') }}", {
                    id: id
                },
                function() {
                    $('#unlockemodal').modal('hide');
                    location.reload();
                })
        });
        
        $(document).on('click', '.editpassword', function(event){
            event.preventDefault();
            var id = $(this).data('id');
            console.log(id);
            var password = $(this).data('emp_password');
            $('#passwordeditmodal').modal('show');
            $('#pass_id').val(id);
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
            
            $.ajax({
                url: "{{ url('user_delete') }}",
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
        $(document).ready(function () {
            $("#password").submit(function (event) {
                // Get the values of the password fields
                var password = $("#emp_password").val();
                var confirmedPassword = $("#confirm_password").val();
                
                if (password !== confirmedPassword) {
                    event.preventDefault();
                    alert("Passwords do not match. Please enter matching passwords.");
                }
            });
        });
    });
</script>
@endsection
