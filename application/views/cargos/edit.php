<div id="main" class="container-fluid">

    <h3 class="page-header">Editar Cargo</h3>
    <form action="<?= base_url('cargos/editar/save/id/') . $cargo['id'] ?>" method="post">
        <div class="row">
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">CEP</label>
                <input type="nome" class="form-control" id="exampleInputEmail1" value="<?= $cargo['descricao'] ?>" name="descricao">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Logradouro</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $cargo['salario'] ?>" name="salario">
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="<?= base_url('cargos/index') ?>" class="btn btn-default">Voltar</a>
            </div>
        </div>
    </form>
</div>