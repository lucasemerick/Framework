<div id="main" class="container-fluid">

    <h3 class="page-header">Editar Categoria</h3>
    <form action="<?= base_url('categorias/editar/save/id/') . $categoria['id'] ?>" method="post">
        <div class="row">
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Nome</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $categoria['nome'] ?>" name="nome">
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="<?= base_url('categorias/index') ?>" class="btn btn-default">Voltar</a>
            </div>
        </div>
    </form>
</div>