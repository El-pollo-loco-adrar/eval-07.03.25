<!-- VUE DE LA PAGE D'ACCUEIL -->
<?php
class ViewHome{
    private ?string $message = "";
    private ?string $usersList = "";

    public function getMessage(): ?string { return $this->message; }
    public function setMessage(?string $message): self { $this->message = $message; return $this; }

    public function getUsersList(): ?string { return $this->usersList; }
    public function setUsersList(?string $usersList): self { $this->usersList = $usersList; return $this; }


    public function displayView(): string{

        return '
        <main>
            <section>
                <h1>Créer un nouveau joueur</h1>
                <form method="POST">
                    <input type="text" name="pseudo" placeholder="Votre pseudo">
                    <input type="text" name="email" placeholder="Votre email">
                    <input type="password" name="password" placeholder="Votre mot de passe">
                    <input type="text" name="score" placeholder="Votre score">
                    <input type="submit" name="addPlayer" value="Envoyer">
                </form>
                <p>'.$this->getMessage().'</p>
            </section>
            <section>
                <h1>Liste des joueurs</h1>
                <p>'.$this->getUsersList().'</p>
            </section>
        </main>
        ';
    }
}
?>


