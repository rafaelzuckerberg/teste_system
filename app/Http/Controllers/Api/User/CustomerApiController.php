<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use App\User;
use App\Models\Customer;

class CustomerApiController extends Controller
{

    private $user;
    private $customer;


    public function __construct(User $user, Customer $customer) {
        $this->user = $user;
        $this->customer = $customer;
    }
    
    public function index()
    {
        $users = DB::table('users')
                            ->select('users.*', 'customers.*')
                            ->where('profile', 'Cliente')
                            ->join('customers', 'customers.user_id', 'users.id')
                            ->get();
        return response()->json($users);
    }
 

    public function store(Request $request)
    {  
        // return response()->json($request->all());
        $user = $this->user
                ->create([
                    'nome'          =>      $request['nome'],
                    'email'         =>      $request['email'],
                    'password'         =>      bcrypt($request['password']),
                    'status'        =>      1,
                    'profile'       =>      'Cliente',
                    'created_at'    =>      date('Y-m-d H:i:s', strtotime('Wed, 21 Jul 2010 00:28:50 GMT')),
                ]); 

        $customer = DB::table('customers')
                ->insert([
                    'user_id'                           =>          $user->id,
                    'cnpj'                              =>          $request['cnpj'],      
                    'responsavel_nome'                  =>          $request['responsavel_nome'],      
                    'responsavel_telefone'              =>          $request['responsavel_telefone'],      
                    'responsavel_celular'               =>          $request['responsavel_celular'],      
                    'responsavel_email'                 =>          $request['responsavel_email'],      
                    'responsavel2_nome'                 =>          $request['responsavel2_nome'],      
                    'responsavel2_telefone'             =>          $request['responsavel2_telefone'],      
                    'responsavel2_celular'              =>          $request['responsavel2_celular'],      
                    'responsavel2_email'                =>          $request['responsavel2_email'],      
                    
                    'valor_cliente_parecer'             =>          $request['valor_cliente_parecer'],      
                    'valor_fornecedor_parecer'          =>          $request['valor_fornecedor_parecer'],      
                    'valor_cliente_negociacao'          =>          $request['valor_cliente_negociacao'],      
                    'valor_proposto_negociacao'         =>          $request['valor_proposto_negociacao'],      
                    'valor_negociado_negociacao'        =>          $request['valor_negociado_negociacao'],      
                    'valor_negociadoC_negociacao'       =>          $request['valor_negociadoC_negociacao'], 
                    
                    'fk_id_pais'                        =>          $request['fk_id_pais'],
                    'fk_id_regiao'                      =>          $request['fk_id_regiao'],
                    'fk_id_estado'                      =>          $request['fk_id_estado'],
                    'fk_id_cidade'                      =>          $request['fk_id_cidade'],
                    'fk_id_bairro'                      =>          $request['fk_id_bairro'],
                    'fk_id_logradouro'                  =>          $request['fk_id_logradouro'],

                    'complemento_endereco'              =>          $request['complemento_endereco'],      
                    'numero'                            =>          $request['numero'],      
                ]); 

        if($user && $customer) {
            return response()->json('Usuário salvo com sucesso!');
        } else {
            return response()->json('Não foi possível salvar este usuário!');
        } 
    }



    public function update(Request $request, $id)
    {
        $user = $this->user->find($id);  
        $customer = $this->customer->where('user_id', $id)->first(); 

        if(empty($request['password'])) {
            unset($request['password']);
        } else {
            $request['password'] = bcrypt($request['password']);
        }
        $update = $user->update($request->only('id', 'nome', 'email', 'password', 'status', 'updated_at'));

        $_update = $customer->update($request->except('id', 'nome', 'email', 'password', 'status', 'updated_at')); 

        if($update || $_update) {
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
