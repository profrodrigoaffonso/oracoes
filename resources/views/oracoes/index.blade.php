@extends('layouts.admin')

@section('content')
    <h1>Autores</h1>
    <p><a href="{{ route('admin.oracoes.create') }}">Novo</a></p>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Santo</th>
                <th scope="col">Oração</th>
                <th></th>             
            </tr>
        </thead>
        <tbody>
            @foreach($oracoes as $oracao)
            <tr>
                <td>{{ $oracao->nome }}</td>
                <td>{{ $oracao->titulo }}</td>
                <td><a href="/admin/oracoes/{{ $oracao->id }}/edit">Editar</a></td>              
            </tr>
            @endforeach            
        </tbody>
    </table>
@endsection