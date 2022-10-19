<?php

include_once 'Conectar.php';

class Categoria {

    private $id;
    private $descricao;
    private $ramal;
    private $con;

    function getRamal() {
        return $this->ramal;
    }

    function setRamal($ramal) {
        $this->ramal = $ramal;
    }

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

    function consultar() {
        try {
            //estabelece conexão com bd
            $this->con = new Conectar();
            //monta a string sql
            $sql = "SELECT * FROM categoria";
            //faz a ligação entre a conexão com a string sql
            $ligacao = $this->con->prepare($sql);
            /*
             * faz um if ternário que verifica se a consulta foi executada == 1
             * se sim, retorna todos os registros da tabela fetchAll()
             * se não, retorna false
             */            
            return $ligacao->execute() == 1 ? $ligacao->fetchAll() : FALSE;
        } catch (PDOException $exc) {
            echo "Erro de bd " . $exc->getMessage();
        }
    }
   

    function salvar() {
        try {
            $this->con = new Conectar();
            $sql = "INSERT INTO categoria VALUES (null, ?, ?)";
            $ligacao = $this->con->prepare($sql);      

             $ligacao->bindValue(1, $this->descricao);
             $ligacao->bindValue(2, $this->ramal);    

            return $ligacao->execute() == 1 ? "Cadastro com Sucesso" : "Erro ao cadastrar";
        } catch (PDOException $exc) {
            echo "Erro de bd " . $exc->getMessage();
        }
    }

function excluir() {
        try {
            $this->con = new Conectar();
            $sql = "DELETE FROM categoria WHERE id = ?";
            $ligacao = $this->con->prepare($sql);      

             $ligacao->bindValue(1, $this->id);
    

            return $ligacao->execute() == 1 ? "Excluido com sucesso" : "Erro ao excluir ";
        } catch (PDOException $exc) {
            echo "Erro de bd " . $exc->getMessage();
        }
    }



    /*
      function salvar() {
      //acesso ao arquivo categoria.json
      $dados = json_decode(file_get_contents('../json/categoria.json'), TRUE);

      //preparar os dados
      $lista_dados = array(
      'id' => $this->id,
      'descricao' => $this->descricao
      );
      //ela une a estrutura do arquivo json com os dados que deseja enviar
      $dados[] = $lista_dados;

      //abre o json para gravação
      $gravar = json_encode($dados, JSON_PRETTY_PRINT);
      file_put_contents('../json/categoria.json', $gravar);
      }

      function consultar() {
      return $dados = json_decode(file_get_contents('../json/categoria.json'));
      }

      function excluir(){
      $arquivo = file_get_contents('../json/categoria.json');
      $dados = json_decode($arquivo, TRUE);

      foreach ($dados as $key => $registro){
      if($registro['id'] == $this->id){
      unset($dados[$key]);
      }
      }
      $arquivo = json_encode($dados);
      file_put_contents('../json/categoria.json', $arquivo);
      return true;
      }
     * 
     */
}
