<div id="main" class="container-fluid">

    <h3 class="page-header">Adicionar Pedido</h3>

    <form action="<?= base_url('pedidos/add/new') ?>" method="post">
        <div class="row">
            <div class="form-group col-md-4">
                <label>Funcionário</label>
                <select class="form-control" name="funcionario_id">
                    <option></option>
                    <?php foreach ($funcionarios as $funcionario) { ?>
                        <option value="<?= $funcionario['id'] ?>"><?= $funcionario['nome'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label>Cliente</label>
                <select class="form-control" name="cliente_id">
                    <option></option>
                    <?php foreach ($clientes as $cliente) { ?>
                        <option value="<?= $cliente['id'] ?>"><?= $cliente['nome'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Data de Cadastro</label>
                <input type="date" class="form-control" id="exampleInputEmail1" name="data_cadastro">
            </div>
            <div class="form-group col-md-12">
                <table class="table table-striped" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>Adicionar</th>
                            <th>Produto</th>
                            <th>Valor Unitario</th>
                            <th>Disponível</th>
                            <th>Quantidade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($produtos)) {
                            $indice = 0;
                            foreach ($produtos as $produto) {
                                ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" id="prod" name="produtos[<?= $indice ?>][produto_id]" value="<?= $produto['id'] ?>" onchange="habilitaText(this, 'quant' + <?= $indice ?>)">
                                    </td>
                                    <td><?= $produto['descricao'] ?></td>
                                    <td><?= $produto['valor'] ?></td>
                                    <td><?= $produto['quantidade'] ?></td>
                                    <td>
                                        <input class="form-control" disabled id="quant<?= $indice ?>" type="number" min="0" max="<?= $produto['quantidade'] ?>" name="produtos[<?= $indice ?>][quantidade]">
                                    </td>
                                </tr>
                                <?php
                                $indice++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="<?= base_url('pedidos/index') ?>" class="btn btn-default">Cancelar</a>
            </div>
        </div>

    </form>
</div>