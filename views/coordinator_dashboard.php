<?php
/**
 * Tech Coordinator Dashboard
 * Event creation, result entry, and leaderboard management
 */

$_SESSION['user_name'] = 'Tech Coordinator';
$_SESSION['user_role'] = 'coordinator';
$pageTitle = 'Coordinator Dashboard';

// Dummy data
$events = [
    ['id' => 1, 'name' => 'Web Development Challenge', 'date' => '2024-03-15', 'status' => 'Active'],
    ['id' => 2, 'name' => 'AI/ML Hackathon', 'date' => '2024-03-16', 'status' => 'Completed'],
    ['id' => 3, 'name' => 'Mobile App Showcase', 'date' => '2024-03-17', 'status' => 'Pending'],
];

$teams = [
    ['id' => 1, 'name' => 'Tech Titans'],
    ['id' => 2, 'name' => 'Code Wizards'],
    ['id' => 3, 'name' => 'Innovation Squad'],
];

include '../partials/header.php';
?>

<!-- Main Content -->
<div class="content">

    <!-- Dashboard Header -->
    <div style="margin-bottom: 40px;">
        <h1
            style="font-size: 32px; font-weight: 900; color: var(--accent-gold); font-family: 'Playfair Display', serif; margin-bottom: 10px;">
            🎯 Coordinator Control Panel
        </h1>
        <p style="color: var(--text-secondary);">Manage events, record results, and monitor leaderboard</p>
    </div>

    <!-- Statistics Cards -->
    <div class="dashboard-grid">
        <div class="stat-card">
            <div class="stat-icon">🎪</div>
            <div class="stat-label">Total Events</div>
            <div class="stat-value">8</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">✓</div>
            <div class="stat-label">Completed</div>
            <div class="stat-value">5</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">⏳</div>
            <div class="stat-label">Ongoing</div>
            <div class="stat-value">2</div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div
        style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 40px;">
        <button class="btn btn-primary" onclick="openModal('createEventModal')"
            style="width: 100%; justify-content: center;">
            <i class="fas fa-plus"></i> Create Event
        </button>
        <button class="btn btn-secondary" onclick="openModal('addResultModal')"
            style="width: 100%; justify-content: center;">
            <i class="fas fa-check"></i> Add Result
        </button>
        <button class="btn btn-success"
            onclick="document.getElementById('leaderboard').scrollIntoView({behavior: 'smooth'})"
            style="width: 100%; justify-content: center;">
            <i class="fas fa-chart-line"></i> View Results
        </button>
    </div>

    <!-- Events Management -->
    <div class="card mb-30">
        <div class="card-header">
            <div>
                <div class="card-title">🎪 Events</div>
                <div class="card-subtitle">Tech Fest events schedule</div>
            </div>
        </div>
        <div class="table-container">
            <table class="luxury-table">
                <thead>
                    <tr>
                        <th>Event Name</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($events as $event): ?>
                        <tr>
                            <td><strong><?php echo $event['name']; ?></strong></td>
                            <td><?php echo date('M d, Y', strtotime($event['date'])); ?></td>
                            <td>
                                <span style="
                  padding: 4px 12px;
                  border-radius: 6px;
                  font-size: 12px;
                  font-weight: 600;
                  <?php
                  if ($event['status'] === 'Completed') {
                      echo 'background: rgba(45, 154, 106, 0.1); color: var(--accent-emerald);';
                  } elseif ($event['status'] === 'Active') {
                      echo 'background: rgba(212, 175, 55, 0.1); color: var(--accent-gold);';
                  } else {
                      echo 'background: rgba(46, 92, 138, 0.1); color: var(--accent-blue);';
                  }
                  ?>
                ">
                                    <?php echo $event['status']; ?>
                                </span>
                            </td>
                            <td>
                                <button
                                    style="background: none; border: none; color: var(--accent-blue); cursor: pointer; font-size: 16px;"
                                    title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recent Results -->
    <div class="card mb-30">
        <div class="card-header">
            <div>
                <div class="card-title">📊 Recent Results</div>
                <div class="card-subtitle">Latest scores submitted</div>
            </div>
        </div>
        <div class="table-container">
            <table class="luxury-table">
                <thead>
                    <tr>
                        <th>Team</th>
                        <th>Event</th>
                        <th>Score</th>
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Code Wizards</strong></td>
                        <td>Web Development Challenge</td>
                        <td><span style="color: var(--accent-gold); font-weight: 700;">95</span></td>
                        <td>Today, 2:30 PM</td>
                    </tr>
                    <tr>
                        <td><strong>Tech Titans</strong></td>
                        <td>AI/ML Hackathon</td>
                        <td><span style="color: var(--accent-gold); font-weight: 700;">88</span></td>
                        <td>Today, 1:15 PM</td>
                    </tr>
                    <tr>
                        <td><strong>Innovation Squad</strong></td>
                        <td>Mobile App Showcase</td>
                        <td><span style="color: var(--accent-gold); font-weight: 700;">92</span></td>
                        <td>Yesterday, 4:45 PM</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Final Leaderboard -->
    <div class="card mb-30" id="leaderboard">
        <div class="card-header">
            <div>
                <div class="card-title">🏆 Final Leaderboard</div>
                <div class="card-subtitle">Overall team standings</div>
            </div>
        </div>

        <!-- Podium Design -->
        <div class="podium-container">
            <!-- Silver (2nd) -->
            <div class="podium-item silver">
                <div class="podium-position silver">
                    <span class="podium-rank">2</span>
                </div>
                <div class="podium-medal">🥈</div>
                <div class="podium-team">Tech Titans</div>
                <div class="podium-score">850 pts</div>
            </div>

            <!-- Gold (1st) -->
            <div class="podium-item gold">
                <div class="podium-position gold">
                    <span class="podium-rank">1</span>
                </div>
                <div class="podium-medal">🥇</div>
                <div class="podium-team">Code Wizards</div>
                <div class="podium-score">920 pts</div>
            </div>

            <!-- Bronze (3rd) -->
            <div class="podium-item bronze">
                <div class="podium-position bronze">
                    <span class="podium-rank">3</span>
                </div>
                <div class="podium-medal">🥉</div>
                <div class="podium-team">Innovation Squad</div>
                <div class="podium-score">780 pts</div>
            </div>
        </div>

        <!-- Full Leaderboard Table -->
        <div style="margin-top: 40px;">
            <div class="table-container">
                <table class="luxury-table">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Team</th>
                            <th>Total Score</th>
                            <th>Events Participated</th>
                            <th>Average Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong style="color: var(--accent-gold); font-size: 18px;">🥇 1st</strong></td>
                            <td><strong>Code Wizards</strong></td>
                            <td><span style="color: var(--accent-gold); font-weight: 700;">920 pts</span></td>
                            <td>6/8</td>
                            <td>153.3</td>
                        </tr>
                        <tr>
                            <td><strong style="color: var(--accent-gold); font-size: 18px;">🥈 2nd</strong></td>
                            <td><strong>Tech Titans</strong></td>
                            <td><span style="color: var(--accent-gold); font-weight: 700;">850 pts</span></td>
                            <td>5/8</td>
                            <td>170.0</td>
                        </tr>
                        <tr>
                            <td><strong style="color: var(--accent-gold); font-size: 18px;">🥉 3rd</strong></td>
                            <td><strong>Innovation Squad</strong></td>
                            <td><span style="color: var(--accent-gold); font-weight: 700;">780 pts</span></td>
                            <td>4/8</td>
                            <td>195.0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- ===== MODALS ===== -->

