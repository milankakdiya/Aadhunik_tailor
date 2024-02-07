
@extends('store_admin.index')
@section('content')

{{-- mobile flage and country code selected script --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
 
<style>
    .employee{
        border-radius: 13px 5px;
        background: #2b2c30;
        color: white;
        border: none;
        height: 38px;
        width: auto !important;
        position: relative;
        margin-bottom: 10px;
    }
    .dataTables_wrapper{
        padding: 20px;
    }
    #front{
        width: 42%;
    }
    #back{
        width: 42%
    }
    #side{
        width: 42%
    }
    @media (min-width: 768px) and (max-width: 991px){
        .employee {
            width: auto !important; 
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
            width: auto !important; 
        }
        .modal-dialog{
            max-width: 500px;
        }
        #image{
            width: 44%;
        }
    }
    .profile_pic input{
        width: 70%;

    }
    #image_notes_container{
        display: flex;
        align-items: center;
        margin-bottom: 50px;
        margin-top: -5px;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    .uplode_pic_view{
        margin-top: 20px;
    } 
    #image_notes_container .card.flex-row{
        padding: 1%;
        margin-bottom: 0;
        height: 100px;
        width: 85%;
        align-items: center;
        margin-top: 20px;
    }
    .edit_input_img{
        width: 100px;
        height: 100px;
    }
  
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-eJqV9zdL8BPOld5+648jsl9IX7IScQ8mWwr7IzL0fEN1Rx6CK+BZ/GwOxiHwDUpz" crossorigin="anonymous"></script>

<div style="display: flex; justify-content: space-between;">
    <h4 style="color: black">Customer List</h4>
    <button class="employee"><i class="fa fa-plus" aria-hidden="true"></i> Add Customer</button>
</div>

<div class="card">
    <div class="table-responsive text-nowrap">
        <table id="example" class="display nowrap" style="width:100%;background-color:#bdbfcb">
            <thead>
                <tr>
                    <th>No</th>
                    <th>CID</th>
                    <th>NAME</th>
                    <th>Phone Number</th>
                    <th>Front Image</th>
                    <th>Back Image</th>
                    <th>Side Image</th>
                    <th>Notes</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
            
                    <tr>
                        <td>{{$loop->index + 1 }}</td>
                        <td>{{$item->customer_id}}</td>
                        <td>{{$item->customer_name}}</td>
                        <td>{{$item->customer_number}}</td>
              
                        <td>
                          @if($item->front_image != null)
                            <a data-bs-toggle="modal" data-bs-target="#modal{{ $item->id }}i_front"><img
                                    src="{{ asset('image/' . $item->front_image) }}"
                                    style="width: 50px; height: 50px; border-radius: 50%; overflow: hidden;">
                            </a>
                            <div class="modal fade" id="modal{{ $item->id }}i_front">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="margin-left: auto;margin-right: auto;width:50%">
                                        <div class="modal-body">
                                            <div class="input-group mb-3"
                                                style="justify-content: center;">
                                                <img src="{{ asset('image/' . $item->front_image) }}"
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
                        <td>
                          @if($item->back_image != null)
                            <a data-bs-toggle="modal" data-bs-target="#modal{{ $item->id }}i_back"><img
                                    src="{{ asset('image/' . $item->back_image) }}"
                                    style="width: 50px; height: 50px; border-radius: 50%; overflow: hidden;">
                            </a>
                            <div class="modal fade" id="modal{{ $item->id }}i_back">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="margin-left: auto;margin-right: auto;width:50%">
                                        <div class="modal-body">
                                            <div class="input-group mb-3"
                                                style="justify-content: center;">
                                                <img src="{{ asset('image/' . $item->back_image) }}"
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
                        <td>
                          @if($item->side_image != null)
                            <a data-bs-toggle="modal" data-bs-target="#modal{{ $item->id }}i_side"><img
                                    src="{{ asset('image/' . $item->side_image) }}"
                                    style="width: 50px; height: 50px; border-radius: 50%; overflow: hidden;">
                            </a>
                            <div class="modal fade" id="modal{{ $item->id }}i_side">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="margin-left: auto;margin-right: auto;width:50%">
                                        <div class="modal-body">
                                            <div class="input-group mb-3"
                                                style="justify-content: center;">
                                                <img src="{{ asset('image/' . $item->side_image) }}"
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
                        <td>{{$item->notes}}</td>
                        <td>
                            <a href="#" class="delete" data-id='{{$item->id}}'>
                                <i class="fa fa-trash" style="font-size:24px;color:red"  aria-hidden="true"></i>
                            </a>
                            <a href="#" class="edit" data-id='{{$item->id}}' data-customer_id='{{$item->customer_id}}' data-customer_name='{{$item->customer_name}}' data-customer_number='{{$item->customer_number}}' data-notes='{{$item->notes}}'
                                                    data-front_image='{{$item->front_image}}' data-back_image='{{$item->back_image}}' data-side_image='{{$item->side_image}}'>
                                <i class="fa fa-edit" style="font-size:24px;color:#36a50b"></i>
                            </a>

                            <a  href="{{ route('storeadmin.measurement_list', ['customer_id' => $item->customer_id])}}" >
                                 <i class="fa fa-pencil" style="font-size: 30px; color:#564ec1; cursor:pointer;"></i>
                            </a>
                         
                        </td>  
                    </tr>
                @endforeach                         
            </tbody>
        </table>
    </div>
