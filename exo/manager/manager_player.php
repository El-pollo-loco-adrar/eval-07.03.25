<?php
class ManagerPlayer extends ModelPlayer {

    //METHOD

    //Fonction pour ajouter un joueur à la BDD

    public function addPlayer() {

        echo "On rentre dans ma fonction";

        if (isset($_POST["addPlayer"])) {

            echo"test";

            if(empty($_POST["pseudo"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["score"])) {
                return 'Veuillez remplir les champs';
            }

                if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                    return 'Email pas au bon format';
                }

                $pseudo = sanitize($_POST['pseudo']);
                $password = sanitize($_POST['password']);
                $email = sanitize($_POST['email']);
                $score = sanitize($_POST['score']);

                $password = password_hash($password, PASSWORD_BCRYPT);

                




        try {

            $req = $this->getBdd()->prepare('INSERT INTO players (pseudo, email, score, psswrd) VALUES (?,?,?,?)');

            $pseudo = $this->getPseudo();
            $email = $this->getEmail();
            $score = $this->getScore();
            $password = $this->getPassword();

            $req->bindParam(1, $pseudo, PDO::PARAM_STR);
            $req->bindParam(2, $email, PDO::PARAM_STR);
            $req->bindParam(3, $score, PDO::PARAM_STR);
            $req->bindParam(4, $password, PDO::PARAM_STR);

            $req->execute();

            return "$pseudo a bien été enregistrer.";
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }
    }


    //Fonction pour récupérer la liste des joueurs de la BDD
    public function getPlayers(): array | string{

        try{
            $req=$this->getBdd()->prepare("SELECT id, pseudo, email, score FROM players");

            $req->execute();

            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            return $data;

        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }


    //Fonction pour récupérer un utilisateur grace à son email
    public function getPlayerByMail():array | string{
        try{
            $req=$this->getBdd()->prepare("SELECT id, pseudo, email, score, psswrd FROM players WHERE email = ? LIMIT 1");

            $email = $this->getEmail();

            $req->bindParam(1, $email, PDO::PARAM_STR);

            $req->execute();

            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            return $data;

        }catch(EXCEPTION $error){
            return $error->getMessage();
        }

    }
}
?>