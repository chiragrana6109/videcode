<?php
/**
 * Owner Dashboard
 * Team management, technocrat management, and event assignment
 */

$_SESSION['user_name'] = 'Admin Owner';
$_SESSION['user_role'] = 'owner';
$pageTitle = 'Owner Dashboard';

// Dummy data for teams
$teams = [
    ['id' => 1, 'name' => 'Tech Titans', 'icon_player' => 'John Doe', 'score' => 850, 'members' => 5],
    ['id' => 2, 'name' => 'Code Wizards', 'icon_player' => 'Jane Smith', 'score' => 920, 'members' => 6],
    ['id' => 3, 'name' => 'Innovation Squad', 'icon_player' => 'Mike Johnson', 'score' => 780, 'members' => 4],
];

// Dummy technocrats
$technocrats = [
    ['id' => 1, 'name' => 'Dr. Rajesh Kumar', 'email' => 'rajesh@tech.com', 'team' => 'Tech Titans'],
    ['id' => 2, 'name' => 'Prof. Sarah Lee', 'email' => 'sarah@tech.com', 'team' => 'Code Wizards'],
    ['id' => 3, 'name' => 'Dr. Amar Patel', 'email' => 'amar@tech.com', 'team' => 'Innovation Squad'],
];

include '../partials/header.php';
?>

<!-- Main Content -->
<div class="content">

    <!-- Dashboard Header -->
    <div style="margin-bottom: 40px;">
        <h1
            style="font-size: 32px; font-weight: 900; color: var(--accent-gold); font-family: 'Playfair Display', serif; margin-bottom: 10px;">
            👋 Welcome Back, Admin
        </h1>
        <p style="color: var(--text-secondary);">Manage teams, technocrats, and assign events</p>
    </div>

    <!-- Statistics Cards -->
    <div class="dashboard-grid">
        <div class="stat-card">
            <div class="stat-icon">👥</div>
            <div class="stat-label">Total Teams</div>
            <div class="stat-value">3</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">👔</div>
            <div class="stat-label">Technocrats</div>
            <div class="stat-value">12</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">🎯</div>
            <div class="stat-label">Events</div>
            <div class="stat-value">8</div>
        </div>
    </div>

    <!-- Actions Row -->
    <div
        style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 40px;">
        <button class="btn btn-primary" onclick="openModal('addTeamModal')"
            style="width: 100%; justify-content: center;">
            <i class="fas fa-plus"></i> Add Team
        </button>
        <button class="btn btn-secondary" onclick="openModal('addTechnocratModal')"
            style="width: 100%; justify-content: center;">
            <i class="fas fa-plus"></i> Add Technocrat
        </button>
        <button class="btn btn-success" onclick="openModal('assignEventModal')"
            style="width: 100%; justify-content: center;">
            <i class="fas fa-link"></i> Assign Event
        </button>
    </div>

    <!-- Teams Table -->
    <div class="card mb-30">
        <div class="card-header">
            <div>
                <div class="card-title">📋 Teams Overview</div>
                <div class="card-subtitle">All registered teams</div>
            </div>
        </div>
        <div class="table-container">
            <table class="luxury-table">
                <thead>
                    <tr>
                        <th>Team Name</th>
                        <th>Icon Player</th>
                        <th>Members</th>
                        <th>Score (Read-Only)</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($teams as $team): ?>
                        <tr>
                            <td><strong><?php echo $team['name']; ?></strong></td>
                            <td><?php echo $team['icon_player']; ?></td>
                            <td><span
                                    style="background: rgba(212, 175, 55, 0.1); padding: 4px 10px; border-radius: 6px;"><?php echo $team['members']; ?></span>
                            </td>
                            <td><span style="color: var(--accent-gold); font-weight: 700;"><?php echo $team['score']; ?>
                                    pts</span></td>
                            <td><span style="color: var(--accent-emerald);">✓ Active</span></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Technocrats Table -->
    <div class="card mb-30">
        <div class="card-header">
            <div>
                <div class="card-title">👔 Technocrats</div>
                <div class="card-subtitle">Assigned coordinators and judges</div>
            </div>
        </div>
        <div class="table-container">
            <table class="luxury-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Assigned Team</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($technocrats as $tech): ?>
                        <tr>
                            <td><strong><?php echo $tech['name']; ?></strong></td>
                            <td><?php echo $tech['email']; ?></td>
                            <td><?php echo $tech['team']; ?></td>
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

    <!-- Leaderboard Preview -->
    <div class="card mb-30">
        <div class="card-header">
            <div>
                <div class="card-title">🏆 Current Leaderboard (Read-Only)</div>
                <div class="card-subtitle">Live team standings</div>
            </div>
        </div>
        <div class="table-container">
            <table class="luxury-table">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Team</th>
                        <th>Score</th>
                        <th>Events</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span style="color: var(--accent-gold); font-weight: 900; font-size: 18px;">🥇</span></td>
                        <td><strong>Code Wizards</strong></td>
                        <td><span style="color: var(--accent-gold); font-weight: 700;">920 pts</span></td>
                        <td>6/8</td>
                    </tr>
                    <tr>
                        <td><span style="color: var(--accent-gold); font-weight: 900; font-size: 18px;">🥈</span></td>
                        <td><strong>Tech Titans</strong></td>
                        <td><span style="color: var(--accent-gold); font-weight: 700;">850 pts</span></td>
                        <td>5/8</td>
                    </tr>
                    <tr>
                        <td><span style="color: var(--accent-gold); font-weight: 900; font-size: 18px;">🥉</span></td>
                        <td><strong>Innovation Squad</strong></td>
                        <td><span style="color: var(--accent-gold); font-weight: 700;">780 pts</span></td>
                        <td>4/8</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ===== MODALS ===== -->

