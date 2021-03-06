<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Postmark\PostmarkClient;

class PackageController extends Controller
{
    public function view(Request $request){
        $validated = $request->validate(['serial_number' => ['required','exists:packages']]);
        
        if($request->has('verify'))
            $this->verify($request);
        elseif($request->has('unverify'))
            $this->unverify($request);
        
        $package = Package::where('serial_number',$request->serial_number)->firstOrFail();
        
        $user = DB::table('users')->select('username')->where('id',$package->user_id)->first();
        if($user)
            $package->username = $user->username;
        if($package)
            return view('/package/view', ['package'=> $package]);
        else
            $this->find();
    }

    public function find(){
        $rand_serial = session()->get( 'serial_number' );

        return view('/package/view',['serial_number'=> $rand_serial]);
    }

    public function showCreate(Request $request){
        return view('/package/create');
    }

    public function generateUniqueCode()
    {
        do {
            $valid_chars = range(0,9);
            $rand_serial = random_int(10000000, 99999999);
        } while (Package::where('serial_number', $rand_serial)->first());
  
        return $rand_serial;
    }

    public function doCreate(Request $request){
        $messages = [
            'string'    => 'The :attribute must be text format',
            'member_id.regex'    => 'Please Enter the correct format for student ID ex: 2018/12345',
            'phone.required'    => 'Please enter a valid phone number',
            'package_items.required' => 'Please choose either a tshirt or a hoodie or both',
            'nametag.required' => 'Please Choose Nametag',
            'file'    => 'The :attribute must be a file',
            'mimes' => 'Supported file format for :attribute are :mimes',
            'max'      => 'The :attribute must have a maximum length of :max',
          ];
        $validated = $request->validate([
            'member_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'member_id' => ['required','regex:/^20[0-9]{2}\/[0-9]{5}$/', 'unique:App\Models\Package,member_id'],
            'phone'=>"required|max:15|min:11|unique:packages,phone",
            'email' => 'required|email|unique:packages,email',
            'package_items' => 'required|array|min:1',
            'nametag' => 'required',
            'nametag_name'=>"required",
        ], $messages);

        $package = new Package();

        $package->member_name = $request->member_name;
        $package->member_id = $request->member_id;
        $package->email = $request->email;
        $package->phone = $request->phone;
        $package->tshirt = in_array('tshirt', $request->package_items);
        $package->hoodie = in_array('hoodie', $request->package_items);
        if($package->tshirt)
        {
            $package->tshirt_length = $request->tshirt_length;
            $package->tshirt_size = $request->tshirt_size;
        }
        $package->hoodie_size = null;
        if($package->hoodie)
        {
            $package->hoodie_size = $request->hoodie_size;
        }
        $package->nametag = $request->nametag;
        $package->nametag_name = $request->nametag_name;

        if($request->extra_items != NULL ){
            $package->bracelet = in_array('bracelet', $request->extra_items);
            $package->pin = in_array('pin', $request->extra_items);
        }
        

        $amount = 0.0;
        
        $tshirt_price = 150;
        $hoodie_price = 250;
        $nametag_price = 50;

        if($package->tshirt)
            $amount += 150;
        if($package->hoodie)
            $amount += 250;
        if($package->nametag)
            $amount += 50;
        if($package->pin)
            $amount += 15;
        if($package->bracelet)
            $amount += 10;

        $package->amount = $amount;
        
        $rand_serial = $this->generateUniqueCode();
        
        $package->serial_number = $rand_serial;
        $package_details = [];
        if($package->tshirt){
            $package_details[]= ["description"=>$package->tshirt_length . " T-Shirt (" . $package->tshirt_size.")","amount"=>150];
        }
        if($package->hoodie){
            $package_details[]= ["description"=>"Hoodie (" . $package->hoodie_size.")","amount"=>250];
        }
        if($package->nametag){
            $package_details[]= ["description"=>"Nametag (" . $package->nametag_name.")","amount"=>50];
        }
        if($package->bracelet){
            $package_details[]= ["description"=>"Bracelet ","amount"=>10];
        }
        if($package->pin){
            $package_details[]= ["description"=>"Pin ","amount"=>15];
        }
        
        
        $package->save();
        $client = new PostmarkClient(env("POSTMARK_SECRET"));
        $sendResult = $client->sendEmailWithTemplate(
                        "info@gamerslegacy.net",
                        request('email'),
                        27002901,
                        [
                            "name" => $package->member_name,
                            "ID" => $package->member_id,
                            "email" => $package->email,
                            "phone" => $package->phone,
                            "package_details"=>$package_details,
                            "total" => $package->amount,
                            "serial_number"=> $rand_serial,

                        ]
                    );


        return redirect()->route('view')->with( [ 'serial_number' => $rand_serial ] );
    }

    public function verify(Request $request){
        $affected = DB::update(
            'update packages set verified_at = NOW(), paid_by = ? where serial_number = ?',
            [session()->get('username'),$request->serial_number]
        );
    }

    public function unverify(Request $request){
        $affected = DB::update(
            'update packages set verified_at = NULL, paid_by = NULL where serial_number = ?',
            [$request->serial_number]
        );
    }
}
