<?php

class tasksController extends Controller
{
    public function index()
    {
        require ROOT.'app/models/Task.php';

        $tasks = new Task();

        $d['tasks'] = $tasks->showAllTasks();
        $this->set($d);
        $this->render('index');
    }

    public function create()
    {
        if (isset($_POST['title'])) {
            require ROOT.'app/models/Task.php';

            $task = new Task();

            if ($task->create($_POST['title'], $_POST['description'])) {
                header('Location: '.WEBROOT.'tasks/index');
            }
        }

        $this->render('create');
    }

    public function edit($id)
    {
        require ROOT.'app/models/Task.php';
        $task = new Task();

        $d['task'] = $task->showTask($id);

        if (isset($_POST['title'])) {
            if ($task->edit($id, $_POST['title'], $_POST['description'])) {
                header('Location: '.WEBROOT.'tasks/index');
            }
        }
        $this->set($d);
        $this->render('edit');
    }

    public function delete($id)
    {
        require ROOT.'app/models/Task.php';

        $task = new Task();
        if ($task->delete($id)) {
            header('Location: '.WEBROOT.'tasks/index');
        }
    }
}
