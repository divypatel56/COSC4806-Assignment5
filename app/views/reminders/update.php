<?php require_once 'app/views/templates/header.php' ?>

<div class="container-fluid">
  <h2>Update Reminder</h2>
  <form action="/reminders/update/<?php echo $data['reminder']['id']; ?>" method="post">
    <div class="form-group">
      <div class="mb-3">
        <label for="subject" class="form-label">Subject</label>
        <input type="text" class="form-control" placeholder="Update reminder" name="subject" value="<?php echo htmlspecialchars($data['reminder']['subject']); ?>" required >
      </div>
    </div>
    <button type="submit" class="btn btn-dark">Update</button>
  </form>
</div>

<?php require_once 'app/views/templates/footer.php' ?>
