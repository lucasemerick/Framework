<div id="main" class="container-fluid">

    <h3 class="page-header">Adicionar Categoria</h3>

    <form action="<?= base_url('categorias/add/new') ?>" method="post">
        <div class="row">
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Nome</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="nome">
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="<?= base_url('categorias/index') ?>" class="btn btn-default">Cancelar</a>
            </div>
        </div>

    </form>
</div>