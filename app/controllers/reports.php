<?php

class Reports extends Controller {

    public function index() {
        if (!isset($_SESSION['auth']) || $_SESSION['username'] !== 'admin') {
            header('Location: /login');
            exit();
        }

        $reminder = $this->model('Reminder');
        $user = $this->model('User');

        // View all reminders
        $allReminders = $reminder->viewAll_reminders();

        $this->view('reports/index', [
            'allReminders' => $allReminders
        ]);

        
    }
}
?>