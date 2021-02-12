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

    public function findid(int $id): ?array
    {
        $conn = Connect::getInstance();
        $all = $conn->query("SELECT * FROM  users where id = $id");


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

        $terms = explode(" = ", $terms);
        $iduser = $terms[1];
        $conn->query("delete from user_colors where user_id = $iduser");

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

            $id = $conn->lastInsertId();
            if (!empty($data["opcoes"])) {
                for ($i = 0; $i <= count($data["opcoes"]) - 1; $i++) {
                    //var_dump($data["opcoes"][$i]);
                    $idcor = $data["opcoes"][$i];
                    $cor = $conn->query("insert into user_colors(user_id,color_id) values($id,$idcor)");
                }
            }

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

            $result = $conn->query("UPDATE users set name =" . "'" . $data["name"] . "'" . ",email =" . "'" . $data["email"] . "'" . "where id =" . $id);
            

            if ($result) {
                $cor = $conn->query("delete from user_colors where user_id = $id");
                if (!empty($data["opcoes"])) {
                    for ($i = 0; $i <= count($data["opcoes"]) - 1; $i++) {
                        //var_dump($data["opcoes"][$i]);
                        $idcor = $data["opcoes"][$i];
                        $cor = $conn->query("insert into user_colors(user_id,color_id) values($id,$idcor)");
                    }
                }
                return "Usuario Editado Com Sucesso";
            }


        } else {
            return null;
        }

    }


}