<?php
/**
 * Header Partial
 * Includes navbar and top-level navigation
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Tech Fest Management'; ?></title>

    <!-- Luxury CSS -->
    <link rel="stylesheet" href="../assets/css/luxury.css">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap 5 (for grid system) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="layout-wrapper">
        <!-- Include Sidebar -->
        <?php include 'sidebar.php'; ?>

        <div class="main-content">
            <!-- Navbar -->
            <nav class="navbar">
                <div class="navbar-brand">
                    <button class="menu-toggle"
                        style="background: none; border: none; color: var(--accent-gold); font-size: 24px; cursor: pointer; display: none; margin-right: 15px;">
                        <i class="fas fa-bars"></i>
                    </button>
                    <span><?php echo $pageTitle ?? 'Tech Fest Management'; ?></span>
                </div>

                <div class="navbar-user">
                    <span style="color: var(--text-secondary); font-size: 14px;">
                        Welcome, <strong><?php echo $_SESSION['user_name'] ?? 'User'; ?></strong>
                    </span>
                    <div class="user-avatar" title="<?php echo $_SESSION['user_role'] ?? 'User'; ?>">
                        <?php
                        $initials = strtoupper(substr($_SESSION['user_name'] ?? 'U', 0, 1));
                        echo $initials;
                        ?>
                    </div>
                </div>
            </nav>

            <!-- Alert Container -->
            <div class="alert-container"
                style="position: fixed; top: 80px; right: 20px; z-index: 2000; max-width: 400px;"></div>