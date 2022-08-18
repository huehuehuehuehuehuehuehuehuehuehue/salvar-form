<?php

class Produto {

    private $id;
    private $descricao;
    private $estoque;
    private $valorunit;
    
    function getId() {
        return $this->id;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    
    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }
    function getEstoque() {
        return $this->estoque;
    }

    function setEstoque($estoque) {
        $this->estoque = $estoque;
    }
    function getValorUnit() {
        return $this->email;
    }

    function setValorUnit($valorunit) {
        $this->valorunit = $valorunit;
    }



    function salvar() {
        //acesso ao arquivo categoria.json
        $dados = json_decode(file_get_contents('../json/produto.json'), TRUE);

        //preparar os dados
        $lista_dados = array(
            'id' => $this->id,
            'descricao' => $this->descricao,
            'estoque' => $this->estoque,
            'valorunit' => $this->valorunit,
        );
        //ela une a estrutura do arquivo json com os dados que deseja enviar
        $dados[] = $lista_dados;

        //abre o json para gravação
        $gravar = json_encode($dados, JSON_PRETTY_PRINT);
        file_put_contents('../json/produto.json', $gravar);
    }

    function consultar() {
        return $dados = json_decode(file_get_contents('../json/produto.json'));
    }
    
    function excluir(){
        $arquivo = file_get_contents('../json/produto.json');
        $dados = json_decode($arquivo, TRUE);
        
        foreach ($dados as $key => $registro){
            if($registro['id'] == $this->id){
                unset($dados[$key]);
            }
        }        
        $arquivo = json_encode($dados);
        file_put_contents('../json/produto.json', $arquivo);        
        return true;
    }

}
