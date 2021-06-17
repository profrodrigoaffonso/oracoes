@extends('layouts.admin')

@section('content')
<form action="{{ route('admin.santos.store') }}" method="POST">
    @csrf
    @component('components.forms.input',[
        'label'     => 'Nome',
        'name'      => 'nome',
        'id'        => 'nome',
        'value'     => '',
        'maxlength' => 100,
        'required'  => 'required',
    ])
    @endcomponent
    @component('components.forms.textarea',[
        'label'     => 'Descrição',
        'name'      => 'descricao',
        'id'        => 'descricao',
        'value'     => '',
        'required'  => '',
    ])        
    @endcomponent
    @component('components.forms.select2',[
        'label'     => 'Mês',
        'name'      => 'mes',
        'id'        => 'mes',
        'values'    => $meses,
        'selected'  => '',
        'required'  => 'required',
    ])        
    @endcomponent
    @component('components.forms.select2',[
        'label'     => 'Dia',
        'name'      => 'dia',
        'id'        => 'dia',
        'values'    => $dias,
        'selected'  => '',
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