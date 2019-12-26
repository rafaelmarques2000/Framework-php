@extends('template')

@section('content')

<script>
    function OpenFormCreateModule(){
        $("#modal-form").modal('show');
    }

    function CreateMiddleware(){
        if($("#nome-middleware").val() == ""){
            alert("Digite o nome do middleware.");
        }else{
            $("#form-modules").submit();
        }
    }

    function RemoveMiddleware($middleware){
      if(confirm("Deseja deletar este middleware ?(ATENÇÃO ESSA AÇÃO E IRREVERSIVEL)")){
         window.location = "/Framework-php/public/manager/middlewares/delete?middleware="+$middleware;
      }
    }
</script>

  <div class="action-bar">
     <a href="javascript:void(0)" onclick="OpenFormCreateModule()" class="btn btn-secondary btn-action">Adicionar</a>
  </div>

   <div class="row">
       <div class="col-md-12">
       <table class="table">
            <thead>
                <tr>
                <th scope="col">Middleware</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
             <?php foreach($middlewares as $middleware){ ?>   
                <tr>
                <td scope="row"><?=$middleware?></td>
                <td>
                    <a href="javascript:void(0)" onclick="RemoveMiddleware('<?=$middleware?>')" class="btn btn-danger">Excluir</a>
                </td>
                
                </tr>
             <?php } ?>
            
            </tbody>
        </table>
    </div>
   </div>

   <!--modal-->
   <div class="modal" tabindex="-1" role="dialog" id="modal-form">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Novo middleware</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="application/x-www-form-urlencoded" method="POST" id="form-modules" action="/Framework-php/public/manager/middlewares/create">
            <div class="form-group">
                <label>Nome do middleware</label>
                <input type="text" name="name_middleware" id="nome-middleware" class="form-control" placeholder="Digite o nome do middleware">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="CreateMiddleware()" class="btn btn-primary">Criar modulo</button>
      </div>
    </div>
  </div>
</div>



@endsection