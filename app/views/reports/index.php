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
        <!-- First row: View All Reminders and User with Most Reminders -->
        <div class="col-lg-6 mb-3">
            <div class="card">
                <div class="card-header bg-dark bg-gradient text-white">
                    <h2>All Reminders</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
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

        <div class="col-lg-6 mb-3">
            <div class="card">
                <div class="card-header bg-success text-white">
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

            <div class="card mt-3" style="max-width: 300px;">
                <div class="card-header bg-dark bg-gradient text-white">
                    <h2>Reminders by User</h2>
                </div>
                <div class="card-body">
                    <canvas id="reminderChart" style="max-width: 300px;"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <!-- Second row: Total Logins by User and Chart for Analysis -->
        <div class="col-lg-6 mb-5">
            <div class="card">
                <div class="card-header bg-warning text-white">
                    <h2>Total Logins by User</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
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

        <div class="col-lg-6 mb-3">
            <div class="card" style="max-width: 600px;">
                <div class="card-header bg-dark bg-gradient text-white">
                    <h2>Analysis Chart</h2>
                </div>
                <div class="card-body">
                    <canvas id="loginChart" style="max-width: 600px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'app/views/templates/footer.php'; ?>

<!-- Add the Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Process data to get total reminders for each unique username
    var reminders = <?php echo json_encode($data['allReminders']); ?>;
    var reminderCounts = {};
    reminders.forEach(function(reminder) {
        if (reminder.username in reminderCounts) {
            reminderCounts[reminder.username]++;
        } else {
            reminderCounts[reminder.username] = 1;
        }
    });

    var usernames = Object.keys(reminderCounts);
    var reminderTotals = Object.values(reminderCounts);
    var totalReminders = reminderTotals.reduce((a, b) => a + b, 0);
    var reminderPercentages = reminderTotals.map(function(count) {
        return ((count / totalReminders) * 100).toFixed(2);
    });

    // Dark colors
    var darkColors = [
        'rgba(0, 123, 255, 0.8)', // Blue
        'rgba(40, 167, 69, 0.8)', // Green
        'rgba(255, 193, 7, 0.8)', // Yellow
        'rgba(220, 53, 69, 0.8)', // Red
        'rgba(23, 162, 184, 0.8)', // Teal
        'rgba(108, 117, 125, 0.8)' // Gray
    ];

    var darkBorderColors = [
        'rgba(0, 123, 255, 1)',
        'rgba(40, 167, 69, 1)',
        'rgba(255, 193, 7, 1)',
        'rgba(220, 53, 69, 1)',
        'rgba(23, 162, 184, 1)',
        'rgba(108, 117, 125, 1)'
    ];

    // Login Chart
    var ctxLogin = document.getElementById('loginChart').getContext('2d');
    var loginChart = new Chart(ctxLogin, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(array_column($data['totalLogins'], 'username')); ?>,
            datasets: [{
                label: 'Total Logins',
                data: <?php echo json_encode(array_column($data['totalLogins'], 'total_logins')); ?>,
                backgroundColor: darkColors,
                borderColor: darkBorderColors,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Reminders Chart
    var ctxReminder = document.getElementById('reminderChart').getContext('2d');
    var reminderChart = new Chart(ctxReminder, {
        type: 'pie',
        data: {
            labels: usernames,
            datasets: [{
                label: 'Total Reminders',
                data: reminderPercentages,
                backgroundColor: darkColors,
                borderColor: darkBorderColors,
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return usernames[tooltipItem.dataIndex] + ': ' + reminderPercentages[tooltipItem.dataIndex] + '%';
                        }
                    }
                }
            }
        }
    });
</script>
