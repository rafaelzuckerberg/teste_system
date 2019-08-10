<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;


class AdministratorApiController extends Controller
{

    public function index()
    {
        $users = DB::table('users')->get();
        return response()->json($users);
    }
 


    public function store(Request $request)
    {   
        $data = $request->all();
        $data['senha'] = bcrypt($data['senha']);
        $data['status'] = 1;
        $data['profile'] = 'Administrador';
        $data['created_at'] = $date = date('Y-m-d H:i:s', strtotime('Wed, 21 Jul 2010 00:28:50 GMT'));

        $user = DB::table('users')->insert($data);

        if($user) {
            return response()->json('Usuário salvo com sucesso!');
        } else {
            return response()->json('Não foi possível salvar este usuário!');
        } 
    }



    public function update(Request $request, $id)
    {
        $user = DB::table('users')->where('id', $id); 

        if(empty($request['senha'])) {
            unset($request['senha']);
        } else {
            $request['senha'] = bcrypt($request['senha']);
        }

        $update = $user->update($request->all());
        if($update) {
            return response()->json('Usuário atualizado com sucesso!');
        } else {
            return response()->json('Não foi possível atualizar este usuário!');
        } 
    }

  

    public function destroy($id)
    {
        $user = DB::table('users')->where('id', $id);
        $delete = $user->delete();

        if($delete) {
            return response()->json('Usuário deletado com sucesso!');
        } else {
            return response()->json('Não foi possível deletar este usuário!');
        } 
    }
}
