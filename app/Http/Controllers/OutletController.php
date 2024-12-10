<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;


class OutletController extends Controller
{
    public function index(){
        $viewOutlet = Outlet::orderBy("region","desc")->simplePaginate(4);
        return view("outlets",compact("viewOutlet"));
    }

    public function search(Request $request)
    {
        $viewOutlet = Outlet::where("region","LIKE","%$request->search%")
                            ->orWhere('outlet_name', 'LIKE', "%$request->search%");

        return view('outlets',compact("viewOutlet"));
    }

    public function add(Request $request){
        $validateData = $request->validate([
            'outlet_name' => 'required|string|max:255',
            'region' => 'required|string|max:50',
            'opening_time' => 'required',
            'closing_time' => 'required',
        ]);

        $validateData['date'] = Carbon::now()->format('Y-m-d');
        Outlet::create($validateData);

        return redirect('/add-outlet')->with('success', 'User is added successfully!');
    }

    public function edit(Request $request, $id)
    {
        $viewOutlet = Outlet::find($id);
        return view('updateoutlet',compact('viewOutlet'));
    }

    public function index_add(){
        $viewOutlet = Outlet::orderBy("region","desc")->simplePaginate(4);
        return view("addoutlet",compact("viewOutlet"));
    }

    public function update(Request $request, $id){
        $validateData = $request->validate([
            'outlet_name' => 'required|string|max:255' .$id,
            'region' => 'required|string|max:50',
            'opening_time' => 'required',
            'closing_time' => 'required',
        ]);

        $outlet = Outlet::find($id);
        $outlet->update($validateData);
        $outlet->save();

        return redirect('/add-outlet')->with('success', 'Outlet is updated successfully');

    }
}
