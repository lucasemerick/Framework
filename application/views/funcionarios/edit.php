<div id="main" class="container-fluid">

    <h3 class="page-header">Editar Funcionário</h3>
    <form action="<?= base_url('funcionarios/editar/save/id/') . $funcionario['id'] ?>" method="post">
        <div class="row">
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Nome</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $funcionario['nome'] ?>" name="nome">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Entrada</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $funcionario['entrada'] ?>" name="entrada">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Telefone</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $funcionario['telefone'] ?>" name="telefone">
            </div>
            <div class="form-group col-md-3">
                <label>Cargo</label>
                <select class="form-control" name="cargo_id">
                    <option value="nada"></option>
                    <?php
                    foreach ($cargos as $cargo) {
                        if ($cargo['id'] == $funcionario['cargo_id']) {
                            ?>
                            <option selected value="<?= $cargo['id'] ?>"><?= $cargo['descricao'] . ', ' . $cargo['salario'] ?></option>
                        <?php } else {
                            ?>
                            <option value="<?= $cargo['id'] ?>"><?= $cargo['descricao'] . ', ' . $cargo['salario'] ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label>Endereço</label>
                <?php
                foreach ($enderecos as $endereco) {
                    if ($funcionario['endereco_id'] == $endereco['id']) {
                        ?>
                        <div class="radio">
                            <label><input type="radio" checked name="endereco_id" value="<?= $endereco['id'] ?>"><?php echo $endereco['logradouro'], ', ', $endereco['bairro'], ', ', $endereco['cidade'], ', ', $endereco['estado'], ', ', $endereco['cep'] ?></label>
                        </div>
                    <?php } else { ?>
                        <div class="radio">
                            <label><input type="radio" name="endereco_id" value="<?= $endereco['id'] ?>"><?php echo $endereco['logradouro'], ', ', $endereco['bairro'], ', ', $endereco['cidade'], ', ', $endereco['estado'], ', ', $endereco['cep'] ?></label>
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
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="<?= base_url('funcionarios/index') ?>" class="btn btn-default">Voltar</a>
            </div>
        </div>
    </form>
</div>