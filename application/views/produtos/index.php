<div id="main" class="container-fluid" style="margin-top: 50px">

    <div id="top" class="row">
        <div class="col-sm-3">
            <h2>Produtos</h2>
        </div>
        <div class="col-sm-6">
            <form action="<?= base_url('produtos/pesquisar') ?>" method="post">
                <div class="input-group h2">
                    <input name="valor" class="form-control" id="search" type="text" placeholder="Pesquisar produtos">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
        </div>
        <div class="col-sm-3">
            <a href="<?= base_url('produtos/add') ?>" class="btn btn-primary pull-right h2">Novo</a>
        </div>
    </div> <!-- /#top -->


    <hr />
    <div id="list" class="row">
        <div class="table-responsive col-md-12">
            <table class="table table-striped" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th>Quantidade</th>
                        <th>Valor</th>
                        <th class="actions">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($produtos)) {
                        foreach ($produtos as $produto) {
                            ?>
                            <tr>
                                <td><?= $produto['id'] ?></td>
                                <td><?= $produto['descricao'] ?></td>
                                <td><?= $produto['quantidade'] ?></td>
                                <td><?= $produto['valor'] ?></td>
                                <td class='actions'>
                                    <a class='btn btn-success btn-xs' href='<?= base_url("produtos/ler/id/{$produto['id']}") ?>'>Visualizar</a>
                                    <a class='btn btn-warning btn-xs' href='<?= base_url("produtos/editar/read/id/{$produto['id']}") ?>'>Editar</a>
                                    <a class='btn btn-danger btn-xs'  href='<?= base_url("produtos/excluir/id/{$produto['id']}") ?>' onclick=" return confirm('Deseja realmente excluir o funcionário?')">Excluir</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div> <!--/#list -->

    <div id = "bottom" class = "row">
        <div class = "col-md-12">
            <ul class = "pagination">
                <li class = "disabled"><a>&lt;
                        Anterior</a></li>
                <li class = "disabled"><a>1</a></li>
                <li><a href = "#">2</a></li>
                <li><a href = "#">3</a></li>
                <li class = "next"><a href = "#" rel = "next">Próximo &gt;
                    </a></li>
            </ul><!--/.pagination -->
        </div>
    </div> <!--/#bottom -->
</div> <!--/#main -->
