<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Santo;
use App\Models\Oracao;

class OracoesController extends Controller
{
    public function oracoes(){
        $oracoes = Oracao::select('oracoes.id', 'oracoes.titulo', 'santos.nome')
                    ->leftJoin('santos', 'oracoes.santo_id', '=', 'santos.id')
                    ->orderBy('santos.nome', 'ASC')
                    ->orderBy('oracoes.titulo', 'ASC')
                    ->get();
        
        return view('oracoes.site', compact('oracoes'));
    }

    public function ajaxOracoes($id){

        $oracao = Oracao::select('oracoes.id', 'oracoes.titulo', 'santos.nome', 'oracoes.oracao')
                ->leftJoin('santos', 'oracoes.santo_id', '=', 'santos.id')
                ->where('oracoes.id', $id)
                ->first();
        
        return view('oracoes.ajax', compact('oracao'));

    }

    public function index(){

        $oracoes = Oracao::select('oracoes.id', 'oracoes.titulo', 'santos.nome')
                    ->leftJoin('santos', 'oracoes.santo_id', '=', 'santos.id')
                    ->orderBy('santos.nome', 'ASC')
                    ->orderBy('oracoes.titulo', 'ASC')
                    ->get();
        
        return view('oracoes.index', compact('oracoes'));


    }

    public function create(){

        $santos = Santo::select('id', 'nome')
                ->orderBy('nome', 'ASC')
                ->get();

        return view('oracoes.create', compact('santos'));
    }

    public function store(Request $request){

        $dados = $request->all();

        Oracao::create($dados);

        return redirect(route('admin.oracoes.index'));


    }

    public function edit($id){

        $oracao = Oracao::findOrFail($id);

        $santos = Santo::select('id', 'nome')
                ->orderBy('nome', 'ASC')
                ->get();

        // dd($santos);

        return view('oracoes.edit', compact('santos', 'oracao'));

    }

    public function update(Request $request){

        $dados = $request->all();

        $oracao = Oracao::findOrFail($dados['id']);

        $oracao->update($dados);

        return redirect(route('admin.oracoes.index'));


    }

    
}
