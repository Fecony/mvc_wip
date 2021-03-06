<?php

class Controller
{
    public $vars = [];
    public $layout = 'default';

    function set($d)
    {
        $this->vars = array_merge($this->vars, $d);
    }

    function render($filename)
    {
        extract($this->vars);
        ob_start();
        require ROOT."app/views/".ucfirst(str_replace('Controller', '', get_class($this))).'/'.$filename.'.php';
        $content_for_layout = ob_get_clean();

        if ($this->layout == false) {
            $content_for_layout;
        } else {
            require ROOT."app/views/layouts/".$this->layout.'.php';
        }
    }

    private function secure_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        
        return $data;
    }

    private function secure_form($form)
    {
        foreach ($form as $key => $value) {
            $form[key] = $this->secure_input($value);
        }
    }
}
