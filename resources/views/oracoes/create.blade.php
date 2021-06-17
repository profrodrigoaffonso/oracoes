@extends('layouts.admin')

@section('content')
<form action="{{ route('admin.oracoes.store') }}" method="POST">
    @csrf
    @component('components.forms.select',[
        'label'     => 'Santo',
        'name'      => 'santo_id',
        'id'        => 'santo_id',
        'values'    => $santos,
        'selected'  => '',
        'required'  => '',
    ])        
    @endcomponent
    @component('components.forms.input',[
        'label'     => 'Título',
        'name'      => 'titulo',
        'id'        => 'titulo',
        'value'     => '',
        'maxlength' => 100,
        'required'  => 'required',
    ])
    @endcomponent
    @component('components.forms.textarea',[
        'label'     => 'Oração',
        'name'      => 'oracao',
        'id'        => 'oracao',
        'value'     => '',
        'required'  => '',
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
        .create( document.querySelector( '#oracao' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
  
@endsection