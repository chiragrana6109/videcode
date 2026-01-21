<?php
/**
 * Footer Partial
 * Closing tags and scripts
 */
?>

<!-- Main Content Area Closes in header.php, now closed in views -->
</div>
</div>

<!-- JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

<!-- Luxury Animations & Interactions -->
<script src="../assets/js/animations.js"></script>

<!-- Initialize on Page Load -->
<script>
    // Responsive menu toggle for small screens
    const menuToggle = document.querySelector('.menu-toggle');
    if (menuToggle && window.innerWidth < 768)
    {
        menuToggle.style.display = 'block';
    }

    // Initialize table interactions
    setTimeout(() =>
    {
        if (window.initTableInteractions)
        {
            initTableInteractions();
        }
        if (window.initLeaderboardAnimations)
        {
            initLeaderboardAnimations();
        }
        if (window.initAnimatedSelects)
        {
            initAnimatedSelects();
        }
    }, 500);
</script>

</body>

</html>