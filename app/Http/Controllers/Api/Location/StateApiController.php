<?php

namespace App\Http\Controllers\Api\Location;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class StateApiController extends Controller
{

    public function index()
    {
        $states = DB::table('states')
                    ->select('states.id', 'states.nome as estado', 'states.fk_id_pais', 'countries.nome as pais')
                    ->join('countries', 'countries.id', 'states.fk_id_pais')
                    ->get();
        return response()->json($states);
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
