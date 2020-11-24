
<title>Relatório de Despesas</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link href="{{asset('css/select2.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link href=" https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="{{asset('css/bootstrap-datepicker.css')}}" rel="stylesheet">

{{-- @php
$url=$_SERVER['HTTP_HOST'];
@endphp
@php if(strpos($url, 'motormac.lansolver.com') !== 0){
    echo '<div class="alert alert-danger">Permissão Negada : '.$url."</div>";
    die();
}

@endphp --}}

<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-2 col-md-2">
                    <label for="data">Data:</label>
                    <input name="data" id="data" class="js-example-basic-single form-control">
                </div>
                <div class="col-sm-2 col-md-2">
                    <label for="regiao">CEP:</label>
                    <input name="cep" id="cep" class="js-example-basic-single form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5 col-md-5">
                    <label for="regiao">Endereço:</label>
                    <input name="endereco" id="endereco" class="js-example-basic-single form-control">
                </div>
                <div class="col-sm-1 col-md-1">
                    <label for="regiao">Número:</label>
                    <input name="numero" id="numero" class="js-example-basic-single form-control">
                </div>
                <div class="col-sm-3 col-md-3">
                    <label for="regiao">Complemento:</label>
                    <input name="complemento" id="complemento" class="js-example-basic-single form-control">
                </div>
                <div class="col-sm-3 col-md-3">
                    <label for="regiao">Bairro:</label>
                    <input name="bairro" id="bairro" class="js-example-basic-single form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 col-md-3">
                    <label for="regiao">Cidade:</label>
                    <input name="cidade" id="cidade" class="js-example-basic-single form-control">
                </div>
                <div class="col-sm-1 col-md-1">
                    <label for="regiao">Estado:</label>
                    <input name="uf" id="uf" class="js-example-basic-single form-control">
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <label for="produto">Produto:</label>
                    <div class="input-group">
                        <select name="produto" id="produto" class="js-example-basic-single form-control">

                            <option value="produto">ProdutoA</option>
                            <option value="produto">ProdutoB</option>
                            <option value="produto">ProdutoC</option>
                        </select>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info" onclick="addProduto()" id="btn-geraRelatorio">Adicionar Produto</button>
                        </span>
                     </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 col-md-2">
                    <span id='loading' style="display:none">
                        <img src="{{asset('imagens/loading.gif')}}" style="width:60px;height:60px; position:relative; left:0;top: 0px;">
                    </span>
                </div>
            </div>

            <br>
        </div>
    </div>

</div>
<div class="container">

    <div id="table"></div>

</div>





{{-- @endsection --}}
{{-- @section('postScripts') --}}

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript" src="{{asset('DataTables/datatables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/datahora1.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.pt-BR.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.pt.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!-- Custom Theme Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script> --}}

<!-- Custom Functions Scripts -->
<script src="{{asset('js/functions.js')}}"></script>




