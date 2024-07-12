<?php require_once 'app/views/templates/header.php'; ?>

<div class="container my-4">
    <div class="text-center">
        <h1 class="display-4">Create Reminder</h1>
        <hr>
    </div>
    <form action="/reminders/create" method="POST">
        <div class="mb-3">
            <label for="subject" class="form-label text-dark">Subject</label>
            <input type="text" class="form-control" id="subject" placeholder="Create a reminder" name="subject" required>
        </div>
        <div class="mb-3">
            <a href="/reminders" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
<div class="mt-auto">
    <?php require_once 'app/views/templates/footer.php'; ?>
</div>

