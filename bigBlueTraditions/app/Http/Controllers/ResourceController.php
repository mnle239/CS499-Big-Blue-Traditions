<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index(){
        $resources = Resource::get();
        return view('resourceList', [
            'resources' => $resources
        ]
    );
    }

    public function store(Request $request){
        if(request('deleteB') == true){
            $data = Resource::where('name', $request['deleteB']); 
            if(!is_null($data)){
                $data->delete();
            }
        }else {
            $this->validate($request, [
                'name' => 'required',
                'description' => 'required'
            ]);

            Resource::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);
        }

        return back();
    }
}
