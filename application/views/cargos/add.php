<div id="main" class="container-fluid">

    <h3 class="page-header">Adicionar Cargo</h3>

    <form action="<?= base_url('cargos/add/new') ?>" method="post">
        <div class="row">
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Descrição</label>
                <input type="nome" class="form-control" id="exampleInputEmail1" name="descricao">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Salário</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="salario">
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="<?= base_url('cargos/index') ?>" class="btn btn-default">Cancelar</a>
            </div>
        </div>

    </form>
</div>