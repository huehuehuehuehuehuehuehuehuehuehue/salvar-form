<h3>Lista de Clientes</h3>
<a class="btn btn-outline-primary float-right" href="?p=cliente/salvar">Add</a>
<br><br>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Descrição</th>
            <th scope="col">Email</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include_once '../class/Cliente.php';
        $cat = new Cliente();
        $dados = $cat->consultar();
        
        if (!empty($dados)) {
            foreach ($dados as $mostrar) {
                ?>
                <tr>
                    <th scope="row"><?= $mostrar->id ?></th>
                    <td><?= $mostrar->descricao ?></td>
                    <td><?= $mostrar->email ?></td>
                    <td>
                        <a href="?p=cliente/salvar" class="btn btn-primary">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="?p=cliente/excluir&id=<?= $mostrar->id ?>" class="btn btn-danger" data-confirm="Excluir registro?">
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
