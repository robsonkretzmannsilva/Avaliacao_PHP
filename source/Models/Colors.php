<?php


namespace Source\Models;


use Source\Core\Connect;

class Colors
{
    public function all(): ?array
    {
        $conn = Connect::getInstance();
        $all = $conn->query("SELECT * FROM  colors");


        return $all->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    public function findid(int $id): ?array
    {
        $conn = Connect::getInstance();
        $all = $conn->query("SELECT * FROM  colors where id = $id");


        return $all->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    public function destroy($terms = ""): ?Colors
    {
        $conn = Connect::getInstance();
        if (!empty($terms)) {
            $conn->query("delete from colors where {$terms}");

        } else {
            $conn->query("delete from colors");

        }

        return null;

    }

    public function save($data)
    {
        if (!empty($data)) {
            $conn = Connect::getInstance();
            $result = $conn->query("INSERT INTO colors(name) VALUES(" . "'" . $data . "'" . ")");


            if ($result) {
                return "Cor Adiconada Com Sucesso";
            }


        } else {
            return null;
        }

    }

    public function update($data, $id)
    {
        if (!empty($data)) {
            $conn = Connect::getInstance();
            $result = $conn->query("UPDATE colors set name =" . "'" . $data . "'" . "where id =" . $id);


            if ($result) {
                return "Cor Editada Com Sucesso";
            }


        } else {
            return null;
        }

    }
}