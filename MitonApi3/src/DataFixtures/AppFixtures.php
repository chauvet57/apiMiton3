<?php

namespace App\DataFixtures;

use App\Entity\Aliment;
use App\Entity\Categorie;
use App\Entity\CategorieAliment;
use App\Entity\Difficulte;
use App\Entity\Note;
use App\Entity\Price;
use App\Entity\Unite;
use App\Repository\CategorieAlimentRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class AppFixtures extends Fixture 
{
    private $repoCat;
    public function __construct(CategorieAlimentRepository $repoCat){

        $this->repoCat = $repoCat;
    }
    
    public function load(ObjectManager $manager)
    {
        //$this->loadCategories($manager);
        //$this->loadCategorieAliment($manager);
        //$this->loadAliment($manager);
        //$this->loadDifficulte($manager);
        //$this->loadPrix($manager);
        //$this->loadUnite($manager);
        //$this->loadNote($manager);
    }

    public function loadCategories(ObjectManager $manager){
        $datas = ["Plats", "Entrées", "Boissons", "Desserts", "Amuses bouches", "Sauces", "Accompagnements", "Confiserie"];

        for($i=0 ; $i<count($datas) ; $i++){

            $categories = new Categorie();
            $categories->setNomCategorie($datas[$i]);

            $manager->persist($categories);
        }
        $manager->flush();
    }
     public function loadCategorieAliment(ObjectManager $manager){
        $datas = ["Viande", "Poisson", "Légume", "Fruit", "Aromate", "Céréale", "Épices", "Produit laitier"];

        for($i=0 ; $i< count($datas); $i++){

            $categorieAliment = new CategorieAliment();
            $categorieAliment->setCategorieAliment($datas[$i]);
            $manager->persist($categorieAliment);
        }
        $manager->flush();
    }
    public function loadDifficulte(ObjectManager $manager){
        $datas = ["Trés facile", "Facile", "Niveau moyen", "Difficile"];

        for($i=0 ; $i< count($datas) ; $i++){

            $difficultes = new Difficulte();
            $difficultes->setNomDifficulte($datas[$i]);

            $manager->persist($difficultes);
        }
        $manager->flush();
    }
    public function loadPrix(ObjectManager $manager){
        $datas = ["Bon marché", "Coût moyen", "Assez cher"];

        for($i=0 ; $i< count($datas) ; $i++){

            $prix = new Price();
            $prix->setNomPrix($datas[$i]);

            $manager->persist($prix);
        }
        $manager->flush();
    }
    public function loadAliment(ObjectManager $manager){
       
        $datas = [
                    ["id" => 1,"nom" => "Boeuf"],
                    ["id" => 1,"nom" => "Poulet"],
                    ["id" => 2,"nom" => "Saumon"],
                    ["id" => 2,"nom" => "Sandre"],
                    ["id" => 3,"nom" => "Courgette"],
                    ["id" => 3,"nom" => "Haricot"],
                    ["id" => 4,"nom" => "Cerise"],
                    ["id" => 4,"nom" => "Fraise"],
                    ["id" => 5,"nom" => "Ail"],
                    ["id" => 5,"nom" => "Ognions"],
                    ["id" => 6,"nom" => "Maïs"],
                    ["id" => 6,"nom" => "Ebly"],
                    ["id" => 7,"nom" => "Gingembre"],
                    ["id" => 7,"nom" => "Persil"],
                    ["id" => 8,"nom" => "Beurre"],
                    ["id" => 8,"nom" => "Lait"]
                ];

        for($i=0 ; $i<count($datas) ; $i++){
            
            
            
            $aliment = new Aliment();
            $aliment->setNomAliment($datas[$i]["nom"]);
            $aliment->setCategorieAliment($this->repoCat->find($datas[$i]["id"]));
            $manager->persist($aliment);
        }
        $manager->flush();
    }
    public function loadUnite(ObjectManager $manager){
        $datas = ["Kg","g","L","dl","cl","ml",
                  "cuillière a café", "cuillière a soupe", 
                  "Pièces","Pièce","Feuille","Feuilles","Pot de yaourt"];

        for($i=0 ; $i< count($datas) ; $i++){

            $prix = new Unite();
            $prix->setNomUnite($datas[$i]);

            $manager->persist($prix);
        }
        $manager->flush();
    }
    public function loadNote(ObjectManager $manager){
        $datas = [1,2,3,4,5];

        for($i=0 ; $i< count($datas) ; $i++){

            $prix = new Note();
            $prix->setNomNote($datas[$i]);

            $manager->persist($prix);
        }
        $manager->flush();
    }

}
