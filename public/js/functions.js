
$(document).ready(function() {
    $('.js-example-basic-single').select2({
        width: 'resolve'
    });
});

$(document).ready(function() {
    let today = new Date();
    let date = today.getDate().toString().padStart(2, '0') + '/' +
    (today.getMonth() + 1).toString().padStart(2, '0') + '/' +
    today.getFullYear();

    $('#data').val(date);
});




function limpa_formulário_cep() {
        //Limpa valores do formulário de cep.
        document.getElementById('endereco').value=("");
        document.getElementById('bairro').value=("");
        document.getElementById('cidade').value=("");
        document.getElementById('uf').value=("");

}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('endereco').value=(conteudo.logradouro);
        document.getElementById('bairro').value=(conteudo.bairro);
        document.getElementById('cidade').value=(conteudo.localidade);
        document.getElementById('uf').value=(conteudo.uf);

    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) {


    cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('endereco').value="...";
            document.getElementById('bairro').value="...";
            document.getElementById('cidade').value="...";
            document.getElementById('uf').value="...";


            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};


function addVenda(){

    if($("#endereco").val()==''){
        $("#msg").html("<div class='alert alert-danger'> O campo Rua é obrigatório!</div>");
        return;
    }
    if($("#numero").val()==''){
        $("#msg").html("<div class='alert alert-danger'> O campo Número é obrigatório!</div>");
        return;
    }
    if($("#complemento").val()==''){
        $("#msg").html("<div class='alert alert-danger'> O campo Complemento é obrigatório!</div>");
        return;
    }
    if($("#bairro").val()==''){
        $("#msg").html("<div class='alert alert-danger'> O campo Bairro é obrigatório!</div>");
        return;
    }
    if($("#cidade").val()==''){
        $("#msg").html("<div class='alert alert-danger'> O campo Cidade é obrigatório!</div>");
        return;
    }
    if($("#uf").val()==''){
        $("#msg").html("<div class='alert alert-danger'> O campo UF é obrigatório!</div>");
        return;
    }

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });

    var data = {
        data: $("#data").val(),
        cep: $("#cep").val(),
        rua: $("#rua").val(),
        numero: $("#numero").val(),
        complemento: $("#complemento").val(),
        bairro: $("#bairro").val(),
        cidade: $("#cidade").val(),
        uf: $("#uf").val(),
    };

    $.ajax("addVenda", {
        method: "GET",
        cache: false,
        data: data,
        beforeSend: function() {


            $("#tableValor-body").html("");
            $("#loading").show();
        },
        success: function(response) {
            $("#loading").hide();
            $('#vendaId').val(response);
            $("#msg").html("<div class='alert alert-success'> Endereço salvo com sucesso! Prossiga com a inclusão dos produtos.</div>");

        },
        error: function(erro) {
            $("#msg").html(JSON.stringify(erro, true));
            $("#loading").hide();
        }
    });


}



function addProduto(){

    $("#msg").html("");

    if($("#vendaId").val()==''){

        $("#msg").html("<div class='alert alert-danger'> Salve o Endereço antes de adicionar o produto!</div>");
        return;
    }

        var data = {
            referencia: $("#selProduto").val(),
            vendaId: $("#vendaId").val(),
        }

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });

        $.ajax("addProduct", {
            method: "GET",
            cache: false,
            data: data,
            beforeSend: function() {

                $("#loading").show();
            },
            success: function(response) {
                $("#loading").hide();
                $('#tableValor-body').append(response);

                first = +$('#total').val();
                second = +$("#selProduto option:selected").attr('preco');

                total = first + second;
                total = Math.round(total * 100) / 100;
                total = total.toFixed(2);
                $('#total').val(total);
            },
            error: function(erro) {
                $("#msg").html(JSON.stringify(erro, true));
                $("#loading").hide();
            }
        });


        }

function getProdutos(){

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    var options = "";


    $.ajax("getProduct", {
        method: "GET",
        cache: false,
        dataType: "json",
        beforeSend: function() {
            $("#tableValor-body").html("");
            $("#loading").show();
        },
        success: function(response) {

            $("#loading").hide();
            $.each(response, function(index, value) {
                options +="<option preco='"+value.preco+"' value='" +value.referencia+"'>" +value.referencia+ ' - ' +value.nome +"</option>";
            });

            $("#selProduto").html(options);
        },
        error: function(erro) {
            alert(JSON.stringify(erro));
            $("#msg").html(JSON.stringify(erro, true));
            $("#loading").hide();
        }
    });
}

function finalizar()
{
    if($('#vendaId').val() != ""){

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });

        var data = {
            vendaId: $('#vendaId').val(),
            valorTotal: $("#total").val(),
        };

        $.ajax("finalizaVenda", {
            method: "GET",
            cache: false,
            data: data,
            beforeSend: function() {
                $("#loading").show();
            },
            success: function(response) {
                $("#loading").hide();
                $('#vendaId').val("");
                $('#cep').val("");
                $("#endereco").val("");
                $("#numero").val("");
                $("#complemento").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#tableValor-body").html("");
                $('#total').val("");
                $("#msg").html("<div class='alert alert-success'>Venda Finalizada!</div>");

            },
            error: function(erro) {
                $("#loading").hide();
                $("#msg").html(JSON.stringify(erro, true));

            }
        });




    }else{
        $("#msg").html("<div class='alert alert-info'>Não há venda para finalizar!</div>");
    }

}



