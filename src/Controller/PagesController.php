<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Repository\EntrepriseRepository;
use App\Repository\EvenementRepository;
use App\Repository\MembreAmigoRepository;
use App\Repository\OffreEmploiRepository;
use App\Repository\TexteDynamiqueRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PagesController extends textesDynamiquesController
{

   public function __construct (protected RequestStack $requestStack) {
   }

    #[Route('/', name: 'amigo')]
    public function amigo(TexteDynamiqueRepository $repoTextes, MembreAmigoRepository $membres): Response
    {
        return $this->render('guest/amigo.html.twig', [
            'controller_name' => 'PagesController',
            'textes' => $this->getTextesDico($repoTextes, "amigo"),
            'membres' => $membres->findAll(),
        ]);
    }

    #[Route('/miage', name: 'miage')]
    public function index(TexteDynamiqueRepository $repoTextes): Response
    {
        return $this->render('guest/index.html.twig', [
            'controller_name' => 'PagesController',
            'textes' => $this->getTextesDico($repoTextes, "accueil"),
        ]);
    }

    #[Route('/offresetalternances', name: 'offresetalternances')]
    public function offres(TexteDynamiqueRepository $repoTextes, OffreEmploiRepository $repoOffres): Response
    {
        $requete = $this->requestStack->getCurrentRequest();
        $niveau = $requete->get('niveau');
        dump($niveau);
        if(is_null($niveau)) {
            $offresRecherchees = $repoOffres->findAll();
        } else {
            $offresRecherchees = $repoOffres->findByNiveauDetude($niveau);
        }



        return $this->render('guest/offres_stages_alternances.html.twig', [
            'controller_name' => 'PagesController',
            'textes' => $this->getTextesDico($repoTextes, "offresetalternances"),
            'offres' => $offresRecherchees,
        ]);
    }

    #[Route('/evenements', name: 'evenements')]
    public function evenements(TexteDynamiqueRepository $repoTextes, EvenementRepository $evenements): Response
    {
        
        $evenementsEnGros = $evenements->getPast();


        //DEBUG
        /*
        $exemple = $evenements->getPast()[0];
        for($i=0; $i<3; $i++) {
            $evenementsEnGros[] = $exemple;
        }
        */
        //DEBUG

        $evenementsEnGrosParPaires = array();
        $nbGros = sizeof($evenementsEnGros);
        for($i = 0; $i<$nbGros; $i++) {
            if( ($i%2) == 0 ){
                if($i == ($nbGros-1) ) {
                    $evenementsEnGrosParPaires[] = array($evenementsEnGros[$i]);
                } else {
                    $evenementsEnGrosParPaires[] = array($evenementsEnGros[$i], $evenementsEnGros[$i+1]);
                }
            }
        }
        if($nbGros%2==0){
            $nbGros=-1;
        }

        $evenementsPasses = $evenements->getPast();
        $evenementsPassesRanges = array();
        $anneeExistentes = array();
        foreach ($evenementsPasses as $item) {
            $annee = $item->getDate()->format('Y');
            if(in_array($annee, $evenementsPassesRanges) ) {
                $evenementsPassesRanges[$annee][] = $item;
            } else {
                $evenementsPassesRanges[$annee] = array($item);
                $anneeExistentes[]=$annee;
            }
        }

        return $this->render('guest/evenements.html.twig', [
            'controller_name' => 'PagesController',
            'textes' => $this->getTextesDico($repoTextes, "amigo"),
            'upcoming' => $evenementsEnGrosParPaires,
            'nbUpcoming' => $nbGros,
            'past' => $evenementsPassesRanges,
            'annees' => $anneeExistentes,
        ]);
    }

    #[Route('/entreprises', name: 'entreprises')]
    public function entreprises(TexteDynamiqueRepository $repoTextes, EntrepriseRepository $repoEntreprises): Response
    {

        $entreprises = $repoEntreprises->findAll();
        $entreprises[] = $entreprises[0];
        $entreprises[] = $entreprises[0];
        $entreprises[] = $entreprises[0];
        $entreprises[] = $entreprises[0];
        $entreprises[] = $entreprises[0];


        return $this->render('guest/entreprises.html.twig', [
            'controller_name' => 'PagesController',
            'textes' => $this->getTextesDico($repoTextes, "amigo"),
            'entreprises' => $entreprises,
        ]);
    }

    #[Route('/tempo', name: 'tempo')]
    public function tempo(): Response
    {
        return $this->render('guest/tempo.html.twig', [
        ]);
    }

    #[Route('/evenementDetails', name: 'evenementDetails')]
    public function evenementDetails(): Response
    {
        return $this->render('guest/tempo.html.twig', [
        ]);
    }

}
