<?php
    try {
        $db = new PDO(
            "mysql:dbname=<nameHere>;host=localhost",
            "root",
            ""
        );
        echo "Deu certo";
    } catch (PDOException $exception) {
        echo $exception;
    }
?>