<div id="main" class="container-fluid">

    <h3 class="page-header">Visualizar Categorias</h3>

    <div class="row">
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Nome</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $categoria['nome'] ?>" disabled>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-md-12">
            <a href="<?= base_url('categorias/index') ?>" class="btn btn-default">Voltar</a>
        </div>
    </div>

</div>