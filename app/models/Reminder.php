<?php

class Reminder {

  public function __construct() {

  }
     // Method to get all reminders for a specific user
  public function getAll_reminders ($user_id) {
      $db = db_connect();
      $statement = $db->prepare("SELECT * FROM reminders WHERE user_id = :user_id");
      $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
      $statement->execute();
      return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
    // Method to get a single reminder by its ID
  public function get_reminder($id) {
      $db = db_connect();
      $statement = $db->prepare("SELECT * FROM reminders WHERE id = :id");
      $statement->bindParam(':id', $id, PDO::PARAM_INT);
      $statement->execute();
      return $statement->fetch(PDO::FETCH_ASSOC);
  }
    // Method to create a new reminder
  public function create_reminder($user_id, $subject) {
      $db = db_connect();
      $statement = $db->prepare("INSERT INTO reminders (user_id, subject, created_at) VALUES (:user_id, :subject, NOW())");
      $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
      $statement->bindParam(':subject', $subject, PDO::PARAM_STR);
      $statement->execute();
  }
    // Method to update existing reminder
  public function update_reminder($id, $subject) {
      $db = db_connect();
      $statement = $db->prepare("UPDATE reminders SET subject = :subject WHERE id = :id");
      $statement->bindParam(':id', $id, PDO::PARAM_INT);
      $statement->bindParam(':subject', $subject, PDO::PARAM_STR);
      $statement->execute();
  }
    // Method to delete existing reminder
    public function delete_reminder($id) {
          $db = db_connect();
          $statement = $db->prepare("DELETE FROM reminders WHERE id = :id");
          $statement->bindParam(':id', $id, PDO::PARAM_INT);
          $statement->execute();
      }
}  
?>