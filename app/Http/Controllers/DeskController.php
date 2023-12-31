<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Desk;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class DeskController extends Controller
{
    public function index(){
        $data = Session::has('loginId') ? User::find(Session::get('loginId')) : [];

        $desks = Desk::all();
        $view = request()->is('desks') ? 'desks' : 'index';

        return view($view, compact('desks', 'data'));
    }

    public function create(){
        $categories = Category::all();
        return view('desk_create', compact('categories'));
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'symbol' => 'required',
            'position_x' => 'numeric',
            'position_y' => 'numeric',
        ]);

        $validatedData = $request->only(['name', 'symbol', 'position_x', 'position_y', 'category_id']);

        $desk = new Desk();
        $desk->fill($validatedData);
        $desk->save();

        return redirect('/');
    }

    public function edit($id){
        $desk = Desk::findOrFail($id);

        return view('desk_edit', compact('desk'));
    }


    public function update(Request $request, Desk $desk): JsonResponse
    {

        $data = $request->only(['position_x', 'position_y', 'height', 'width']);

        if ($desk->update($data)) {
            $message = 'Desk updated successfully';
        } else {
            $message = 'Failed to update desk';
        }
        return response()->json(['message' => $message]);
    }


    public function patch(Request $request, $id)
    {
        $desk = Desk::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'symbol' => 'required'
        ]);

        $desk->update($request->only(['name', 'symbol']));

        return redirect('/');
    }


    public function destroy($id){
        $desk = Desk::find($id);
        if($desk){
            $desk->delete();
            return redirect('/');
        }
        return "Desk not found!";
    }
}
