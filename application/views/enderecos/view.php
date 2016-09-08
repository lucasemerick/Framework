<div id="main" class="container-fluid">

    <h3 class="page-header">Visualizar Endereço</h3>

    <div class="row">
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">CEP</label>
            <input type="nome" class="form-control" id="exampleInputEmail1" value="<?= $endereco['cep'] ?>" disabled>
        </div>
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Logradouro</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $endereco['logradouro'] ?>" disabled>
        </div>
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Bairro</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $endereco['bairro'] ?>" disabled>
        </div>
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Cidade</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $endereco['cidade'] ?>" disabled>
        </div>
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Estado</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $endereco['estado'] ?>" disabled>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-md-12">
            <a href="<?= base_url('enderecos/index') ?>" class="btn btn-default">Voltar</a>
        </div>
    </div>

</div>