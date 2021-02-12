<?php

namespace Source\Models;


use Source\Core\Connect;

/**
 * Class UserModel
 * @package Source\Models
 */
class User
{


    public function all(): ?array
    {
        $conn = Connect::getInstance();
        $all = $conn->query("SELECT * FROM  users");


        return $all->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    public function destroy($terms = ""): ?User
    {
        $conn = Connect::getInstance();
        if (!empty($terms)) {
            $conn->query("delete from users where {$terms}");

        } else {
            $conn->query("delete from users");
        }

        $this->message = "Usuário removido com sucesso";
        $this->data = null;
        return $this;
    }

    public function save($data)
    {
        if (!empty($data["opcoes"])) {
            for ($i = 0; $i <= count($data["opcoes"]) - 1; $i++) {
                //var_dump($data["opcoes"][$i]);
            }
        }
        if (!empty($data)) {
            $conn = Connect::getInstance();
            $result = $conn->query("INSERT INTO users(name,email) VALUES(" . "'" . $data['name'] . "'," . "'" . $data['email'] . "'" . ")");


            if ($result) {
                return "Usuario Adiconado Com Sucesso";
            }


        } else {
            return null;
        }

    }

    public function update($data, $id)
    {
        if (!empty($data)) {
            $conn = Connect::getInstance();
            $result = $conn->query("UPDATE users set name =" . "'" . $data . "'" . "where id =" . $id);


            if ($result) {
                return "Usuario Editado Com Sucesso";
            }


        } else {
            return null;
        }

    }


}