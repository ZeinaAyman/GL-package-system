<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    public function viewall(Request $request){
        $package = Package::query()->get();

        return view('result', compact('package'));
    }

    public function changePayment(Request $request)
    {
        
        $user = Auth::user();
        if($request->paid){
            Package::where('serial_number', $request->serial_number)->update(['paid' => 0, 'paid_by'=> 'None','verified_at'=> NULL]);

        }
    
        else{
            Package::where('serial_number', $request->serial_number)->update(['paid' => 1,'paid_by'=> $user->username,'verified_at'=> now()]);
        }
       
        return redirect()->back();
    }
}