<!-- Add Team Modal -->
<div id="addTeamModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">➕ Add New Team</h2>
            <button class="modal-close">×</button>
        </div>
        <form onsubmit="handleAddTeam(event)">
            <div class="form-group">
                <label class="form-label">Team Name *</label>
                <input type="text" class="form-control" name="team_name" placeholder="e.g., Tech Titans" required>
            </div>
            <div class="form-group">
                <label class="form-label">Icon Player Name *</label>
                <input type="text" class="form-control" name="icon_player" placeholder="e.g., John Doe" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Add Team</button>
        </form>
    </div>
</div>

<!-- Add Technocrat Modal -->
<div id="addTechnocratModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">👔 Add Technocrat</h2>
            <button class="modal-close">×</button>
        </div>
        <form onsubmit="handleAddTechnocrat(event)">
            <div class="form-group">
                <label class="form-label">Name *</label>
                <input type="text" class="form-control" name="name" placeholder="Full name" required>
            </div>
            <div class="form-group">
                <label class="form-label">Email *</label>
                <input type="email" class="form-control" name="email" placeholder="Email address" required>
            </div>
            <div class="form-group">
                <label class="form-label">Assign to Team *</label>
                <select class="form-select" name="team" required>
                    <option value="">Select a team...</option>
                    <?php foreach ($teams as $team): ?>
                        <option value="<?php echo $team['id']; ?>"><?php echo $team['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Add Technocrat</button>
        </form>
    </div>
</div>

<!-- Assign Event Modal -->
<div id="assignEventModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">📅 Assign Event to Team</h2>
            <button class="modal-close">×</button>
        </div>
        <form>
            <div class="form-group">
                <label class="form-label">Team *</label>
                <select class="form-select" required>
                    <option value="">Select a team...</option>
                    <?php foreach ($teams as $team): ?>
                        <option value="<?php echo $team['id']; ?>"><?php echo $team['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Event *</label>
                <select class="form-select" required>
                    <option value="">Select an event...</option>
                    <option value="1">Web Development Challenge</option>
                    <option value="2">AI/ML Hackathon</option>
                    <option value="3">Mobile App Showcase</option>
                    <option value="4">Cybersecurity CTF</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-block">Assign Event</button>
        </form>
    </div>
</div>

<?php include '../partials/footer.php'; ?>