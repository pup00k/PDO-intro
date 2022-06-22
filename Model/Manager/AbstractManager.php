<?php

namespace Model\Manager;
use Model\Connect;

abstract class AbstractManager {

    public static function executerRequete($sql, $params = NULL) {

        $pdo = Connect::seConnecter();

        if ($params == NULL){
            $result = $pdo->query($sql);
        }else{
            $result = $pdo->prepare($sql);
            $result->execute($params);
        }

        return $result;
    }
    
}