<?php $__env->startSection('content'); ?>

<script>
    function OpenFormCreateController(){
        $("#modal-form").modal('show');
    }

    function OpenFormFilter(){
        $("#modal-filter").modal('show');
    }

    function CreateController(){
        if($("#module-list").val() == ""){
            alert("Selecione um modulo.");
        }else if($("#name-controller").val() == ""){
            alert("Informe o nome do controller.");
        }else{
            $("#form-controllers").submit();
        }
    }

    function RemoveController($module,$controller){
      if(confirm("Deseja deletar este controller ?(ATENÇÃO ESSA AÇÃO E IRREVERSIVEL)")){
         window.location = "/Framework-php/public/manager/controllers/delete?module="+$module+"&controller="+$controller;
      }
    }

    function FilterControllers(){
        if($("#module-filter").val() === "")
          alert("Selecione um modulo para o filtro.");
        else
        window.location = "/Framework-php/public/manager/controllers/filter/"+$("#module-filter").val();
    }

</script>

  <div class="action-bar">
     <a href="javascript:void(0)" onclick="OpenFormCreateController()" class="btn btn-secondary btn-action">Adicionar</a>
     <a href="javascript:void(0)" onclick="OpenFormFilter()" class="btn btn-primary btn-action">Filtrar</a>
  </div>
  
  
   <div class="row">
       <div class="col-md-12">
       <table class="table">
            <thead>
                <tr>
                    <th scope="col">Modulo</th>
                    <th scope="col">Controller</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach($controllers as $controller) { ?>
                <tr>
                    <td scope="row"><?=$controller->module?></td>
                    <td scope="row"><?=$controller->controller?></td>
                    <td scope="row"><a href="javascript:void(0)" onclick="RemoveController('<?=$controller->module?>','<?=$controller->controller?>')" class="btn btn-danger">Excluir</a></th>
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
        <h5 class="modal-title">Novo Controller</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="application/x-www-form-urlencoded" method="POST" id="form-controllers" action="/Framework-php/public/manager/controllers/create">
          <div class="form-group">
                <label>Modulo</label>
                <select id="module-list" name="module_list" class="form-control">
                    <option value="">Selecione um modulo</option>
                    <?php foreach($directorys as $module){ ?>   
                        <option value="<?=$module?>"><?=$module?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Nome do controller</label>
                <input type="text" name="name_controller" id="name-controller" class="form-control" placeholder="Digite o nome do controller">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="CreateController()" class="btn btn-primary">Criar controller</button>
      </div>
    </div>
  </div>
</div>


<!--filtrar-->
<!--modal-->
<div class="modal" tabindex="-1" role="dialog" id="modal-filter">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Filtrar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label>Modulo</label>
                <select id="module-filter" class="form-control">
                    <option value="">Selecione um modulo</option>
                    <?php foreach($directorys as $module){ ?>   
                        <option value="<?=$module?>"><?=$module?></option>
                    <?php } ?>
                </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="FilterControllers()" class="btn btn-primary">Filtrar</button>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Framework-php/application/modules/manager/views/controllers.blade.php ENDPATH**/ ?>