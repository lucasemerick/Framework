<div id="main" class="container-fluid">

    <h3 class="page-header">Editar Endereço</h3>
    <form action="<?= base_url('enderecos/editar/save/id/') . $endereco['id'] ?>" method="post">
        <div class="row">
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">CEP</label>
                <input type="nome" class="form-control" id="exampleInputEmail1" value="<?= $endereco['cep'] ?>" name="cep">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Logradouro</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $endereco['logradouro'] ?>" name="logradouro">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Bairro</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $endereco['bairro'] ?>" name="bairro">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Cidade</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $endereco['cidade'] ?>" name="cidade">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Estado</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $endereco['estado'] ?>" name="estado">
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="<?= base_url('enderecos/index') ?>" class="btn btn-default">Voltar</a>
            </div>
        </div>
    </form>
</div>