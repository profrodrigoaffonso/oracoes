@extends('layouts.admin')

@section('content')
    <h1>Santos</h1>
    <p><a href="{{ route('admin.santos.create') }}">Novo</a></p>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Dia</th>
                <th scope="col">Mês</th>
                <th></th>             
            </tr>
        </thead>
        <tbody>
            @foreach($santos as $santo)
            <tr>
                <td>{{ $santo->nome }}</td>
                <td>{{ $santo->dia }}</td>
                <td>{{ $meses[$santo->mes] }}</td>
                <td><a href="/admin/santos/{{ $santo->id }}/edit">Editar</a></td>              
            </tr>
            @endforeach            
        </tbody>
    </table>
@endsection