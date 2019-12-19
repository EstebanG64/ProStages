<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Stage;
use App\Entity\Entreprise;
use App\Entity\Formation;

class ProStagesController extends AbstractController
{

    public function index()
    {
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);
        $stages=$repositoryStage->findall();
        return $this->render('pro_stages/index.html.twig',['stages'=>$stages]);
    }
    public function entreprises()
    {
        $repositoryEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprises=$repositoryEntreprise->findall();
        return $this->render('pro_stages/entreprises.html.twig',['entreprises'=>$entreprises]);

    }
    public function formations()
    {
        $repositoryFormation = $this->getDoctrine()->getRepository(Formation::class);
        $formations=$repositoryFormation->findall();
        return $this->render('pro_stages/formations.html.twig',['formations'=>$formations]);

    }
    public function stages($id)
    {
        $repoStage = $this->getDoctrine()->getRepository(Stage::class);
        $stage = $repoStage->find($id);
        return $this->render('pro_stages/stages.html.twig',
        ['stage'=>$stage]);

    }
    public function entreprise($id)
    {
        $repoStage = $this->getDoctrine()->getRepository(Stage::class);
        $stage = $repoStage->findByEntreprise($id);
        return $this->render('pro_stages/entreprise.html.twig',
        ['stages'=>$stage]);

    }
    public function formation($id)
    {
        $repoFormation = $this->getDoctrine()->getRepository(Formation::class);
        $formation = $repoFormation->find($id);
        return $this->render('pro_stages/formation.html.twig',
        ['formation'=>$formation]);

    }
}
