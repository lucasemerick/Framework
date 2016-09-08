<div id="main" class="container-fluid">

    <h3 class="page-header">Visualizar Cargo</h3>

    <div class="row">
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Descrição</label>
            <input type="nome" class="form-control" id="exampleInputEmail1" value="<?= $cargo['descricao'] ?>" disabled>
        </div>
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Salário</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $cargo['salario'] ?>" disabled>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-md-12">
            <a href="<?= base_url('cargos/index') ?>" class="btn btn-default">Voltar</a>
        </div>
    </div>

</div>