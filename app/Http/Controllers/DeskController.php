<?php

namespace App\Http\Controllers;

use App\Models\Desk;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DeskController extends Controller
{
    public function index(){
        $desks = Desk::all();
        return view('index')->with('desks', $desks);
    }
    public function create(){
        //display page for desk creation
        return view('desk_create');
    }

    public function store(Request $request){
        $name = $request->name;
        $symbol = $request->symbol;
        $position_x = $request->position_x;
        $position_y = $request->position_y;

        $desk = new Desk();
        $desk->name = $name;
        $desk->symbol = $symbol;
        $desk->position_x = $position_x;
        $desk->position_y = $position_y;

        $desk->save();
        return redirect()->back();
    }

    public function edit(){
        //display page for desk edit
    }

    public function update(Request $request, Desk $desk): JsonResponse
    {
        $desk->update($request->only(['position_x', 'position_y']));
        return response()->json(['message' => 'Desk position updated successfully']);
    }

    public function destroy(){
        //remove desk
    }
}