</div>

<!-- add customer  -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #bdbfcb">
                <h5 class="modal-title" id="myModalLabel">Add New Customer</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="new_form_close"> 
            <span aria-hidden="true">&times;</span>
          </button>
            </div>
            <div class="modal-body">
                <form action="customer_store" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="add_store_con">
                        <div class="w-50">
                            <div class="row mt-3">
                                <strong>Customer_id<span class="text-danger">*</span></strong>
                                <input type="text" class="form-control" placeholder="Enter Name" value="{{Auth::user()->store_access}}-{{ $customer_id->id + 1 }}" name="customer_id" required readonly onfocus="this.blur()" />
                                    
                            </div>
                            <div class="row mt-3">
                                <strong>Name<span class="text-danger">*</span></strong>
                                <input type="text" class="form-control" placeholder="Enter Name" name="customer_name" required/>
                                    
                            </div>
                            <div class="row mt-3">
                                <strong>Phone Number<span class="text-danger">*</span></strong>
                                <input type="tex" class="form-control" placeholder="Enter Number" name="customer_number[main]" id="phone_number" minlength="10" maxlength="10"  required/>        
                            </div>
                          
                        </div>
                        <div style="display: flex; align-items: center;padding: 0px 100px;" >
                            <div class="profile_pic w-50">
                                <label for="img">Front Image<span class="text-danger">*</span></label>
                                <span class="uplode_pic_view front_image"></span>
                                <input type="file" name="front_image" id="front_image">
                            </div>
                            <div class="profile_pic w-50">
                                <label for="img">Back Image<span class="text-danger">*</span></label>
                                <span class="uplode_pic_view back_image"></span>
                                <input type="file" name="back_image" id="back_image">
                            </div>
                            <div class="profile_pic w-50">
                                <label for="img">Side Image<span class="text-danger">*</span></label>
                                <span class="uplode_pic_view side_image"></span>
                                <input type="file" name="side_image" id="side_image">
                            </div>
                        </div>
                    </div>

                    <hr size="8" width="100%" color="green">  

                    <div class="row mt-3"> 
                         <strong>Notes</strong>
                         <textarea name="notes"  class="form-control"></textarea>
                    </div>
                   
                    <div class="mt-3" style="text-align: center">
                        <button type="submit"
                            class="text-white p-2 border-0 rounded px-3 fw-bold send_inquiry_btn" style="background-color: #5ac1b0;width: 15%;">Submit</button>
                    </div>
                 <br><br>
                </form>
            </div>
        </div>
    </div>
</div>

  <!-- edit customer  -->
