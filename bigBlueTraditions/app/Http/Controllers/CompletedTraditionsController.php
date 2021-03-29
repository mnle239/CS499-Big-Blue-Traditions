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
 
        $request->user()->completedTraditions()->create([
            'body' => $request->body,
            'tradition_id' => $request->tradition
        ]);

        return redirect('userInfo');
    }
}
