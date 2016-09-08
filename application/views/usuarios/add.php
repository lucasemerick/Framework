<div id="main" class="container-fluid">

    <h3 class="page-header">Adicionar Usuário</h3>

    <form action="<?= base_url('usuarios/add') ?>" method="post">
        <div class="row">
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Nome</label>
                <input type="nome" class="form-control" id="exampleInputEmail1" placeholder="Nome">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Login</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Login">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Senha</label>
                <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Senha">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Grupo</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Grupo">
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="<?= base_url('usuarios/index') ?>" class="btn btn-default">Cancelar</a>
            </div>
        </div>

    </form>
</div>