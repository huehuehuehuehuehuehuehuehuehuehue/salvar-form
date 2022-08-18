<!--admin/cliente/salvar.php-->
<h3>Cadastro de Cliente</h3>
<a class="btn btn-outline-danger float-right" href="?p=cliente/listar">Voltar</a>
<br><br>
<form method="post" enctype="multipart/form-data" name="frmCadastro" id="frmCadastro">
<div class="form-group">
<label for="exampleInputId">ID</label>
<input type="number" class="form-control" id="exampleInputId" name="txtid">
</div>
<div class="form-group">
<label for="exampleInputText">Nome</label>
<input type="text" class="form-control" id="exampleInputText" placeholder="Informe o seu nome" name="txtdescricao">
</div>
<div class="form-group">
</div>
<label for="exampleInputText">Email</label>
<input type="text" class="form-control" id="exampleInputText" placeholder="Informe a descrição da categoria" name="email">
<input type="submit" class="btn btn-primary" name="btnsalvar" value="Salvar">
</form>
<?php
//se eu clicar no botão salvar
if(filter_input(INPUT_POST, 'btnsalvar')){
    //capturei dados do form HTML para variáveis
    $id = filter_input(INPUT_POST, 'txtid', FILTER_SANITIZE_NUMBER_INT);
    $descricao = filter_input(INPUT_POST, 'txtdescricao', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    
    //comunicação com class Categoria
    include_once '../class/Cliente.php';
    $cat = new Cliente();
    
    //enviar dados que capturei do form para class Categoria
    $cat->setId($id);
    $cat->setDescricao($descricao);
    $cat->setEmail($email);
    
    //efetivar o cadastro
    $cat->salvar();
    
}