<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class OutletController extends Controller
{
    public function index(){
        $viewOutlet = Outlet::orderBy("region","desc")->simplePaginate(3);
        return view("outlets",compact("viewOutlet"));
    }

    public function search(Request $request)
    {
        $viewOutlet = Outlet::where("region","LIKE","%$request->search%")
                            ->orWhere('outlet_name', 'LIKE', "%$request->search%")
                            ->paginate(3);

        return view('outlets',compact("viewOutlet"));
    }
}
