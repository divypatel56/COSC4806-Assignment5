<?php require_once 'app/views/templates/header.php' ?>

<div class="container mt-5">
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
    </div>    
    
</div>

