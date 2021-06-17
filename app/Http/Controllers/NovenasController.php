<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Santo;
use App\Models\Novena;
use App\Models\DiasNovena;

class NovenasController extends Controller
{

    public function index(){

        $novenas = Novena::select('novenas.id', 'santos.nome')
                ->join('santos', 'novenas.santo_id', '=', 'santos.id')
                ->orderBy('santos.nome')
                ->get();

        return view('novenas.index', compact('novenas'));
    }

    public function create(){

        $santos = Santo::select('id', 'nome')
                ->orderBy('nome', 'ASC')
                ->get();

        return view('novenas.create', compact('santos'));

    }

    public function store(Request $request){

        $dados = $request->all();

        Novena::create($dados);

        return redirect(route('admin.novenas.index'));


    }

    public function delete(Request $request){

        $dados = $request->all();

        $dia = DiasNovena::findOrFail($dados['dia_id']);

        $dia->delete();

        return redirect(route('admin.novenas.dias', ['id' => $dados['novena_id']]));


        dd($dados);

    }

    public function dias($id){

        // dd($id);

        $novena = Novena::select('novenas.id', 'santos.nome')
                ->join('santos', 'novenas.santo_id', '=', 'santos.id')
                ->where('novenas.id', $id)
                ->first();

        $dias = DiasNovena::select('id', 'dia')
                ->where('novena_id', $id)
                ->orderBy('dia', 'ASC')
                ->get();

        // dd($dias);

        return view('novenas.dias', compact('novena', 'dias'));

    }

    public function adicionar(Request $request){

        $dados = $request->all();

        // dd($dados);

        DiasNovena::create($dados);

        return redirect(route('admin.novenas.dias', ['id' => $dados['novena_id']]));

    }
}
