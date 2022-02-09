<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Package;

class SearchController extends Controller
{
    public function index(){

        return view('search');
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
        
        // Search in the title and body columns from the posts table
        $package = Package::query()
            ->where('serial_number', 'LIKE', "%{$search}%")
            ->get();

 

            // Return the search view with the resluts compacted
    

        return view('result', compact('package'));
    }
}
