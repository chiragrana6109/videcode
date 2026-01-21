<?php
/**
 * Login Page
 * Role-based authentication (demo)
 */

session_start();

// Demo login processing
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role = $_POST['role'] ?? '';
    if ($role === 'owner' || $role === 'coordinator') {
        $_SESSION['user_role'] = $role;
        $_SESSION['user_name'] = $role === 'owner' ? 'Admin Owner' : 'Tech Coordinator';
        header('Location: ' . ($role === 'owner' ? 'views/owner_dashboard.php' : 'views/coordinator_dashboard.php'));
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIDECODE - Tech Fest Login</title>
    <link rel="stylesheet" href="assets/css/luxury.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
        }

        .login-container {
            max-width: 500px;
            width: 90%;
            background: linear-gradient(135deg, var(--primary-light), #1f2a3a);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 50px;
            box-shadow: var(--shadow-lg);
            text-align: center;
        }

        .login-logo {
            font-size: 48px;
            font-weight: 900;
            background: linear-gradient(135deg, var(--accent-gold), var(--accent-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-family: 'Playfair Display', serif;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }

        .login-subtitle {
            color: var(--text-secondary);
            margin-bottom: 40px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 12px;
        }

        .role-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin: 30px 0;
        }

        .role-btn {
            padding: 20px;
            border: 2px solid var(--border-color);
            border-radius: 12px;
            background: rgba(30, 42, 58, 0.5);
            color: var(--text-secondary);
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .role-btn:hover {
            border-color: var(--accent-gold);
            background: rgba(212, 175, 55, 0.1);
            color: var(--accent-gold);
            transform: translateY(-3px);
        }

        .role-btn.active {
            border-color: var(--accent-gold);
            background: rgba(212, 175, 55, 0.15);
            color: var(--accent-gold);
            box-shadow: var(--glow-gold);
        }

        .role-icon {
            font-size: 24px;
            margin-bottom: 8px;
            display: block;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <div class="login-logo">VIDECODE</div>
        <div class="login-subtitle">Tech Fest Management System</div>

        <form method="POST">
            <p style="color: var(--text-secondary); margin-bottom: 20px;">Select your role to login:</p>

            <div class="role-buttons">
                <button type="button" class="role-btn" onclick="selectRole(this, 'owner')">
                    <span class="role-icon">👑</span>
                    Owner
                </button>
                <button type="button" class="role-btn" onclick="selectRole(this, 'coordinator')">
                    <span class="role-icon">🎯</span>
                    Coordinator
                </button>
            </div>

            <input type="hidden" name="role" id="roleInput" required>

            <button type="submit" class="btn btn-primary btn-block" style="margin-top: 20px;">
                <i class="fas fa-sign-in-alt"></i> Login
            </button>
        </form>

        <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid var(--border-color);">
            <p style="color: var(--text-secondary); font-size: 12px;">
                <strong>Demo Credentials:</strong><br>
                Owner: Any role selected above<br>
                Coordinator: Any role selected above
            </p>
        </div>
    </div>

    <script>
        function selectRole (btn, role)
        {
            document.querySelectorAll('.role-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            document.getElementById('roleInput').value = role;
        }
    </script>

</body>

</html>