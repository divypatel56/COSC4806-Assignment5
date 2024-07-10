<?php

class Reminders extends Controller {

  // Index method to show the list of reminders
  public function index() {
      $reminder = $this->model('Reminder');
      $list_reminders = $reminder->getAll_reminders($_SESSION['userid']);

      $this->view('reminders/index', ["reminders" => $list_reminders]);
  }
// Create Method to add a new reminder
   public function create(){
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $_SESSION['subject'] = $_POST['subject'];
         $reminder = $this->model('Reminder');
         $reminder->create_reminder($_SESSION['userid'], $_SESSION['subject']);
         unset($_SESSION['subject']);
         header('Location: /reminders');
     } else {
         $this->view('reminders/create');
     }
   }

  // Update method to modify existing reminder
  public function update($id) {
      $reminder = $this->model('Reminder');
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $_SESSION['subject'] = $_POST['subject'];
          $reminder->update_reminder($id, $_SESSION['subject']);
          unset($_SESSION['subject']);
          header('Location: /reminders');
      } else {
          $reminder_data = $reminder->get_reminder($id);
          $this->view('reminders/update', ['reminder' => $reminder_data]);
      }
  }
    //Delete method to delete reminder
    public function delete($id) {
        $reminder = $this->model('Reminder');
        $reminder->delete_reminder($id);
        header('Location: /reminders');
    }
  
}