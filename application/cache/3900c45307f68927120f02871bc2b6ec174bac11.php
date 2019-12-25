<?php $__env->startSection('content'); ?>

<script>
    function OpenFormCreateModule(){
        $("#modal-form").modal('show');
    }

    function CreateModule(){
        if($("#nome-modulo").val() == ""){
            alert("Digite o nome do modulo.");
        }else{
            $("#form-modules").submit();
        }
    }

    function RemoveModule($module){
      if(confirm("Deseja deletar este modulo ?(ATENÇÃO ESSA AÇÃO E IRREVERSIVEL)")){
         window.location = "/Framework-php/public/manager/modules/delete?module="+$module;
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
                <th scope="col">Modulo</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
             <?php foreach($directorys as $module){ ?>   
                <tr>
                <td scope="row"><?=$module?></td>
                <td>
                    <a href="javascript:void(0)" onclick="RemoveModule('<?=$module?>')" class="btn btn-danger">Excluir</a>
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
        <h5 class="modal-title">Novo modulo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="application/x-www-form-urlencoded" method="POST" id="form-modules" action="/Framework-php/public/manager/modules/create">
            <div class="form-group">
                <label>Nome do modulo</label>
                <input type="text" name="nome_modulo" id="nome-modulo" class="form-control" placeholder="Digite o nome do modulo">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="CreateModule()" class="btn btn-primary">Criar modulo</button>
      </div>
    </div>
  </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Framework-php/application/modules/manager/views/modules.blade.php ENDPATH**/ ?>