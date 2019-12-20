<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Stage;
use App\Entity\Entreprise;
use App\Entity\Formation;
use App\Repository\StageRepository;
use App\Repository\EntrepriseRepository;
use App\Repository\FormationRepository;

class ProStagesController extends AbstractController
{

    public function index(StageRepository $repositoryStage)
    {
        $stages=$repositoryStage->findall();
        return $this->render('pro_stages/index.html.twig',['stages'=>$stages]);
    }
    public function entreprises(EntrepriseRepository $repositoryEntreprise)
    {
        $entreprises=$repositoryEntreprise->findall();
        return $this->render('pro_stages/entreprises.html.twig',['entreprises'=>$entreprises]);

    }
    public function formations(FormationRepository $repositoryFormation)
    {
        $formations=$repositoryFormation->findall();
        return $this->render('pro_stages/formations.html.twig',['formations'=>$formations]);

    }
    public function stages(Stage $stage)
    {
        return $this->render('pro_stages/stages.html.twig',
        ['stage'=>$stage]);

    }
    public function entreprise(Entreprise $entreprise)
    {
        
        return $this->render('pro_stages/entreprise.html.twig',
        ['entreprise'=>$entreprise]);

    }
    public function formation(Formation $formation)
    {

        return $this->render('pro_stages/formation.html.twig',
        ['formation'=>$formation]);

    }
}
