<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;
use Illuminate\Support\Facades\DB;

class factoryadminController extends Controller
{ 

  public function index()
  {
    return view('factory_admin.index');

  }
   
  public function dashboards()
  {
    return view('factory_admin.dashboards');
  }

  public function factory()
  {
      $data = DB::table('employees')->where('is_delete', 0)->get();
      return view('factory_admin.addemployee', compact('data'));
  }

  public function factory_store(Request $request)
  {

      $request->validate([
        'emp_name' => 'required',
        'emp_number' => 'required',
        'notes' => 'required',
        'emp_profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the allowed file types and size
      ]);

       $data = new  employee;
       $data->emp_name = $request->emp_name;
       $data->emp_number = $request->emp_number['main'];
       $data->notes  = $request->notes;
       $data->emp_role = is_array($request->emp_role) ? implode(",", $request->emp_role) : null;

        $emp_profile_image = 'lv_' . rand() . '.' . $request->emp_profile_image->extension();
        $request->emp_profile_image->move(public_path('profile_image/'), $emp_profile_image);

        $data->emp_profile_image = $emp_profile_image;

       $data->save();
        $number = $request->emp_number['main'];
        $phone_number = substr($number, 8);
        $data->emp_id = $phone_number . '-'. $data->id;

        $data->update();
       return redirect()->back();
     
  }

  public function factory_edit(Request $request)
  {
      $id = $request->id;

      $data = employee::find($id);
      $data->emp_name = $request->name;
      $data->emp_number = $request->mobile_number['main'];
      $data->notes = $request->notes;
      $data->emp_role = is_array($request->emp_role) ? implode(",", $request->emp_role) : null;
 
      if($request->emp_profile_image){
          $emp_profile_image = 'lv_' . rand() . '.' . $request->emp_profile_image->extension();
          $request->emp_profile_image->move(public_path('profile_image/'), $emp_profile_image);
      }


      $data->emp_profile_image = $emp_profile_image;


      $data->update();

      return redirect()->back();
  }

  public function factory_delete(Request $request)
  {
        $id = $request->id;
        $data = employee::find($id);
        $data->is_delete = 1;
        $data->update();
        return redirect()->back();
  }
   
}
