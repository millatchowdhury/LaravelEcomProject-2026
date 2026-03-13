<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;

class DistrictsController extends Controller
{
    public function index(){
        $districts = District::orderBy('name', 'asc')->get();
        return view('Backend.pages.districts.index', compact('districts'));
    }

    public function create(){
        $divisions = Division::orderBy('priority', 'asc')->get();
        return view('Backend.pages.districts.create', compact('divisions'));
    }

    public function store(Request $request){

        $this->validate($request, [
        'name'  => 'required',
        'division_id'  => 'required',
        ],
        [
        'name.required'  => 'Please provide a district name',
        'division_id.required'  => 'Please provide a division for the district',
        ]);

        $district = new District();
        $district->name = $request->name;
        $district->division_id = $request->division_id;
        $district->save();

        session()->flush('success', 'District has added successfully !!..');
        return redirect()->route('admin.districts');
    }

    public function edit($id){
        $divisions = Division::orderBy('priority', 'asc')->get();
        $district = District::find($id);
        return view('Backend.pages.districts.edit', compact('district', 'divisions'));
    }

    public function update($id, Request $request){
        $this->validate($request, [
            'name' => 'required',
            'division_id' => 'required',
        ],
        [
            'name.required' => 'Please Provide a district name',
            'division_id.required' => 'Please provide a division for the district',
        ]);
        $district = District::find($id);
        $district->name = $request->name;
        $district->division_id = $request->division_id;
        $district->save();

        session()->flush('success', 'District has updated successfully !!..');
        return redirect()->route('admin.districts');
    }

    public function delete($id){
        $district = District::find($id);
        if(!is_null($district)){
            $district->delete();
            session()->flush('seccess', 'District has deleted successfully !!..');
            return redirect()->route('admin.districts');
        }else{
            return redirect()->route('admin.districts');
        }
    }

}
