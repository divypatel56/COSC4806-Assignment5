<?php require_once 'app/views/templates/header.php' ?>

<div class="container mt-3">
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/reminders">Reminders</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="display-4 text-center">Admin Reports</h1>
                <hr>
            </div>
        </div>
    </div>
  
    <div class="row">
        <!-- View All Reminders Section -->
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header bg-dark bg-gradient text-white">
                    <h2>All Reminders</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Username</th>
                                    <th>Subject</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['allReminders'] as $reminder): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($reminder['username']); ?></td>
                                        <td><?php echo htmlspecialchars($reminder['subject']); ?></td>
                                        <td><?php echo htmlspecialchars($reminder['created_at']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- User with Most Reminders Section -->
        <div class="col-lg-3 mb-4">
            <div class="card">
                <div class="card-header bg-dark bg-gradient text-white">
                    <h2>User with Most Reminders</h2>
                </div>
                <div class="card-body">
                    <?php if ($data['mostReminders']): ?>
                        <p><strong>Username:</strong> <?php echo htmlspecialchars($data['mostReminders']['username']); ?></p>
                        <p><strong>Number of Reminders:</strong> <?php echo htmlspecialchars($data['mostReminders']['reminder_count']); ?></p>
                    <?php else: ?>
                        <p>No reminders found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Total Logins by User Section -->
        <div class="col-lg-3 mb-4">
            <div class="card">
                <div class="card-header bg-dark bg-gradient text-white">
                    <h2>Total Logins by User</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Username</th>
                                    <th>Total Logins</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['totalLogins'] as $login): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($login['username']); ?></td>
                                        <td><?php echo htmlspecialchars($login['total_logins']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>

<?php require_once 'app/views/templates/footer.php'; ?>
