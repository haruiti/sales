<div class="modal fade" id="tableDetailModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width:70%">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            <br>
          <h4 class="modal-title" id="exampleModalLongTitle">Log de Atribuição</h4>
        </div>
        <div class="modal-body"
        style="height: 70%;
          overflow: auto;">
              <table id = "table-atribuicao" class="table table-striped table-bordered nowrap">
                  <thead>
                      <tr>
                          <th>TSK</th>
                          <th>Pasta</th>
                          <th>Data</th>
                          <th>Técnico</th>
                          <th>Status</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($backlogs as $backlog)
                          <tr>
                              <td>{{$backlog->ntt}}</td>
                              <td> {{$backlog->fila_nome}} </td>
                              <td> {{date("d/m/yy H:i:s", strtotime($backlog->data))}} </td>
                              <td> {{$backlog->nome_tecnico}} </td>
                              @if($backlog->status==0)
                                <td>Aguardando resultado</td>
                              @elseif($backlog->status==1)
                                <td>Retornado para fila de Backlog</td>
                              @elseif($backlog->status==2)
                                <td>Atendido pelo técnico</td>
                              @endif
                          </tr>
                      @endforeach
                  </tbody>
              </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
          <button id ="btn-exporta" onclick="exporta()" type="button" class="btn btn-secondary" >Exportar</button>
        </div>
      </div>
    </div>
  </div>
<script>

function exporta(){
  $("#table-atribuicao").table2excel({
      
      // exclude CSS class
  
      exclude:".noExl",      
      name:"Worksheet Name",        
      filename:"Atribuição_Backlog",//do not include extension       
      fileext:".xls" // file extension
  
    });
}

</script>
