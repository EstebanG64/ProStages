<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Formation;
use App\Entity\Entreprise;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR'); // Créer un faker français

        //Création des formations

        $formationDUTInfo = new Formation();
        $formationLPProg = new Formation();
        $formationDUTIC = new Formation();

        $formationDUTInfo->setNom("DUT Informatique");
        $formationDUTInfo->setNomLong("Diplome universitaire de technologie informatique");

        $formationLPProg->setNom("LP Prog avancée");
        $formationLPProg->setNomLong("Licence professionnel programmation avancée");

        $formationDUTIC->setNom("DUT TIC");
        $formationDUTIC->setNomLong("Diplome universitaire des technologies de l'information et de la communication");

        $manager->persist($formationDUTInfo);
        $manager->persist($formationDUTIC);
        $manager->persist($formationLPProg);

        //Création des entreprises
        for($i = 0; $i < 5 ; $i++)
        {
            $entreprise = new Entreprise();
            $nomEntr=$faker->company();
            $nomSansSpeciaux = str_replace('.','',$nomEntr);
            $nomSansEspaces = str_replace(' ','',$nomSansSpeciaux);
            $entreprise->setNom($nomEntr);
            $entreprise->setAdresse($faker->address());
            $entreprise->setActivite($faker->jobtitle());
            $entreprise->setSite($nomSansEspaces.$faker->regexify('\.(fr|es|com)'));
            $manager->persist($entreprise);

        }
        $manager->flush();
    }
}
