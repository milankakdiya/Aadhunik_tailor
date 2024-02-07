
@extends('store_admin.index')
@section('content')
<style>
      .edit_input_img{
        width: 100px;
        height: 100px;
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
    .image_notes_card{
        display: flex;
        flex-direction: column !important;
        height: auto !important;
        width: 33.33%;
    }
    .select_img{
        border: 1px solid #000;
    }
    #image_notes_container{
        width: 33.33%;
    }
</style>
    <div class="modal-body">
        <form method="post" id="pent_measurement" enctype="multipart/form-data" action="{{url('asbhsg_vhs_sgbd_dfyucsgdf/'. $data->customer_id)}}">  
                            @csrf
                        <input type="hidden" id="customer_id" name="customer_id" value="{{$data->customer_id}}" >
                    <div class="hader-pants d-flex"> 
                        <div class="w-50">
                            Kurta
                        </div>
                        <div class="w-10">
                            <img src="{{ asset('image/' . $data->customer_image) }}"  width="40px" height="40px"  id="cu-image" class="rounded-circle">
                        
                        </div>
                        <div class="w-30" style="margin-left: 10px;;">
                            <div class="customer_name">Name:- {{$data->customer_name}}</div>
                            <div class="customer">ID:- {{$data->customer_id}}</div>
                        </div>
                    </div> 
                   
                   
                    <div class="card flex-row">
                        <div class="form-check form-check-inline w-30 flex-column align-items-start p-3">
                            <div class="d-flex mb-2 input-custom">
                         
                                <label class="form-check-label" for="cut_belt">Kurta Full</label>
                            </div>
                            <div class="mobile-w-100">
                                <input class="form-control cut-radio" value="{{$data->kurta_full}}" type="text" id="id_cut_belt" name="kurta_full" >
                            </div>
                        </div>
                    
                        <div class="form-check form-check-inline w-30 flex-column align-items-start p-3">
                            <div class="d-flex mb-2 input-custom">
                                <label class="form-check-label" for="long_belt">Kurta Half</label>
                            </div>
                            <div class="mobile-w-100">
                                <input class="form-control cut-redio" value="{{$data->kurta_half}}" type="text" id="id_long_belt" name="kurta_half" >
                            </div>
                        </div>
                    
                    </div> 
                   
                    <div class="card  flex-row">
                    <img src="{{asset('images/Pants/Length.png')}}" class="edit_input_img">
                        <div class="form-check form-check-inline w-100 flex-column align-items-start p-3 justify-content-center">
                            <div class="d-flex align-items-center w-100" >
                                <span class="" style="width: 30%">Length<span class="text-danger">*</span></span>
                                <input type="text" class="form-control" width="100%" placeholder="Enter Measurement" value="{{$data->length_measurement}}" name="length_measurement" >
                                <input type="text" class="form-control ml-3" width="100%" placeholder="Enter Note" value="{{$data->length_notes}}" name="length_notes" >
                            </div>
                        </div>
                        
                    </div> 
                    <div class="card  flex-row">
                    <img src="{{asset('images/Pants/Inside Length.png')}}" class="edit_input_img">
                        <div class="form-check form-check-inline w-100 flex-column align-items-start p-3 justify-content-center">
                            <div class="d-flex align-items-center w-100">
                                <span class="" style="width: 30%">Sleeve length<span class="text-danger">*</span></span>
                                <input type="text" class="form-control" width="100%" placeholder="Enter Measurement" value="{{$data->sleeve_length_measurement}}" name="sleeve_length_measurement" >
                                <input type="text" class="form-control ml-3" width="100%" placeholder="Enter Note" value="{{$data->sleeve_length_notes}}" name="sleeve_length_notes" >
                            </div>
                        </div>
                    
                    </div> 
                    <div class="card  flex-row">
                    <img src="{{asset('images/Pants/Waist.png')}}" class="edit_input_img">
                        <div class="form-check form-check-inline w-100 flex-column align-items-start p-3 justify-content-center">
                            <div class="d-flex align-items-center w-100">
                                <span class="" style="width: 30%">Half Sleeve Length<span class="text-danger">*</span></span>
                                <input type="text" class="form-control" width="100%" placeholder="Enter Measurement" value="{{$data->half_sleeve_length_measurement}}" name="half_sleeve_length_measurement" >
                                <input type="text" class="form-control ml-3" width="100%" placeholder="Enter Note" value="{{$data->half_sleeve_length_notes}}" name="half_sleeve_length_notes" >
                            </div>
                        </div>
                    
                    </div> 
                    <div class="card  flex-row">
                    <img src="{{asset('images/Pants/hips.png')}}" class="edit_input_img">
                        <div class="form-check form-check-inline w-100 flex-column align-items-start p-3 justify-content-center">
                            <div class="d-flex align-items-center w-100">
                                <span class="" style="width: 30%">Biceps<span class="text-danger">*</span></span>
                                <input type="text" class="form-control" width="100%" placeholder="Enter Measurement" value="{{$data->biceps_measurement}}" name="biceps_measurement" >
                                <input type="text" class="form-control ml-3" width="100%" placeholder="Enter Note" value="{{$data->biceps_notes}}" name="biceps_notes" >
                            </div>
                        </div>
                    
                    </div> 
                    <div class="card  flex-row">
                        <img src="{{asset('images/Pants/Crouch(Fly).png')}}" class="edit_input_img">
                        <div class="form-check form-check-inline w-100 flex-column align-items-start p-3 justify-content-center">
                            <div class="d-flex align-items-center w-100">
                                <span class="" style="width: 30%">Forearm<span class="text-danger">*</span></span>
                                <input type="text" class="form-control" width="100%" placeholder="Enter Measurement" value="{{$data->forearm_measurement}}" name="forearm_measurement" >
                                <input type="text" class="form-control ml-3" width="100%" placeholder="Enter Note" value="{{$data->forearm_notes}}" name="forearm_notes" >
                            </div>
                        </div>
                        
                    </div> 
                    <div class="card  flex-row">
                    <img src="{{asset('images/Pants/Thai.png')}}" class="edit_input_img">
                        <div class="form-check form-check-inline w-100 flex-column align-items-start p-3 justify-content-center">
                            <div class="d-flex align-items-center w-100">
                                <span class="" style="width: 30%">Wrist<span class="text-danger">*</span></span>
                                <input type="text" class="form-control" width="100%" placeholder="Enter Measurement" value="{{$data->wrist_measurement}}" name="wrist_measurement" >
                                <input type="text" class="form-control ml-3" width="100%" placeholder="Enter Note" value="{{$data->wrist_notes}}" name="wrist_notes" >
                            </div>
                        </div>
                    
                    </div> 
                    <div class="card  flex-row">
                    <img src="{{asset('images/Pants/Lower Thai.png')}}" class="edit_input_img">
                        <div class="form-check form-check-inline w-100 flex-column align-items-start p-3 justify-content-center">
                            <div class="d-flex align-items-center w-100">
                                <span class="" style="width: 30%">Sholders<span class="text-danger">*</span></span>
                                <input type="text" class="form-control" width="100%" value="{{$data->sholders_measurement}}" placeholder="Enter Measurement" name="sholders_measurement" >
                                <input type="text" class="form-control ml-3" width="100%" placeholder="Enter Note" value="{{$data->sholders_notes}}" name="sholders_notes" >
                            </div>
                        </div>
                    
                    </div> 
                    <div class="card  flex-row">
                    <img src="{{asset('images/Pants/Knee.png')}}" class="edit_input_img">
                        <div class="form-check form-check-inline w-100 flex-column align-items-start p-3 justify-content-center">
                            <div class="d-flex align-items-center w-100">
                                <span class="" style="width: 30%">Chest<span class="text-danger">*</span></span>
                                <input type="text" class="form-control" width="100%" placeholder="Enter Measurement" value="{{$data->chest_measurement}}" name="chest_measurement" >
                                <input type="text" class="form-control ml-3" width="100%" placeholder="Enter Note" value="{{$data->chest_notes}}" name="chest_notes" >
                            </div>
                        </div>
                    
                    </div> 
                    <div class="card  flex-row">
                    <img src="{{asset('images/Pants/Calf.png')}}" class="edit_input_img">
                        <div class="form-check form-check-inline w-100 flex-column align-items-start p-3 justify-content-center">
                            <div class="d-flex align-items-center w-100">
                                <span class="" style="width: 30%">Waist<span class="text-danger">*</span></span>
                                <input type="text" class="form-control" width="100%" placeholder="Enter Measurement" value="{{$data->waist_measurement}}" name="waist_measurement" >
                                <input type="text" class="form-control ml-3" width="100%" placeholder="Enter Note" value="{{$data->waist_notes}}" name="waist_notes" >
                            </div>
                        </div>
                    
                    </div> 
                    <div class="card  flex-row">
                        <img src="{{asset('images/Pants/Bottom.png')}}" class="edit_input_img">
                        <div class="form-check form-check-inline w-100 flex-column align-items-start p-3 justify-content-center">
                            <div class="d-flex align-items-center w-100">
                                <span class="" style="width: 30%">Hips<span class="text-danger">*</span></span>
                                <input type="text" class="form-control" width="100%" value="{{$data->hips_measurement}}" placeholder="Enter Measurement" name="hips_measurement" >
                                <input type="text" class="form-control ml-3" width="100%" value="{{$data->hips_notes}}" placeholder="Enter Note" name="hips_notes" >
                            </div>
                        </div>
                        
                    </div> 
                    <div class="card  flex-row">
                        <img src="{{asset('images/Pants/Bottom.png')}}" class="edit_input_img">
                        <div class="form-check form-check-inline w-100 flex-column align-items-start p-3 justify-content-center">
                            <div class="d-flex align-items-center w-100">
                                <span class="" style="width: 30%">Collar<span class="text-danger">*</span></span>
                                <input type="text" class="form-control" width="100%" value="{{$data->collar_measurement}}" placeholder="Enter Measurement" name="collar_measurement" >
                                <input type="text" class="form-control ml-3" width="100%" value="{{$data->collar_notes}}" placeholder="Enter Note" name="collar_notes" >
                            </div>
                        </div>
                        
                    </div> 
                    <div class="card  flex-row">
                        <img src="{{asset('images/Pants/Bottom.png')}}" class="edit_input_img">
                        <div class="form-check form-check-inline w-100 flex-column align-items-start p-3 justify-content-center">
                            <div class="d-flex align-items-center w-100">
                                <span class="" style="width: 30%">Pocket<span class="text-danger">*</span></span>
                                <input type="text" class="form-control" width="100%" value="{{$data->pocket_measurement}}" placeholder="Enter Measurement" name="pocket_measurement" >
                                <input type="text" class="form-control ml-3" width="100%" value="{{$data->pocket_notes}}" placeholder="Enter Note" name="pocket_notes" >
                            </div>
                        </div>
                        
                    </div> 
                    <div class="card  flex-row">
                        <div class="form-check form-check-inline w-100 flex-column align-items-start p-3 justify-content-center">
                            <div class="d-flex align-items-center w-100" >
                                <span class="" style="width: 14%">Add Notes<span class="text-danger">*</span></span>
                                <textarea type="text"  class="form-control" width="50%" name="add_notes">{{ htmlspecialchars($data->add_notes) }}</textarea>
                            </div>
                        </div>
                    </div> 

                    <div class="d-flex justify-content-between">
                        <div id="image_notes_container" class="d-flex justify-content-center">
                            <div class="card flex-row image_notes_card" style="padding: 1%;">
                                <img src="{{ asset('image/' . $data->image_1) }}" alt="" class="w-100" data-image_1='{{$data->image_1}}' style="height:100%;display:none">
                                
                                <div class="uplode_pic_view append_1" style="display: inline-block;"></div>
                                <div class="d-flex" style="flex-direction: column; width: 50%;">
                                    <label for="append_1" class="btn select_img" style="margin-top: 10px;">Select Image</label>
                                    <input id="append_1" class="images_1" style="visibility:hidden; position: absolute;" type="file" name="images_1">
                                </div>
                                <textarea name="image_notes_1" placeholder="Enter Image Notes"   style="width: 245px;"> {{ htmlspecialchars($data->image_1_notes) }}</textarea>
                            </div>
                        </div>
                        <div id="image_notes_container" class="d-flex justify-content-center">
                            <div class="card flex-row image_notes_card" style="padding: 1%;">
                                <div class="uplode_pic_view append_2" style="display: inline-block;"></div>
                                <div class="d-flex" style="flex-direction: column; width: 50%;">
                                    <label for="append_2" class="btn select_img" style="margin-top: 10px;">Select Image</label>
                                    <input id="append_2" style="visibility:hidden; position: absolute;" type="file"  name="images_2">
                                </div>
                                <textarea name="image_notes_2" placeholder="Enter Image Notes"  style="width: 245px;">{{ htmlspecialchars($data->image_2_notes) }}</textarea>
                            </div>
                        </div>
                        <div id="image_notes_container" class="d-flex justify-content-center">
                            <div class="card flex-row image_notes_card" style="padding: 1%;">
                                <div class="uplode_pic_view append_3" style="display: inline-block;"></div>
                         
                                <div class="d-flex" style="flex-direction: column; width: 50%;">
                                    <label for="append_3" class="btn select_img" style="margin-top: 10px;">Select Image</label>
                                    <input id="append_3" style="visibility:hidden; position: absolute;" type="file"  name="images_3">
                                </div>
                                <textarea name="image_notes_3" placeholder="Enter Image Notes" style="width: 245px;"> {{ htmlspecialchars($data->image_3_notes) }} </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div id="image_notes_container" class="d-flex justify-content-center">
                            <div class="card flex-row image_notes_card" style="padding: 1%;">
                            <img src="{{ asset('image/' . $data->image_1) }}" alt="" class="w-100"  style="height:100%;display:none">

                                <div class="uplode_pic_view append_4" style="display: inline-block;"> </div>

                                <div class="d-flex" style="flex-direction: column; width: 50%;">
                                    <label for="append_4" class="btn select_img" style="margin-top: 10px;">Select Image</label>
                                    <input id="append_4" class="images_4" style="visibility:hidden; position: absolute;" type="file"  name="images_4">
                                </div>
                                <textarea name="image_notes_4" placeholder="Enter Image Notes" style="width: 245px;"> {{ htmlspecialchars($data->image_4_notes) }} </textarea>
                            </div>
                        </div>
                        <div id="image_notes_container" class="d-flex justify-content-center">
                            <div class="card flex-row image_notes_card" style="padding: 1%;">
                                <div class="uplode_pic_view append_5" style="display: inline-block;"></div>
                                <div class="d-flex" style="flex-direction: column; width: 50%;">
                                    <label for="append_5" class="btn select_img" style="margin-top: 10px;">Select Image</label>
                                    <input id="append_5" style="visibility:hidden; position: absolute;" type="file"  name="images_5">
                                </div>
                                <textarea name="image_notes_5" placeholder="Enter Image Notes"  style="width: 245px;"> {{ htmlspecialchars($data->image_5_notes) }} </textarea>
                            </div>
                        </div>
                        <div id="image_notes_container" class="d-flex justify-content-center">
                            <div class="card flex-row image_notes_card" style="padding: 1%;">
                                <div class="uplode_pic_view append_6" style="display: inline-block;"></div>
                         
                                <div class="d-flex" style="flex-direction: column; width: 50%;">
                                    <label for="append_6" class="btn select_img" style="margin-top: 10px;">Select Image</label>
                                    <input id="append_6" style="visibility:hidden; position: absolute;" type="file"  name="images_6">
                                </div>
                                <textarea name="image_notes_6" placeholder="Enter Image Notes" style="width: 245px;"> {{ htmlspecialchars($data->image_6_notes) }} </textarea>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div style="text-align: center">
                        <button class="btn justify save-progress" style="background-color: #5ac1b0;">
                            Save progress
                        </button>
                    </div>
              
        </form>
    </div>
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
                        console.log('File loaded:', file.name);
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
        handleFileInputChange('append_1', '.append_1');
        handleFileInputChange('append_2', '.append_2');
        handleFileInputChange('append_3', '.append_3');
        handleFileInputChange('append_4', '.append_4');
        handleFileInputChange('append_5', '.append_5');
        handleFileInputChange('append_6', '.append_6');
    }); 
   
</script>
<script> 
    $("#append_1").change(function() {
      filename = this.files[0].name;
    });
    $("#append_2").change(function() {
      filename = this.files[0].name;
    });
    $("#append_3").change(function() {
      filename = this.files[0].name;
    });
    $("#append_4").change(function() {
      filename = this.files[0].name;
    });
    $("#append_5").change(function() {
      filename = this.files[0].name;
    });
    $("#append_6").change(function() {
      filename = this.files[0].name;
    });
</script> 
@endsection