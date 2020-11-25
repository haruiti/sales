
<title>Sistema de Vendas</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<link href="{{asset('css/select2.min.css')}}" rel="stylesheet" />

<link href=" https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />


<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-2 col-md-2">
                    <label for="data">Data:</label>
                    <input name="data" id="data" class="form-control" style="width: 100%">
                </div>
                <div class="col-sm-3 col-md-3">
                    <label for="regiao">CEP:</label>
                <input type="text" name="cep" id="cep" class="form-control" onblur="pesquisacep(this.value);">
                </div>
                <div class="col-sm-5 col-md-5">
                    <input type="hidden" id="vendaId" class="form-control" style="width: 100%">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5 col-md-5">
                    <label for="regiao">Rua:</label>
                    <input name="endereco" id="endereco" class="form-control" style="width: 100%">
                </div>
                <div class="col-sm-1 col-md-1">
                    <label for="regiao">Número:</label>
                    <input name="numero" id="numero" class="form-control" style="width: 100%">
                </div>
                <div class="col-sm-2 col-md-2">
                    <label for="regiao">Complemento:</label>
                    <input name="complemento" id="complemento" class="form-control" style="width: 100%">
                </div>
                <div class="col-sm-4 col-md-4">
                    <label for="regiao">Bairro:</label>
                    <input name="bairro" id="bairro" class="form-control" style="width: 100%">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 col-md-3">
                    <label for="regiao">Cidade:</label>
                    <input name="cidade" id="cidade" class="form-control" style="width: 100%">
                </div>
                <div class="col-sm-3 col-md-3">
                    <label for="regiao">UF:</label>
                    <div class="input-group">
                        <input name="uf" id="uf" class="form-control" style="width: 100%">

                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info" onclick="addVenda()" id="btn-geraRelatorio">Salvar Endereço</button>
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
            <div class="row">
                <div class="col-sm-8 col-md-8">
                    <label for="produto">Produto:</label>
                    <div class="input-group">
                        <select name="produto" id="selProduto" class="js-example-basic-single form-control" style="width: 100%">

                        </select>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info" onclick="addProduto()" id="btn-geraRelatorio">Adicionar Produto</button>
                        </span>

                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info" onclick="finalizar()" id="btn-geraRelatorio">Finalizar Venda</button>
                        </span>
                     </div>
                </div>
                <div class="col-sm-2 col-md-2">
                    <span id='loading' style="display:none">
                        <img src="{{asset('imagens/loading.gif')}}" style="width:60px;height:60px; position:relative; left:0;top: 0px;">
                    </span>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label for="data">Total:</label>
                    <input name="total" id="total" class="form-control" style="width: 100%">
                </div>
            </div><br>
            <div class="row">
                <div id="msg"></div>
            </div>
        </div>
    </div>
</div>


<div class="container">

    <table class="table table-bordered table-responsive table w-auto small" id="tbl-vendas">
        <thead>
            <th>Nome</th>
            <th>Preço</th>
            <th>Fornecedor(es)</th>
        </thead>
        <tbody>
            <tbody id="tableValor-body">
        </tbody>
    </table>

</div>


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{asset('js/functions.js')}}"></script>
<script>getProdutos()</script>


