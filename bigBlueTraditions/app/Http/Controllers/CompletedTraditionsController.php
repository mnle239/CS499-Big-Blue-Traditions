<?php

namespace App\Http\Controllers;

use App\Models\CompletedTradition;
use Illuminate\Http\Request;

class CompletedTraditionsController extends Controller
{

    public function __construct(){
        $this->middleware(['auth']);
    }
    
    public function index(){
        $completedTraditions = CompletedTradition::paginate(2);
        return view('traditions.index', [
            'completedTraditions' => $completedTraditions
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->completedTraditions()->create($request->only('body'));

        return back();
    }
}
