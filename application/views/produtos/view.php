<div id="main" class="container-fluid">

    <h3 class="page-header">Visualizar Produto</h3>

    <div class="row">
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Nome</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $produto['descricao'] ?>" disabled>
        </div>
        <div class="form-group col-md-2">
            <label for="exampleInputEmail1">Entrada</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $produto['quantidade'] ?>" disabled>
        </div>
        <div class="form-group col-md-2">
            <label for="exampleInputEmail1">Telefone</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $produto['valor'] ?>" disabled>
        </div>
        <?php
        foreach ($fornecedores as $fornecedor) {
            if ($produto['fornecedor_id'] == $fornecedor['id']) {
                ?>
                <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Fornecedor</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $fornecedor['nome'] ?>" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">CNPJ Fornecedor</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $fornecedor['cnpj'] ?>" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Telefone Fornecedor</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $fornecedor['telefone'] ?>" disabled>
                </div>
                <?php
            }
        }
        ?>
        <?php
        foreach ($categorias as $categoria) {
            if ($produto['categoria_id'] == $categoria['id']) {
                ?>
                <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Categoria</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $categoria['nome'] ?>" disabled>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <hr />
    <div class="row">
        <div class="col-md-12">
            <a href="<?= base_url('produtos/index') ?>" class="btn btn-default">Voltar</a>
        </div>
    </div>
</div>