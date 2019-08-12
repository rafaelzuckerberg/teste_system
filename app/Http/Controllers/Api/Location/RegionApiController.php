<?php

namespace App\Http\Controllers\Api\Location;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB; 

class RegionApiController extends Controller
{
     

    public function index()
    {
        $regions = DB::table('regions')->select('regions.id', 'regions.nome as regiao')->get();
        return response()->json($regions);
    }

     
    public function create()
    {
        //
    }

     
    public function store(Request $request)
    {
        //
    }

     
    public function show($id)
    {
        //
    }

     
    public function edit($id)
    {
        //
    }

     
    public function update(Request $request, $id)
    {
        //
    }

     
    public function destroy($id)
    {
        //
    }
}
