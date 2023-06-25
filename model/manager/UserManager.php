<?php
class UserManager extends DbManager
{
    public function getByUsername($login)
    {
        $query = $this->bdd->prepare(
            "SELECT * FROM user WHERE login = :login"
        );
        $query->bindParam("login", $login);

        $query->execute();
        $res = $query->fetch();

        $user = null;
        if ($res != false) {
            $user = new User($res["id"], $res["login"], $res["password"]);
        }

        return $user;
    }
}
