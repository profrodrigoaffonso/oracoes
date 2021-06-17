@extends('layouts.admin')

@section('content')
    <h1>Novena: {{ $novena->nome }}</h1>
    <p><a href="{{ route('admin.novenas.index') }}">Volar</a></p>
    <form action="{{ route('admin.novenas.adicionar') }}" id="form" method="POST">
        @csrf
        @component('components.forms.hidden',[
            'name'      => 'novena_id',
            'id'        => 'novena_id',
            'value'     => $novena->id
        ])
        @endcomponent
        @component('components.forms.date',[
            'label' => 'Adicionar dia',
            'name'  => 'dia',
            'id'    => 'dia',
            'value' => date('Y-m-d'),
            'required'  => ''
        ])            
        @endcomponent
        @component('components.forms.button', [
            'type'      => 'button',
            'class'     => 'btn btn-primary',
            'label'     => 'Salvar',
            'onclick'   => 'onclick=salvar()'
        ])        
        @endcomponent
    </form>
    <form action="{{ route('admin.novenas.delete') }}" id="formExcluir" method="POST">
        @csrf
        @component('components.forms.hidden',[
            'name'      => 'dia_id',
            'id'        => 'dia_id',
            'value'     => ''
        ])
        @endcomponent
        @component('components.forms.hidden',[
            'name'      => 'novena_id',
            'id'        => 'novena_id',
            'value'     => $novena->id
        ])
        @endcomponent
    </form>
    <p><a href="{{ route('admin.novenas.create') }}">Novo</a></p>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Dias</th>
                {{-- <th></th>              --}}
            </tr>
        </thead>
        <tbody>
            <?php $cont = 1 ?>
            @foreach($dias as $dia)
            <tr>
                <td>{{ $cont }} - {{ date('d/m/Y', strtotime($dia->dia)) }}</td>
                <td>
                    @component('components.forms.button', [
                        'type'      => 'button',
                        'class'     => 'btn btn-primary',
                        'label'     => 'Excluir',
                        'onclick'   => 'onclick=excluir(' . $dia->id .')'
                    ])        
                    @endcomponent
                </td>
                {{-- <td><a href="/admin/novenas/{{ $novena->id }}/dias">Dias</a></td>    --}}
                {{-- <td><a href="{{ route('admin.novenas.dias', ['id' => $novena->id])}}">Editar</a></td>    --}}
                <?php $cont++ ?>
                
            </tr>
            @endforeach            
        </tbody>
    </table>
    <script>
        function salvar(){
            if(window.confirm("Adicionar o dia?")){
                document.getElementById('form').submit()
            }
        }

        function excluir(dia_id){
            if(window.confirm("Excluir o dia?")){
                document.getElementById('dia_id').value = dia_id
                document.getElementById('formExcluir').submit()
            }
        }
    </script>
@endsection