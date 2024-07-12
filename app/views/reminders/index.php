<?php require_once 'app/views/templates/header.php'; ?>

<div class="container my-3">
    <?php if (isset($_SESSION['username']) && $_SESSION['username'] === 'admin'): ?>
        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active aria-current="page">Reminders</a></li>
                <li class="breadcrumb-item"><a href="/reports">Dashboard</a></li>
            </ol>
        </nav>
    <?php endif; ?>
   
    <div class="page-header text-center mb-4">
        <h2 class="display-5">Your Reminders</h2>
        <hr>
        <p>
            <a href="/reminders/create" class="btn btn-secondary">Create a new Reminder</a>
        </p>
    </div>

    <div class="row">
        <?php foreach ($data['reminders'] as $reminder): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($reminder['subject']); ?></h5>
                        <p class="card-text">
                            <small class="text-muted">Created at: <?php echo htmlspecialchars($reminder['created_at']); ?></small>
                        </p>
                        <a href="/reminders/update/<?php echo $reminder['id']; ?>" class="btn btn-secondary">Update</a>
                        <a href="/reminders/delete/<?php echo $reminder['id']; ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require_once 'app/views/templates/footer.php'; ?>
