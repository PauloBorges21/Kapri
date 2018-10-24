<?php
/**
 * Created by PhpStorm.
 * User: paulo.borges
 * Date: 11/10/2018
 * Time: 11:03
 */
class Contato
{
    private $pdo;

    public function __construct()
    {

        $this->pdo = new PDO("mysql:dbname=db_kapri;host=db-kapri.mysql.uhserver.com", "kapri", "200814L@ur@");
    }

    public function adicionar($id_permissao, $nome, $email, $senha, $data_cadastro)
    {
        //1 passo verificar se já existe email cadastrado
        //2 passo adicionar
        if ($this->existeEmail($email) == false) {  //executando o primeiro passo; se entrar no if o usuário não existe
            $sql = "INSERT INTO tb_usuarios (id_permissao, nome, email, senha, data_cadastro) VALUES (:id_permissao, :nome, :email, :senha, :data_cadastro)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':id_permissao', $id_permissao);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':senha', $senha);
            $sql->bindValue(':data_cadastro', $data_cadastro);
            $sql->execute();


        } else {
            return false;
        }
    }

    public function getNome($email)
    {
        $sql = "SELECT nome FROM tb_usuarios WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $info = $sql->fetch();
            return $info['nome'];
        } else {
            return 'Ocorreu algo errado';
    }
    }


    public function getAll()
    {
        $sql = "SELECT * FROM db_kapri.tb_usuarios";
        $sql = $this->pdo->query($sql);
        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return array();
        }
    }

    public function editar($nome, $email)
    { //usando  existir email como validação
        if ($this->existeEmail($email)) {
            $sql = "UPDATE tb_usuarios SET db_kapri.tb_usuarios.nome = :db_kapri.tb_usuarios.nome WHERE db_kapri.tb_usuarios.email = :db_kapri.tb_usuarios.email";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->execute();

            return true;


        } else {
            return false;
        }

    }

    public function excluir($email)
    {
        if ($this->existeEmail($email)) {
            $sql = "DELETE FROM db_kapri.tb_usuarios WHERE db_kapri.tb_usuarios.email = :db_kapri.tb_usuarios.email";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':email', $email);
            $sql->execute();
            return true;
        } else {
            return false;
        }
    }

    private function existeEmail($email)
    {
        $sql = "SELECT * FROM tb_usuarios WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

}


