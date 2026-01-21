// ========================================
// LUXURY UI ANIMATIONS & INTERACTIONS
// ========================================

// DOM Elements
const sidebar = document.querySelector('.sidebar');
const menuToggle = document.querySelector('.menu-toggle');
const sidebarLinks = document.querySelectorAll('.sidebar-link');

// Initialize on page load
document.addEventListener('DOMContentLoaded', () => {
  initSidebar();
  initAnimations();
  initFormValidation();
  animateCounters();
});

// ========================================
// SIDEBAR FUNCTIONALITY
// ========================================

function initSidebar() {
  if (menuToggle) {
    menuToggle.addEventListener('click', toggleSidebar);
  }

  // Active link highlighting
  sidebarLinks.forEach(link => {
    link.addEventListener('click', () => {
      sidebarLinks.forEach(l => l.classList.remove('active'));
      link.classList.add('active');
    });
  });

  // Close sidebar on mobile when link clicked
  sidebarLinks.forEach(link => {
    link.addEventListener('click', () => {
      if (window.innerWidth < 768) {
        sidebar.classList.remove('active');
      }
    });
  });
}

function toggleSidebar() {
  if (sidebar) {
    sidebar.classList.toggle('active');
  }
}

// ========================================
// MODAL FUNCTIONALITY
// ========================================

function openModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) {
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
  }
}

function closeModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) {
    modal.classList.remove('active');
    document.body.style.overflow = 'auto';
  }
}

// Modal close buttons
document.querySelectorAll('.modal-close').forEach(btn => {
  btn.addEventListener('click', (e) => {
    const modal = e.target.closest('.modal');
    if (modal) {
      modal.classList.remove('active');
      document.body.style.overflow = 'auto';
    }
  });
});

// Close modal on background click
document.querySelectorAll('.modal').forEach(modal => {
  modal.addEventListener('click', (e) => {
    if (e.target === modal) {
      modal.classList.remove('active');
      document.body.style.overflow = 'auto';
    }
  });
});

// ========================================
// ANIMATIONS - COUNTER UP
// ========================================

function animateCounters() {
  const counters = document.querySelectorAll('.stat-value');
  
  counters.forEach(counter => {
    const target = parseInt(counter.innerText) || 0;
    let current = 0;
    const increment = Math.ceil(target / 50);
    
    const timer = setInterval(() => {
      current += increment;
      if (current >= target) {
        counter.innerText = target;
        clearInterval(timer);
      } else {
        counter.innerText = current;
      }
    }, 20);
  });
}

// ========================================
// FORM VALIDATION
// ========================================

function initFormValidation() {
  const forms = document.querySelectorAll('form');
  
  forms.forEach(form => {
    form.addEventListener('submit', (e) => {
      if (!validateForm(form)) {
        e.preventDefault();
        showAlert('Please fill in all required fields', 'error');
      }
    });
  });

  // Real-time validation
  const inputs = document.querySelectorAll('.form-control, .form-select');
  inputs.forEach(input => {
    input.addEventListener('blur', () => validateInput(input));
  });
}

function validateForm(form) {
  let isValid = true;
  const inputs = form.querySelectorAll('[required]');
  
  inputs.forEach(input => {
    if (!input.value.trim()) {
      isValid = false;
      highlightError(input);
    } else {
      clearError(input);
    }
  });
  
  return isValid;
}

function validateInput(input) {
  if (input.hasAttribute('required') && !input.value.trim()) {
    highlightError(input);
  } else {
    clearError(input);
  }
}

function highlightError(input) {
  input.style.borderColor = '#dc3545';
  input.style.boxShadow = '0 0 15px rgba(220, 53, 69, 0.2)';
}

function clearError(input) {
  input.style.borderColor = 'rgba(212, 175, 55, 0.1)';
  input.style.boxShadow = 'none';
}

// ========================================
// ALERTS & NOTIFICATIONS
// ========================================

function showAlert(message, type = 'info', duration = 5000) {
  const alertContainer = document.querySelector('.alert-container') || createAlertContainer();
  
  const alert = document.createElement('div');
  alert.className = `alert alert-${type}`;
  alert.innerHTML = `
    <span>${message}</span>
    <button class="alert-close">×</button>
  `;
  
  alertContainer.appendChild(alert);
  
  const closeBtn = alert.querySelector('.alert-close');
  closeBtn.addEventListener('click', () => alert.remove());
  
  if (duration > 0) {
    setTimeout(() => alert.remove(), duration);
  }
}

function createAlertContainer() {
  const container = document.createElement('div');
  container.className = 'alert-container';
  container.style.cssText = `
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 3000;
    max-width: 400px;
  `;
  document.body.appendChild(container);
  return container;
}

// ========================================
// FORM SUBMISSION HANDLERS
// ========================================

// Add Team Form
function handleAddTeam(e) {
  e.preventDefault();
  const form = e.target;
  const teamName = form.querySelector('input[name="team_name"]').value;
  const iconPlayer = form.querySelector('input[name="icon_player"]').value;
  
  if (teamName.trim() && iconPlayer.trim()) {
    showAlert(`Team "${teamName}" added successfully!`, 'success');
    form.reset();
  } else {
    showAlert('Please fill in all fields', 'error');
  }
}

