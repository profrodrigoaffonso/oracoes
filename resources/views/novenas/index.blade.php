@extends('layouts.admin')

@section('content')
    <h1>Novenas</h1>
    <p><a href="{{ route('admin.novenas.create') }}">Novo</a></p>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Santo</th>
                {{-- <th></th>              --}}
            </tr>
        </thead>
        <tbody>
            @foreach($novenas as $novena)
            <tr>
                <td>{{ $novena->nome }}</td>
                {{-- <td><a href="/admin/novenas/{{ $novena->id }}/dias">Dias</a></td>    --}}
                <td><a href="{{ route('admin.novenas.dias', ['id' => $novena->id])}}">Dias</a></td>   
                
                
            </tr>
            @endforeach            
        </tbody>
    </table>
@endsection