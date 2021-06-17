@extends('layouts.admin')

@section('content')
<form action="{{ route('admin.santos.update') }}" method="POST">
    @method('PUT')
    @csrf
    @component('components.forms.hidden',[
        'name'      => 'id',
        'id'        => 'id',
        'value'     => $santo->id,
    ])
    @endcomponent
    @component('components.forms.input',[
        'label'     => 'Nome',
        'name'      => 'nome',
        'id'        => 'nome',
        'value'     => $santo->nome,
        'maxlength' => 100,
        'required'  => 'required',
    ])
    @endcomponent
    @component('components.forms.textarea',[
        'label'     => 'Descrição',
        'name'      => 'descricao',
        'id'        => 'descricao',
        'value'     => $santo->descricao,
        'required'  => '',
    ])        
    @endcomponent
    @component('components.forms.select2',[
        'label'     => 'Mês',
        'name'      => 'mes',
        'id'        => 'mes',
        'values'    => $meses,
        'selected'  => $santo->mes,
        'required'  => 'required',
    ])        
    @endcomponent
    @component('components.forms.select2',[
        'label'     => 'Dia',
        'name'      => 'dia',
        'id'        => 'dia',
        'values'    => $dias,
        'selected'  => $santo->dia,
        'required'  => 'required',
    ])        
    @endcomponent

    @component('components.forms.button', [
        'type'    => 'submit',
        'class'   => 'btn btn-primary',
        'label'   => 'Salvar'
    ])        
    @endcomponent  
  </form>
  <script src="/js/jquery-3.6.0.min.js"></script>
  <script src="/ckeditor/ckeditor.js"></script>
  <script>
    ClassicEditor
        .create( document.querySelector( '#descricao' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
  
@endsection