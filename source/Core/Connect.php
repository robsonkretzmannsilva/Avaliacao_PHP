<?php

namespace Source\Core;

use \PDO;
use \PDOException;

/**
 * Class Connect
 * @package Source\Core
 */
class Connect
{
    private const OPTIONS = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ];
    private $databaseFile;

    private static $instance;

    /**
     * @return PDO
     */
    public static function getInstance(): PDO
    {
        $databaseFile = realpath(__DIR__ . "/../../database/db.sqlite");
        if (empty(self::$instance)) {
            try {
                self::$instance = new PDO(
                    "sqlite:{$databaseFile}"
                );

            } catch (PDOException $exception) {
                die("<h1>Whoops! Erro ao conectar...</h1>");
            }
        }

        return self::$instance;
    }

    /**
     * Connect constructor.
     */
    final private function __construct()
    {
    }

    /**
     * Connect clone.
     */
    final private function __clone()
    {
    }
}