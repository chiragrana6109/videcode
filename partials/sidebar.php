<?php
/**
 * Sidebar Partial
 * Navigation sidebar with role-based menu items
 */

$userRole = $_SESSION['user_role'] ?? 'owner';
?>

<!-- Sidebar Navigation -->
<aside class="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-logo">VIDECODE</div>
        <div class="sidebar-subtitle">Tech Fest Manager</div>
    </div>

    <ul class="sidebar-menu">
        <!-- Common Navigation -->
        <li class="sidebar-item">
            <a href="<?php echo $userRole === 'owner' ? '../views/owner_dashboard.php' : '../views/coordinator_dashboard.php'; ?>"
                class="sidebar-link active">
                <span class="sidebar-icon">
                    <i class="fas fa-home"></i>
                </span>
                Dashboard
            </a>
        </li>

        <li class="sidebar-item">
            <a href="#leaderboard" class="sidebar-link">
                <span class="sidebar-icon">
                    <i class="fas fa-trophy"></i>
                </span>
                Leaderboard
            </a>
        </li>

        <!-- Owner-Only Navigation -->
        <?php if ($userRole === 'owner'): ?>
            <li class="sidebar-item">
                <a href="javascript:void(0);" onclick="openModal('addTeamModal')" class="sidebar-link">
                    <span class="sidebar-icon">
                        <i class="fas fa-users"></i>
                    </span>
                    Teams
                </a>
            </li>

            <li class="sidebar-item">
                <a href="javascript:void(0);" onclick="openModal('addTechnocratModal')" class="sidebar-link">
                    <span class="sidebar-icon">
                        <i class="fas fa-user-tie"></i>
                    </span>
                    Technocrats
                </a>
            </li>

            <li class="sidebar-item">
                <a href="javascript:void(0);" onclick="openModal('assignEventModal')" class="sidebar-link">
                    <span class="sidebar-icon">
                        <i class="fas fa-calendar-check"></i>
                    </span>
                    Assign Events
                </a>
            </li>
        <?php endif; ?>

        <!-- Coordinator-Only Navigation -->
        <?php if ($userRole === 'coordinator'): ?>
            <li class="sidebar-item">
                <a href="javascript:void(0);" onclick="openModal('createEventModal')" class="sidebar-link">
                    <span class="sidebar-icon">
                        <i class="fas fa-plus-circle"></i>
                    </span>
                    Create Event
                </a>
            </li>

            <li class="sidebar-item">
                <a href="javascript:void(0);" onclick="openModal('addResultModal')" class="sidebar-link">
                    <span class="sidebar-icon">
                        <i class="fas fa-check-circle"></i>
                    </span>
                    Add Results
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#finalLeaderboard" class="sidebar-link">
                    <span class="sidebar-icon">
                        <i class="fas fa-chart-line"></i>
                    </span>
                    Final Results
                </a>
            </li>
        <?php endif; ?>

        <!-- Divider -->
        <li style="border-bottom: 1px solid rgba(212, 175, 55, 0.1); margin: 20px 0;"></li>

        <!-- Settings & Help -->
        <li class="sidebar-item">
            <a href="#settings" class="sidebar-link">
                <span class="sidebar-icon">
                    <i class="fas fa-cog"></i>
                </span>
                Settings
            </a>
        </li>

        <li class="sidebar-item">
            <a href="#help" class="sidebar-link">
                <span class="sidebar-icon">
                    <i class="fas fa-question-circle"></i>
                </span>
                Help
            </a>
        </li>

        <li class="sidebar-item">
            <a href="logout.php" class="sidebar-link">
                <span class="sidebar-icon">
                    <i class="fas fa-sign-out-alt"></i>
                </span>
                Logout
            </a>
        </li>
    </ul>
</aside>