<?php

namespace Model\Manager;

interface ManagerInterface {

    // Une interface est utilisée ici pour obligé les Manager à implémenter au minimum ces 2 méthodes findAll et findOneById (dans chaque Manager --> implements ManagerInterface)
    public function findAll();
    public function findOneById($id);
}