// Add Technocrat Form
function handleAddTechnocrat(e) {
  e.preventDefault();
  const form = e.target;
  const name = form.querySelector('input[name="name"]').value;
  const email = form.querySelector('input[name="email"]').value;
  const team = form.querySelector('select[name="team"]').value;
  
  if (name.trim() && email.trim() && team) {
    showAlert(`Technocrat "${name}" assigned to team!`, 'success');
    form.reset();
  } else {
    showAlert('Please fill in all fields', 'error');
  }
}

// Create Event Form
function handleCreateEvent(e) {
  e.preventDefault();
  const form = e.target;
  const eventName = form.querySelector('input[name="event_name"]').value;
  
  if (eventName.trim()) {
    showAlert(`Event "${eventName}" created successfully!`, 'success');
    form.reset();
  } else {
    showAlert('Please enter event name', 'error');
  }
}

// Add Result Form
function handleAddResult(e) {
  e.preventDefault();
  const form = e.target;
  const team = form.querySelector('select[name="team"]').value;
  const event = form.querySelector('select[name="event"]').value;
  const score = form.querySelector('input[name="score"]').value;
  
  if (team && event && score) {
    showAlert(`Result added successfully!`, 'success');
    form.reset();
  } else {
    showAlert('Please fill in all fields', 'error');
  }
}

// ========================================
// DROPDOWN & ANIMATED SELECTS
// ========================================

function initAnimatedSelects() {
  const selects = document.querySelectorAll('.form-select');
  
  selects.forEach(select => {
    select.addEventListener('change', () => {
      select.style.borderColor = 'rgba(212, 175, 55, 0.3)';
      setTimeout(() => {
        select.style.borderColor = 'rgba(212, 175, 55, 0.1)';
      }, 300);
    });
  });
}

// ========================================
// LEADERBOARD ANIMATIONS
// ========================================

function initLeaderboardAnimations() {
  const podiumItems = document.querySelectorAll('.podium-item');
  
  podiumItems.forEach((item, index) => {
    setTimeout(() => {
      item.style.animation = `slideUp 0.6s ease forwards`;
    }, index * 150);
  });
}

// ========================================
// BUTTON RIPPLE EFFECT
// ========================================

document.querySelectorAll('.btn').forEach(btn => {
  btn.addEventListener('click', function(e) {
    const ripple = document.createElement('span');
    const rect = this.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = e.clientX - rect.left - size / 2;
    const y = e.clientY - rect.top - size / 2;
    
    ripple.style.cssText = `
      position: absolute;
      width: ${size}px;
      height: ${size}px;
      background: rgba(255, 255, 255, 0.5);
      border-radius: 50%;
      left: ${x}px;
      top: ${y}px;
      pointer-events: none;
      animation: ripple 0.6s ease-out;
    `;
    
    this.style.position = 'relative';
    this.style.overflow = 'hidden';
    this.appendChild(ripple);
    
    setTimeout(() => ripple.remove(), 600);
  });
});

// Add ripple animation to stylesheet
if (!document.querySelector('#ripple-animation')) {
  const style = document.createElement('style');
  style.id = 'ripple-animation';
  style.textContent = `
    @keyframes ripple {
      from {
        transform: scale(0);
        opacity: 1;
      }
      to {
        transform: scale(2);
        opacity: 0;
      }
    }
  `;
  document.head.appendChild(style);
}

// ========================================
// TABLE ROW HOVER & SORTING
// ========================================

function initTableInteractions() {
  const tables = document.querySelectorAll('.luxury-table');
  
  tables.forEach(table => {
    const headers = table.querySelectorAll('th');
    headers.forEach((header, index) => {
      header.style.cursor = 'pointer';
      header.addEventListener('click', () => sortTable(table, index));
    });
  });
}

function sortTable(table, columnIndex) {
  const rows = Array.from(table.querySelectorAll('tbody tr'));
  const isAsc = table.dataset.sortAsc !== 'true';
  
  rows.sort((a, b) => {
    const aValue = a.cells[columnIndex].textContent.trim();
    const bValue = b.cells[columnIndex].textContent.trim();
    
    const aNum = parseFloat(aValue);
    const bNum = parseFloat(bValue);
    
    if (!isNaN(aNum) && !isNaN(bNum)) {
      return isAsc ? aNum - bNum : bNum - aNum;
    }
    
    return isAsc 
      ? aValue.localeCompare(bValue)
      : bValue.localeCompare(aValue);
  });
  
  table.dataset.sortAsc = isAsc;
  rows.forEach(row => table.querySelector('tbody').appendChild(row));
}

// ========================================
// RESPONSIVE MENU TOGGLE
// ========================================

window.addEventListener('resize', () => {
  if (window.innerWidth > 768 && sidebar) {
    sidebar.classList.remove('active');
  }
});

// ========================================
// SMOOTH SCROLL
// ========================================

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function(e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      target.scrollIntoView({ behavior: 'smooth' });
    }
  });
});

// ========================================
// EXPORT FUNCTIONS
// ========================================

window.openModal = openModal;
window.closeModal = closeModal;
window.showAlert = showAlert;
window.handleAddTeam = handleAddTeam;
window.handleAddTechnocrat = handleAddTechnocrat;
window.handleCreateEvent = handleCreateEvent;
window.handleAddResult = handleAddResult;
