<?php

class User extends Model
{

    public function showAllUsers()
    {
        $sql = "SELECT * FROM users";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();

        return $req->fetchAll();
    }


}
