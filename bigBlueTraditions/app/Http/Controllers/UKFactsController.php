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
        $this->validate($request, [
            'description' => 'required'
        ]);

        UKFact::create([
            'description' => $request->description,
        ]);

        return back();
    }
}
