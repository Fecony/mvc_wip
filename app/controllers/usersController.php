<?php

class usersController extends Controller
{
    public function index()
    {
        require ROOT.'app/models/User.php';

        $users = new User();

        $d['users'] = $users->showAllUsers();
        $this->set($d);
        $this->render('index');
    }

}
