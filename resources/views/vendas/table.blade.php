<a href="{{asset('storage/'.$geraPdf)}}"  target="_blank">Gerar PDF</a>
<table class="table table-bordered table-responsive table w-auto small" id="tbl-despesas">
    <thead>
        <th>Data</th>
        <th>Número OS</th>
        <th>Número Visita</th>
        <th>Atividade - Sigla</th>
        <th>Cliente</th>
        <th>Hospedagem</th>
        <th>Alimentação</th>
        <th>Estacionamento</th>
        <th>Pedágio</th>
        <th>Táxi/Aplicativo</th>
        <th>Materiais</th>
        <th>Outros</th>
    </thead>
    <tbody>
        @foreach($despesas as $key => $value)
            <tr>
                <td>{{date("d/m/Y", strtotime($value->date))}}</td>
                <td>{{$value->os}}</td>
                <td>{{$value->tarefa_externa}}</td>
                <td>{{$value->sigla_atividade}}</td>
                <td>{{$value->cliente}}</td>
                @if(isset($value->hospedagem))
                    <td>{{$value->hospedagem}}</td>
                @else
                    <td></td>
                @endif
                @if(isset($value->alimentacao))
                    <td>{{$value->alimentacao}}</td>
                @else
                    <td></td>
                @endif
                @if(isset($value->estacionamento))
                    <td>{{$value->estacionamento}}</td>
                @else
                    <td></td>
                @endif
                @if(isset($value->pedagio))
                    <td>{{$value->pedagio}}</td>
                @else
                    <td></td>
                @endif
                @if(isset($value->taxi))
                    <td>{{$value->taxi}}</td>
                @else
                    <td></td>
                @endif
                @if(isset($value->materiais))
                    <td>{{$value->materiais}}</td>
                @else
                    <td></td>
                @endif
                @if(isset($value->outras))
                    <td>{{$value->outras}}</td>
                @else
                    <td></td>
                @endif

            </tr>
        @endforeach
    <tr>
        <td style='border:none; text-align:center; font-weight:bold; background-color:#1d1d1d6b;' colspan='5'>Total</td>

        @foreach($totais as $key => $total)
            @if(isset($total->hospedagem_total))
                @if($key=='hospedagem_total')
                    <td style='font-weight:bold; background-color:#1d1d1d6b;'>R$ {{$total->hospedagem_total}}</td>
                @else
                    <td style='font-weight:bold; background-color:#1d1d1d6b;'></td>
                @endif
            @else
                <td style='font-weight:bold; background-color:#1d1d1d6b;'></td>
            @endif
        @endforeach
        @foreach($totais as $key => $total)
            @if(isset($total->alimentacao_total))
                @if($key=='alimentacao_total')
                    <td style='font-weight:bold; background-color:#1d1d1d6b;'>R$ {{$total->alimentacao_total}}</td>
                @else
                    <td style='font-weight:bold; background-color:#1d1d1d6b;'></td>
                @endif
            @else
                <td style='font-weight:bold; background-color:#1d1d1d6b;'></td>
            @endif
        @endforeach
        @foreach($totais as $key => $total)
            @if(isset($total->estacionamento_total))
                @if($key=='estacionamento_total')
                    <td style='font-weight:bold; background-color:#1d1d1d6b;'>R$ {{$total->estacionamento_total}}</td>
                @else
                    <td style='font-weight:bold; background-color:#1d1d1d6b;'></td>
                @endif
            @else
                <td style='font-weight:bold; background-color:#1d1d1d6b;'></td>
            @endif
        @endforeach
        @foreach($totais as $key => $total)
            @if(isset($total->pedagio_total))
                @if($key=='pedagio_total')
                    <td style='font-weight:bold; background-color:#1d1d1d6b;'>R$ {{$total->pedagio_total}}</td>
                @else
                    <td style='font-weight:bold; background-color:#1d1d1d6b;'></td>
                @endif
            @else
                <td style='font-weight:bold; background-color:#1d1d1d6b;'></td>
            @endif
        @endforeach
        @foreach($totais as $key => $total)
            @if(isset($total->taxi_total))
                @if($key=='taxi_total')
                    <td style='font-weight:bold; background-color:#1d1d1d6b;'>R$ {{$total->taxi_total}}</td>
                @else
                    <td style='font-weight:bold; background-color:#1d1d1d6b;'></td>
                @endif
            @else
                <td style='font-weight:bold; background-color:#1d1d1d6b;'></td>
            @endif
        @endforeach
        @foreach($totais as $key => $total)
            @if(isset($total->materiais_total))
                @if($key=='materiais_total')
                    <td style='font-weight:bold; background-color:#1d1d1d6b;'>R$ {{$total->materiais_total}}</td>
                @else
                    <td style='font-weight:bold; background-color:#1d1d1d6b;'></td>
                @endif
            @else
                <td style='font-weight:bold; background-color:#1d1d1d6b;'></td>
            @endif
        @endforeach
        @foreach($totais as $key => $total)
            @if(isset($total->outras_total))
                @if($key=='outras_total')
                    <td style='font-weight:bold; background-color:#1d1d1d6b;'>R$ {{$total->outras_total}}</td>
                @else
                    <td style='font-weight:bold; background-color:#1d1d1d6b;'></td>
                @endif
            @else
                <td style='font-weight:bold; background-color:#1d1d1d6b;'></td>
            @endif
        @endforeach
    </tr>
    <tr>
        <td colspan='10'></td>
        <td style='font-weight:bold; background-color:#1d1d1d6b;'>Total Geral</td>

        <td style='font-weight:bold; background-color:#1d1d1d6b;'>R$ {{ $totalGeral }}</td>
    </tr>
    </tbody>
</table>

