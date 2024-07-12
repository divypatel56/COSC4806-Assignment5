  <?php require_once 'app/views/templates/header.php'; ?>
  <div class="container my-4">
      <div class="page-header text-center mb-4">
          <h1 class="display-4">Update Reminder</h1>
          <hr>
        </div>
      <form action="/reminders/update/<?php echo $data['reminder']['id']; ?>" method="post">
          <div class="form-group mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" class="form-control" placeholder="Update reminder" name="subject" value="<?php echo htmlspecialchars($data['reminder']['subject']); ?>" required>
          </div>
        <a href="/reminders" class="btn btn-secondary">Cancel</a>      
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    
  </div>  
<?php require_once 'app/views/templates/footer.php'; ?>

