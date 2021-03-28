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
        return view('traditions.index');
    }

    public function store(Request $request){
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->completedTraditions()->create($request->only('body'));
        $request->user();
        $completedTraditions = CompletedTradition::get();

        return view('userInfo', [
            'completedTraditions' => $completedTraditions
        ]);
    }
}
