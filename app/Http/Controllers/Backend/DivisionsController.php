<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;

class DivisionsController extends Controller
{
    public function index(){
        $divisions = Division::orderBy('priority', 'asc')->get();
        return view('Backend.pages.divisions.index', compact('divisions'));
    }

    public function create(){
        return view('Backend.pages.divisions.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'priority' => 'required',
        ],
        [
            'name.required' => 'Please provide a division name',
            'priority.required' => 'Please provide a division priority',
        ]);

        $division = new Division();
        $division->name = $request->name;
        $division->priority = $request->priority;
        $division->save();

        session()->flush('success', 'A new division has added successfully !!..');
        return redirect()->route('admin.divisions');
    }

    public function edit($id){
        $division = Division::find($id);
        if(!is_null($division)){
            return view('Backend.pages.divisions.edit', compact('division'));
        }else{
            return redirect()->route('admin.divisions');
        }
    }

    public function update($id, Request $request){
        $this->validate($request, [
        'name'  => 'required',
        'priority'  => 'required',
      ],
      [
        'name.required'  => 'Please provide a division name',
        'priority.required'  => 'Please provide a division priority',
      ]);

        $division = Division::find($id);
        $division->name = $request->name;
        $division->priority = $request->priority;
        $division->save();

        session()->flush('success', 'Division has updated successfully !!..');
        return redirect()->route('admin.divisions');
    }

    public function delete($id){
        $division = Division::find($id);
        if(!is_null($division)){
            // Delete all district for this division
            $districts = District::where('division_id', $division->id)->get();
            foreach($districts as $district){
                $district->delete();
            }
            $division->delete();
            session()->flush('success', 'Division deleted successfully !..');
        }else{
            return redirect()->route('admin.divisions');
        }
    }
}
