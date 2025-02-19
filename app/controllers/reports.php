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
        // Who has the most reminders
        $mostReminders = $reminder->most_reminders();
        // How many total logins by username
        $totalLogins = $user->get_totallogins();

        $this->view('reports/index', [
            'allReminders' => $allReminders,
            'mostReminders' => $mostReminders,
            'totalLogins' => $totalLogins
        ]);

        
    }
}
?>