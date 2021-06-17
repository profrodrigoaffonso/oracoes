@extends('layouts.admin')

@section('content')
    <h1>Autores</h1>
    <p><a href="{{ route('admin.oracoes.create') }}">Novo</a></p>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Santo</th>
                <th scope="col">Oração</th>
            </tr>
        </thead>
        <tbody>
            @foreach($oracoes as $oracao)
            <tr onclick="verOracao({{ $oracao->id }})">
                <td>{{ $oracao->nome }}</td>
                <td>{{ $oracao->titulo }}</td>
            </tr>
            @endforeach            
        </tbody>
    </table>
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script>
        function verOracao(id){
            $.get( "/" + id + "/ajax-oracoes", function( data ) {

                // console.log(data.id);

                $('#label').html('<h2 class="text-center">' + data.titulo + '</h2>');
                $('#oracao').html(data.oracao);

                // $('#oracao').html(data)
                $('#modalOracao').modal()

            });
        }
    </script>
    <div class="modal fade" id="modalOracao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="label"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="oracao">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
      </div>
@endsection