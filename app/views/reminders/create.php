<?php require_once 'app/views/templates/header.php'; ?>
<div class="container-fluid">
  <h2>Create Reminder</h2>
  <form action="/reminders/create" method="POST">
    <div class="form-group">
      <div class="mb-3">
        <label for="subject" class="form-label">Subject</label>
        <input type="text" class="form-control" placeholder="Create a reminder" name="subject" required>
      </div>


    </div>
    <button type="submit" class="btn btn-dark">Create</button>
  </form>
</div>
<?php require_once 'app/views/templates/footer.php'; ?>