<!-- Create Event Modal -->
<div id="createEventModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">➕ Create New Event</h2>
            <button class="modal-close">×</button>
        </div>
        <form onsubmit="handleCreateEvent(event)">
            <div class="form-group">
                <label class="form-label">Event Name *</label>
                <input type="text" class="form-control" name="event_name" placeholder="e.g., Web Development Challenge"
                    required>
            </div>
            <div class="form-group">
                <label class="form-label">Event Date *</label>
                <input type="date" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="form-label">Description</label>
                <textarea class="form-control" style="resize: vertical; min-height: 100px;"
                    placeholder="Event description..."></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Max Participants</label>
                <input type="number" class="form-control" placeholder="e.g., 100">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Create Event</button>
        </form>
    </div>
</div>

<!-- Add Result Modal -->
<div id="addResultModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">✅ Add Result</h2>
            <button class="modal-close">×</button>
        </div>
        <form onsubmit="handleAddResult(event)">
            <div class="form-group">
                <label class="form-label">Team *</label>
                <select class="form-select" name="team" required>
                    <option value="">Select a team...</option>
                    <?php foreach ($teams as $team): ?>
                        <option value="<?php echo $team['id']; ?>"><?php echo $team['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Event *</label>
                <select class="form-select" name="event" required>
                    <option value="">Select an event...</option>
                    <?php foreach ($events as $event): ?>
                        <option value="<?php echo $event['id']; ?>"><?php echo $event['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Score (0-100) *</label>
                <input type="number" class="form-control" name="score" min="0" max="100" placeholder="e.g., 95"
                    required>
            </div>
            <div class="form-group">
                <label class="form-label">Comments</label>
                <textarea class="form-control" style="resize: vertical; min-height: 80px;"
                    placeholder="Judge comments..."></textarea>
            </div>
            <button type="submit" class="btn btn-success btn-block">Submit Result</button>
        </form>
    </div>
</div>

<?php include '../partials/footer.php'; ?>