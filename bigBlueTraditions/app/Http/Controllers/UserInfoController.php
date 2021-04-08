<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CompletedTradition;
use App\Models\Tradition;


class UserInfoController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){
        $completedTraditions = CompletedTradition::get();
        return view('userInfo',[
            'completedTraditions' => $completedTraditions
        ]);

    }
    public function store(Request $request){
        
        if(request('deleteB') == true){
            $data = CompletedTradition::where('body', $request['deleteB']); 
            $row = CompletedTradition::where('body', '=', $request['deleteB'])->first();
            if(!is_null($data)){
                $traditionRow = Tradition::find($row->tradition_id);
                $points = $traditionRow->points;
        
                $user = User::where('id', '=', $row->user->id)->first();
                $user->points -= $points;
                $user->save();

                $data->delete();
            }
        }
        return back();
    }
    
}
