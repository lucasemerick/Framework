<div id="main" class="container-fluid">

    <h3 class="page-header">Visualizar Fornecedor</h3>

    <div class="row">
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Nome</label>
            <input type="nome" class="form-control" id="exampleInputEmail1" value="<?= $fornecedor['nome'] ?>" disabled>
        </div>
        <div class="form-group col-md-2">
            <label for="exampleInputEmail1">CNPJ</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $fornecedor['cnpj'] ?>" disabled>
        </div>
        <div class="form-group col-md-2">
            <label for="exampleInputEmail1">Telefone</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $fornecedor['telefone'] ?>" disabled>
        </div>
        <div class="form-group col-md-6">
            <label>Endereço</label>
            <?php
            foreach ($enderecos as $endereco) {
                if ($fornecedor['endereco_id'] == $endereco['id']) {
                    ?>
                    <div class="radio">
                        <label><input type="radio" disabled checked name="endereco_id" value="<?= $endereco['id'] ?>"><?php echo $endereco['logradouro'], ', ', $endereco['bairro'], ', ', $endereco['cidade'], ', ', $endereco['estado'], ', ', $endereco['cep'] ?></label>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-md-12">
            <a href="<?= base_url('fornecedores/index') ?>" class="btn btn-default">Voltar</a>
        </div>
    </div>
</div>