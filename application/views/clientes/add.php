<div id="main" class="container-fluid">

    <h3 class="page-header">Adicionar Endereço</h3>

    <form action="<?= base_url('clientes/add/new') ?>" method="post">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Nome</label>
                <input type="nome" class="form-control" id="exampleInputEmail1" name="nome">
            </div>
            <div class="form-group col-md-2">
                <label for="exampleInputEmail1">CPF</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="cpf">
            </div>
            <div class="form-group col-md-2">
                <label for="exampleInputEmail1">Telefone</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="telefone">
            </div>
            <div class="form-group col-md-2">
                <label for="exampleInputEmail1">Renda</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="renda">
            </div>
            <div class="form-group col-md-2">
                <label for="exampleInputEmail1">Data de cadastro</label>
                <input type="date" class="form-control" id="exampleInputEmail1" name="data_cadastro">
            </div>
            </br>
            <div class="form-group col-md-6">
                <label>Endereço</label>
                <?php foreach ($enderecos as $endereco) { ?>
                    <div class="radio">
                        <label><input type="radio" name="endereco_id" value="<?= $endereco['id'] ?>"><?php echo $endereco['logradouro'], ', ', $endereco['bairro'], ', ', $endereco['cidade'], ', ', $endereco['estado'], ', ', $endereco['cep'] ?></label>
                    </div>
                <?php } ?>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="<?= base_url('clientes/index') ?>" class="btn btn-default">Cancelar</a>
            </div>
        </div>

    </form>
</div>