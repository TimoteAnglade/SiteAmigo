<?php

namespace App\Controller;

use App\Repository\TexteDynamiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

abstract class textesDynamiquesController extends AbstractController{
    function getTextesDico(TexteDynamiqueRepository $repoTextes, string $page): array
    {
        $textes = $repoTextes->findBy(['page'=>$page]);
        $textesDico = array();
        foreach($textes as $item) {
            $textesDico[$item->getCode()]=$item->getContenu();
        }
        return $textesDico;
    }
}
?>