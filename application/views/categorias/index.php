<div id="main" class="container-fluid" style="margin-top: 50px">

    <div id="top" class="row">
        <div class="col-sm-3">
            <h2>Categorias</h2>
        </div>
        <div class="col-sm-6">
            <form action="<?= base_url('categorias/pesquisar') ?>" method="post">
                <div class="input-group h2">
                    <input name="valor" class="form-control" id="search" type="text" placeholder="Pesquisar categorias">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
        </div>
        <div class="col-sm-3">
            <a href="<?= base_url('categorias/add') ?>" class="btn btn-primary pull-right h2">Novo</a>
        </div>
    </div> <!-- /#top -->


    <hr />
    <div id="list" class="row">
        <div class="table-responsive col-md-12">
            <table class="table table-striped" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th class="actions">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($categorias)) {
                        foreach ($categorias as $categoria) {
                            ?>
                            <tr>
                                <td><?= $categoria['nome'] ?></td>
                                <td class='actions'>
                                    <a class='btn btn-success btn-xs' href='<?= base_url("categorias/ler/id/{$categoria['id']}") ?>'>Visualizar</a>
                                    <a class='btn btn-warning btn-xs' href='<?= base_url("categorias/editar/read/id/{$categoria['id']}") ?>'>Editar</a>
                                    <a class='btn btn-danger btn-xs'  href='<?= base_url("categorias/excluir/id/{$categoria['id']}") ?>' onclick=" return confirm('Deseja realmente excluir o cargo?')">Excluir</a>
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
