<?php
//MODEL POUR LA TABLE JOUEURS
class ModelPlayer{
    private ?int $id;
    private ?string $pseudo;
    private ?string $email;
    private ?int $score;
    private ?string $password;
    private ?PDO $bdd;

    public function __construct(){}
    /*
    public function __construct(int $id, ?string $pseudo, ?string $email, ?int $score, ?string $password, ?PDO $bdd) {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->email = $email;
        $this->score = $score;
        $this->password = $password;
        $this->bdd = connect();
    }*/

    public function getId(): ?int {
        return $this->id;
    }
    public function setId(?int $id): self {
        $this->id = $id;
        return $this;
    }


    public function getPseudo(): ?string {
        return $this->pseudo;
    }
    public function setPseudo(?string $pseudo): self {
        $this->pseudo = $pseudo;
        return $this;
    }


    public function getEmail(): ?string {
        return $this->email;
    }
    public function setEmail(?string $email): self {
        $this->email = $email;
        return $this;
    }


    public function getScore(): ?int {
        return $this->score;
    }
    public function setScore(?int $score): self {
        $this->score = $score;
        return $this;
    }


    public function getPassword(): ?string {
        return $this->password;
    }
    public function setPassword(?string $password): self {
        $this->password = $password;
        return $this;
    }


    public function getBdd(): ?PDO {
        return $this->bdd;
    }
    public function setBdd(?PDO $bdd): self {
        $this->bdd = $bdd;
        return $this;
    }
}
?>