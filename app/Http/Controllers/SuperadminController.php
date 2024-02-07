<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class SuperadminController extends Controller
{
    public function index()
    {
        return view('super_admin.index');
    }

    public function dashboards()
    {
        
        return view('super_admin.dashboards');
    }

    public function Addstore()
    {
         $data = DB::table('stores')->where('is_delete', 0)->get();
        return view('super_admin.addstore', compact('data'));
    }
    public function add_store(Request $request)
    { 
         $request->validate([
            'store_code' => 'required',
            'name' => 'required',
            'phone_number' => 'required',
            'image' => 'required',

         ]);
        $data = new Store;
        $data->store_code = $request->store_code;
        $data->name = $request->name;
        $data->phone_number = $request->phone_number['main'];
        $data->add = $request->add;
        
        $profileimgName = 'lv_' . rand() . '.' . $request->image->extension();
        
        $request->image->move(public_path('image/'), $profileimgName);
        $requestData['image'] = $profileimgName;

        $data->image =  $profileimgName;
        $data->save();
        $number = $request->phone_number['main'];
        $phone_number = substr($number, 8);
        $data->store_id = $phone_number . '-'. $data->id;
        $data->update();

        return redirect()->back();

    }

    public function store_edit(Request $request)
    {
           $id = $request->id;
           $data = Store::find($id);
           $data->store_code = $request->store_code;
           $data->name = $request->name;
        
           $data->phone_number = $request->mobile_no['main'];
           $data->add = $request->add;
           if($request->image){
                $profileimgName = 'lv_' . rand() . '.' . $request->image->extension();
                $request->image->move(public_path('image/'), $profileimgName);
                $requestData['image'] = $profileimgName;
           }
                
           if($request->image){
                 $data->image =  $profileimgName;
           }
        

           $data->update();
         
           return redirect()->back();
    }
  

    public function store_delete(Request $request)
    {
           $id = $request->id;
           $data = Store::find($id);
           $data->is_delete = 1;
           $data->update();
           
           return redirect()->back();
    }
     
    public function adduser()
    {
        $store = DB::table('stores')->where('is_delete', 0)->get();
        $data = DB::table('users')->where('is_delete', 0)->get();
        return view('super_admin.adduser', compact('store','data'));
    }

    public function user_store(Request $request)
    { 
        // Validator::extend('phone_number', function ($attribute, $value, $parameters, $validator) {
        //     $value = preg_replace('/[^0-9]/', '', $value); // Remove any non-numeric characters
        //      $allowedCountryCodes = $parameters;
        //     if (in_array('+91', $allowedCountryCodes)) {
        //         return preg_match('/^91\d{10}$/', $value);
        //     } 
        //     return preg_match('/^(' . implode('|', array_map('preg_quote', $allowedCountryCodes)) . ')\d{9,12}$/', $value);
        // });
        

        // $request->validate([
        //     'name' => 'required',
        //     'password' => 'required',
        //     'phone_number.main' => 'required|mobile_number:+91,+1|unique:users,phone_number',
        //     'factory_access' => 'required',
        //     'store_access' => 'array',
        //     'role' => 'array',
        //     'profile_image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048 ',
        //     'add' => 'required'

        //  ], [
        //     'name.required' => 'Name is required',
        //     'password.rqeuired' => 'Passoword is required',
        //     'profile_image.required' =>  'Profile Image is required',
        //     'phone_number.main.required' => 'Mobile no. is required', // Use "mobile_no.main" instead of "mobile_no"
        //     'phone_number.main.phone_number' => 'Invalid Mobile no.', // Use "mobile_no.main" instead of "mobile_no"
        //     'phone_number.main.unique' => 'Mobile no already exists.', // Use "mobile_no.main" instead of "mobile_no"
        //  ]);
        
        $data = new User;
        $data->name = $request->name;
        $data->password = Hash::make($request->password);
        $data->phone_number = $request->phone_number['main'];
        $data->store_access = is_array($request->store_access) ? implode(",", $request->store_access) : null;
        $data->add = $request->add;
        if($request->profile_image){
            $profileimgName = 'lv_' . rand() . '.' . $request->profile_image->extension();
            $request->profile_image->move(public_path('profile_image/'), $profileimgName); 

            $data->profile_image =  $profileimgName;
       } 
        $data->role = $request->role;
       $data->save();

       $number = $request->phone_number['main'];
       $phone_number = substr($number, 8);

       $data->user_id = $phone_number . '-'. $data->id;
       $data->update();

       return redirect()->back();

    }

 
    public function user_edit(Request $request)
    {
         $id = $request->id;
         $data = User::find($id);
         $data->name = $request->name;
         $data->phone_number = $request->mobile_number['main'];
         $data->store_access = is_array($request->store_access) ? implode(",", $request->store_access) : null;
         $data->add = $request->add;
         $data->role = $request->role;

        if($request->profile_image){
            $profileimgName = 'lv_' . rand() . '.' . $request->profile_image->extension();
            $request->profile_image->move(public_path('profile_image/'), $profileimgName);
            $requestData['profile_image'] = $profileimgName;
        } 
        if($request->profile_image){
            $data->profile_image =  $profileimgName;
            
        }
      
        $data->update();
        return redirect()->back();

    }

    public function user_delete(Request $request)
    {
        $id = $request->id;
         $data = User::find($id);
         $data->is_delete = 1;
         $data->update();
         return redirect()->back();
    }

    public function user_lock(Request $request)
    {
      $id = $request->id;
      $data = User::find($id);
      if($data->is_lock == 0)
      {
        $data->is_lock = 1;
      }else{
        $data->is_lock = 0;
      }
      $data->update();

      return redirect()->back();
    }

    public function change_passowed(Request $request)
    { 

        $id = $request->id;
        $data = User::find($id);
        if($data){
            $data->password = Hash::make($request->password); 
        }
      
        $data->update();

        return redirect()->back();

    }

}
