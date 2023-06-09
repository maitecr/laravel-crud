<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Validator;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cadastrar');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dadosFormulario = $request->except('_token');
        $dadosFormulario['senha'] = bcrypt($dadosFormulario['senha']);
        $usuario = new Usuario;
        $this->validate($request, $usuario->rules, $usuario->messages);

        $validacao = Validator::make($request->all(),[
                        'senha' => 'required',
                        'confirmar' => 'required|same:senha',
                    ]);

        if($validacao -> fails()) {
            return "Senhas incompatíveis";
        }

        $insert = $usuario::create($dadosFormulario);

        if($insert) {
            return "Usuário cadastrado";
        } else {
            return "Cadastro não efetuado";
        }
       // dd($dadosFormulario);
       // return $dadosFormulario;
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
