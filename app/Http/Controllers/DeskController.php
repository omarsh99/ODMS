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
        return redirect('/');
    }

    public function edit($id){
        $desk = Desk::findOrFail($id);

        return view('desk_edit', compact('desk'));
    }


    public function update(Request $request, Desk $desk): JsonResponse
    {
        if ($request->has('position_x') && $request->has('position_y')) {
            $desk->update($request->only(['position_x', 'position_y']));
        } else {
            $desk->update($request->only(['name', 'symbol']));
        }
        return response()->json(['message' => 'Desk updated successfully']);
    }

    public function patch(Request $request, $id){
        $desk = Desk::findOrFail($id);

        $desk->name = $request->name;
        $desk->symbol = $request->symbol;
        $desk->save();
        return "Desk successfully updated!";
    }

    public function destroy($id){
        $desk = Desk::find($id);
        if($desk){
            $desk->delete();
            return "Desk successfully deleted!";
        }
        return "Desk not found!";
    }
}
