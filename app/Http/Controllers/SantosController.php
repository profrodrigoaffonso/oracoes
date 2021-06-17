<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Santo;

class SantosController extends Controller
{

    public $meses = [
        1 => "Janeiro", 
        2 => "Fevereiro", 
        3 => "Março", 
        4 => "Abril", 
        5 => "Maio", 
        6 => "Junho", 
        7 => "Julho", 
        8 => "Agosto", 
        9 => "Setembro", 
        10 => "Outubro", 
        11 => "Novembro", 
        12 => "Dezembro"
    ];
  
    public function index(){

        $meses = $this->meses;

        // $meses = [
        //     1 => "Janeiro", 
        //     2 => "Fevereiro", 
        //     3 => "Março", 
        //     4 => "Abril", 
        //     5 => "Maio", 
        //     6 => "Junho", 
        //     7 => "Julho", 
        //     8 => "Agosto", 
        //     9 => "Setembro", 
        //     10 => "Outubro", 
        //     11 => "Novembro", 
        //     12 => "Dezembro"
        // ];

        $dias = [];

        for($i = 1; $i <= 31; $i++){
            $dias[$i] = $i;
        }

        $santos = Santo::select('id', 'nome', 'dia', 'mes')
                ->orderBy('mes', 'ASC')
                ->orderBy('dia', 'ASC')
                ->get();

        return view('santos.index', compact('meses', 'dias', 'santos'));



    }
    public function create(){

        // $meses = [
        //     1 => "Janeiro", 
        //     2 => "Fevereiro", 
        //     3 => "Março", 
        //     4 => "Abril", 
        //     5 => "Maio", 
        //     6 => "Junho", 
        //     7 => "Julho", 
        //     8 => "Agosto", 
        //     9 => "Setembro", 
        //     10 => "Outubro", 
        //     11 => "Novembro", 
        //     12 => "Dezembro"
        // ];

        $meses = $this->meses;


        $dias = [];

        for($i = 1; $i <= 31; $i++){
            $dias[$i] = $i;
        }

        return view('santos.create', compact('meses', 'dias'));

    }

    public function store(Request $request){

        $dados = $request->all();

        Santo::create($dados);

        return redirect(route('admin.santos.index'));


    }

    public function edit($id){

        $santo = Santo::findOrFail($id);

        // $meses = [
        //     1 => "Janeiro", 
        //     2 => "Fevereiro", 
        //     3 => "Março", 
        //     4 => "Abril", 
        //     5 => "Maio", 
        //     6 => "Junho", 
        //     7 => "Julho", 
        //     8 => "Agosto", 
        //     9 => "Setembro", 
        //     10 => "Outubro", 
        //     11 => "Novembro", 
        //     12 => "Dezembro"
        // ];

        $meses = $this->meses;


        $dias = [];

        for($i = 1; $i <= 31; $i++){
            $dias[$i] = $i;
        }

        return view('santos.edit', compact('meses', 'dias', 'santo'));

    }

    public function update(Request $request){

        $dados = $request->all();       

        $santo = Santo::findOrFail($dados['id']);

        $santo->update([
            'nome'      => $dados['nome'],
            'descricao' => $dados['descricao'],
            'dia'       => $dados['dia'],
            'mes'       => $dados['mes'],
        ]);
        return redirect(route('admin.santos.index'));

    }
}