<div class="modal fade" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #bdbfcb">
                <h5 class="modal-title" id="myModalLabel">Add New Store</h5>
               <button type="button" id="edit_close" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            </div>
            <div class="modal-body">
                <form action="customer_edit" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="base_url" value="{{ asset('/image') }}">
                    @csrf
                    <div class="add_store_con">
                        <div class="w-50">
                            <div class="row mt-3">
                                <strong>Customer Id<span class="text-danger">*</span></strong>
                                <input type="text" class="form-control"  placeholder="Enter Name" id="edit_customer_id" name="customer_id" required readonly onfocus="this.blur()" />
                                    
                            </div>
                            <div class="row mt-3">
                                <strong>Name<span class="text-danger">*</span></strong>
                                <input type="text" class="form-control"  placeholder="Enter Name" id="customer_name" name="customer_name" required/>
                                    
                            </div>
                            <div class="row mt-3">
                                <strong>Phone Number<span class="text-danger">*</span></strong>
                                <input type="tex" class="form-control" minlength="10" maxlength="10"  placeholder="Enter Number" name="mobile_number[main]" id="mobile_number"  required />        
                            </div>
                          
                        </div>
                        <div class="" style="display: flex; align-items: center;padding: 0px 100px;" >
                            <div class="profile_pic w-50">
                                <label for="img">Front Image</label>
                                <span class="uplode_pic_view editfront_image" id="show_front_image"></span>
                                <input type="file" name="front_image" id="editfront_image">
                            </div>
                            <div class="profile_pic w-50">
                                <label for="img">Back Image</label>
                                <span class="uplode_pic_view editback_image" id="show_back_image"></span>
                                <input type="file" name="back_image" id="editback_image">
                            </div>
                            <div class="profile_pic w-50">
                                <label for="img">Side Image</label>
                                <span class="uplode_pic_view editside_image" id="show_side_image"></span>
                                <input type="file" name="side_image" id="editside_image">
                            </div>
                        </div>
                    </div>

                    <hr size="8" width="100%" color="green">  
                    <div class="row mt-3"> 
                         <strong>Notes</strong>
                         <textarea name="notes" id="notes" class="form-control"></textarea>
                    </div>
                   
                    <div class="mt-3" style="text-align: center">
                        <button type="submit"
                            class="text-white p-2 border-0 rounded px-3 fw-bold send_inquiry_btn" style="background-color: #5ac1b0;width: 15%;">Update</button>
                    </div>
               
                </form>
            </div>
        </div>
    </div>
</div>
<!--customer Delete Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 30%;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #dfe8eb">
                <h5 class="modal-title" id="myModalLabel">Delete Customer</h5>
            </div>
            <div class="modal-body">
                <h5 class="text-center" style="margin-right: 8%;">Are you sure you want to delete Customer?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    style="background-color:#356a7f " id="delete_close">Close</button>
                <button type="button"  id="deletemember" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>


