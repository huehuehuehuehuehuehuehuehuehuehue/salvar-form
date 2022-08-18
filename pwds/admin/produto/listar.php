<h3>Lista de Produtos</h3>
<a class="btn btn-outline-primary float-right" href="?p=produto/salvar">Add</a>
<br><br>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Descrição</th>
            <th scope="col">Estoque</th>
            <th scope="col">ValorUnit</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include_once '../class/Produto.php';
        $cat = new Produto();
        $dados = $cat->consultar();
        
        if (!empty($dados)) {
            foreach ($dados as $mostrar) {
                ?>
                <tr>
                    <th scope="row"><?= $mostrar->id ?></th>
                    <td><?= $mostrar->descricao ?></td>
                    <td><?= $mostrar->estoque ?></td>
                    <td><?= $mostrar->valorunit ?></td>
                    
                    <td>
                        <a href="?p=produto/salvar" class="btn btn-primary">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="?p=produto/excluir&id=<?= $mostrar->id ?>" class="btn btn-danger" data-confirm="Excluir registro?">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr> 
                <?php
            }
        }
        ?>
    </tbody>
</table>
