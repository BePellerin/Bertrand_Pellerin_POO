<?php
class MotoManager extends DbManager
{
    public function getAll()
    {

        $query = $this->bdd->prepare("SELECT * FROM moto");
        $query->execute();
        $results = $query->fetchAll();


        $motos = [];


        foreach ($results as $res) {

            $motos[] = new Moto(
                $res['id'],
                $res['marque'],
                $res['modele'],
                $res['type'],
                $res['picture']
            );
        }
        return $motos;
    }

    public function add(Moto $moto)
    {
        $marque = $moto->getMarque();
        $modele = $moto->getModele();
        $type = $moto->getType();
        $picture = $moto->getPicture();

        $query = $this->bdd->prepare(
            "INSERT INTO moto (marque, modele, type, picture) VALUES
                    (:marque, :modele, :type, :picture)"
        );

        $query->execute(
            [
                "marque" => $marque,
                "modele" => $modele,
                "type" => $type,
                "picture" => $picture
            ]
        );

        $moto->setId($this->bdd->lastInsertId());

        return $moto;
    }

    public function getOne($id)
    {
        $query =
            $this->bdd->prepare("SELECT * FROM moto WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        $res = $query->fetch();

        $moto = null; 
        if ($res) {
            $moto = new Moto(
                $res['id'],
                $res['marque'],
                $res['modele'],
                $res["type"],
                $res["picture"]
            );
        }

            return $moto;
        }


        public function delete($id)
        {
            $query = $this->bdd->prepare("DELETE FROM moto WHERE id=:id");
            $query->bindParam("id", $id);
            $query->execute();
        }
        
   

    // public function getEnduro($type)
    // {
    //     $query =
    //         $this->bdd->prepare("SELECT * FROM moto WHERE type = enduro");
    //     $query->bindParam(':type', $type);
    //     $query->execute();
    //     $res = $query->fetch();

    //     $motoEnduro = null; 
    //     if ($res) {
    //         $motoEnduro = new Moto(
    //             $res['id'],
    //             $res['marque'],
    //             $res['modele'],
    //             $res["type"],
    //             $res["picture"]
    //         );
    //     }

    //         return  $motoEnduro;
    //     }

    //     public function getCustom($type)
    // {
    //     $query =
    //         $this->bdd->prepare("SELECT * FROM moto WHERE type = custom");
    //     $query->bindParam(':type', $type);
    //     $query->execute();
    //     $res = $query->fetch();

    //     $moto = null; 
    //     if ($res) {
    //         $moto = new Moto(
    //             $res['id'],
    //             $res['marque'],
    //             $res['modele'],
    //             $res["type"],
    //             $res["picture"]
    //         );
    //     }

    //         return $moto;
    //     }

    //     public function getSportive($type)
    // {
    //     $query =
    //         $this->bdd->prepare("SELECT * FROM moto WHERE type = sportive");
    //     $query->bindParam(':type', $type);
    //     $query->execute();
    //     $res = $query->fetch();

    //     $motoSportive = null; 
    //     if ($res) {
    //         $motoSportive = new Moto(
    //             $res['id'],
    //             $res['marque'],
    //             $res['modele'],
    //             $res["type"],
    //             $res["picture"]
    //         );
    //     }

    //         return $motoSportive;
    //     }

    //     public function getRoadster($type)
    // {
    //     $query =
    //         $this->bdd->prepare("SELECT * FROM moto WHERE type = roadster");
    //     $query->bindParam(':type', $type);
    //     $query->execute();
    //     $res = $query->fetch();

    //     $motoRoadtser = null; 
    //     if ($res) {
    //     $motoRoadtser = new Moto(
    //             $res['id'],
    //             $res['marque'],
    //             $res['modele'],
    //             $res["type"],
    //             $res["picture"]
    //         );
    //     }

    //         return $motoRoadtser;
    //     }
}