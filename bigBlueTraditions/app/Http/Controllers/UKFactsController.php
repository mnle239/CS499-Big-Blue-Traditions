<?php

namespace App\Http\Controllers;

use App\Models\UKFact;
use Illuminate\Http\Request;

class UKFactsController extends Controller
{
    public function index(){
        $facts = UKFact::get();
        return view('ukFactsList', [
            'facts' => $facts
        ]
    );
    }

    public function store(Request $request){
        if(request('deleteB') == true){
            $data = UKFact::where('description', $request['deleteB']); 
            if(!is_null($data)){
                $data->delete();
            }
        }else{
            $this->validate($request, [
                'description' => 'required'
            ]);

            UKFact::create([
                'description' => $request->description,
            ]);
        }
        return back();
    }
}
