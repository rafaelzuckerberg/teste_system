<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use App\User;

class AdministratorApiController extends Controller
{

    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }


    public function index()
    {
        $users = DB::table('users')->where('profile', 'Administrador')->get();
        return response()->json($users);
    }
 


    public function store(Request $request)
    {   
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $data['status'] = 1;
        $data['profile'] = 'Administrador';
        $data['created_at'] = date('Y-m-d H:i:s', strtotime('Wed, 21 Jul 2010 00:28:50 GMT'));

        $user = $this->user->create($data); 

        if($user) {
            return response()->json('Usuário salvo com sucesso!');
        } else {
            return response()->json('Não foi possível salvar este usuário!');
        } 
    }



    public function update(Request $request, $id)
    {
        $user = DB::table('users')->where('id', $id); 

        if(empty($request['password'])) {
            unset($request['password']);
        } else {
            $request['password'] = bcrypt($request['password']);
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