<script>
        var i = 0;
    function addImageNoteFields() {
        i = i + 1;
            var container = document.getElementById("image_notes_container");
            var newDiv = document.createElement("div");
            newDiv.className = "card flex-row";
            newDiv.style = "padding:1%;";

            var newInput = document.createElement("input");
            newInput.type = "file";
            newInput.name = "images_" + i;
            newInput.accept = "image/*";
            newInput.style = "padding: 1%;";
            newInput.id = "append_" + i;
            newInput.multiple = true;
            newInput.required = true;

            
            var newTextArea = document.createElement("textarea");
            newTextArea.type = "text";
            newTextArea.name = "image_notes_" + i;
            newTextArea.placeholder = "Enter Image Notes";
            newTextArea.required = true;

            var spanElement = document.createElement("div");
            spanElement.className = "uplode_pic_view append_" + i;
            spanElement.style = "display: inline-block; margin-left: 10px;"; // Add this line

            newDiv.appendChild(newInput);
            newDiv.appendChild(newTextArea);
            container.appendChild(newDiv);
            container.appendChild(spanElement);

            handleFileInputChange("append_" + i, ".uplode_pic_view.append_" + i);
    
        
    } 

    $(document).ready(function () {
        $('#example').DataTable();
    });

    // --add store--
    $(document).on('click', '.employee', function(event){
        event.preventDefault(); 
        $('#exampleModalCenter').modal('show');
    });

    $(document).on('click', '.measurment_list_close', function(event){
        event.preventDefault(); 
        $('.mesurmant_list').modal('hide');
    });
    
    $(document).on('click', '#edit_close', function(event){
        event.preventDefault(); 
        $('#editmodel').modal('hide');
    });

    $(document).on('click', '#delete_close', function(event){
        event.preventDefault(); 
        $('#deletemodal').modal('hide');
    });

    $(document).on('click', '#new_form_close', function(event){
        event.preventDefault(); 
        $('#exampleModalCenter').modal('hide');
    });
    

    $(document).on('click', '.direct', function(event){
        event.preventDefault(); 
        var id = $(this).data('customer_id');
        var name = $(this).data('name');
        var image = $(this).data('image');
        var baseUrl = $('#base_url').val();
        var frontUrl = baseUrl + '/' + image ;
        $('#measurementModalCenter').modal('show');
        $('.customer_name').text(name);
        $('.customer').text(id);
        $('#customer_id').val(id);
        $('#cu-image').attr('src', frontUrl);
    });

   

    var phone_number = window.intlTelInput(document.querySelector("#phone_number"), {
        separateDialCode: true,
        preferredCountries: ["in"],
        utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
    });

    $("form").submit(function() {
            var full_number = phone_number.getNumber();
            $("input[name='customer_number[main]'").val(full_number);

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
    function handleFileInputChange(inputId, previewClass) {
    var input = document.getElementById(inputId);
    var preview = document.querySelector(previewClass);

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

    // Call the function for each file input when the DOM is ready
    document.addEventListener('DOMContentLoaded', function () {
        handleFileInputChange('front_image', '.front_image');
        handleFileInputChange('back_image', '.back_image');
        handleFileInputChange('side_image', '.side_image');
        handleFileInputChange('editfront_image', '.editfront_image');
        handleFileInputChange('editback_image', '.editback_image');
        handleFileInputChange('editside_image', '.editside_image');
        handleFileInputChange('front', '.front');
        handleFileInputChange('back', '.back');
        handleFileInputChange('side', '.side');
    }); 

    $('body').on('click', '.input-custom', function(){
        var x = $(this).parents('.card.flex-row').children('.p-3');
        $(x).each(function(i,v){
            $(this).children('.mobile-w-100').children('input').css("display", 'none');
        });
        if ($(this).children('input:checked')) {
            $(this).siblings('.mobile-w-100').children('input').css("display", 'block');
        } 
    });
</script>

<script>
    $(document).on('click','.edit', function(event){
        event.preventDefault(); 
        var id = $(this).data('id');
        var edit_customer_id = $(this).data('customer_id');
        var customer_name = $(this).data('customer_name');
        var customer_number = $(this).data('customer_number');
        var front_image = $(this).data('front_image');
        var back_image = $(this).data('back_image');
        var side_image = $(this).data('side_image');
        var notes = $(this).data('notes');
        var baseUrl = $('#base_url').val();
        var frontUrl = baseUrl + '/' + front_image ;
        var backUrl = baseUrl + '/' + back_image ;
        var sideUrl = baseUrl + '/' + side_image ;

        var truncatedPhoneNumber = String(customer_number).substring(3);

        $('#editmodel').modal('show');
        $('#edit_customer_id').val(edit_customer_id);
        $('#customer_name').val(customer_name); 
        $('#mobile_number').val(truncatedPhoneNumber);
        $('#notes').val(notes);
        $('#show_front_image').attr('style', 'background-image: url(' + frontUrl + '); background-size: cover; background-position: center center;');
        $('#show_back_image').attr('style', 'background-image: url(' + backUrl + '); background-size: cover; background-position: center center;');
        $('#show_side_image').attr('style', 'background-image: url(' + sideUrl + '); background-size: cover; background-position: center center;');
        $('#id').val(id);

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
        $.post("{{ url('customer_delete') }}", {
            id: id,
            _token: "{{ csrf_token() }}"
        }, function() {
            $('#deletemodal').modal('hide');
            location.reload();
        });
    });
</script>


@endsection