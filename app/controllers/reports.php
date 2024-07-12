<?php

class Reports extends Controller {

    public function index() {
        if (!isset($_SESSION['auth']) || $_SESSION['username'] !== 'admin') {
            header('Location: /login');
            exit();
        }

        $this->view('reports/index');

        
    }
}
?>