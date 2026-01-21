# 🏆 VIDECODE - Tech Fest Management System

## Luxury Premium Frontend UI

A sophisticated, modern, and elegant **Tech Fest Management System** built with PHP, HTML5, CSS3, and vanilla JavaScript. Featuring a luxurious dark theme with gold & royal blue accents, glassmorphism effects, and smooth animations.

---

## ✨ Features

### 🎨 **Premium UI Design**

- **Luxury Dark Theme** with gold, blue, and emerald accents
- **Glassmorphism Effects** with backdrop blur and layered shadows
- **Smooth Animations** and micro-interactions
- **Responsive Design** for all screen sizes
- **Premium Typography** using Playfair Display & Poppins fonts

### 👥 **Role-Based Dashboards**

#### Owner Dashboard

- Team Management (Add/View teams)
- Technocrat Management (Assign coordinators)
- Event Assignment (Link events to teams)
- View-only leaderboard
- Team overview with scores

#### Tech Coordinator Dashboard

- Create & Manage Events
- Record Results and Scores
- Elegant leaderboard with podium design
- Event schedule and status tracking
- Result submission forms

### 🏆 **Premium Leaderboard**

- 3D Podium design for top 3 teams
- Gold 🥇, Silver 🥈, Bronze 🥉 styling
- Glow animations for rankings
- Full ranking table with statistics
- Smooth counter animations

### 📊 **Data Tables**

- Luxury table design with hover effects
- Sortable columns
- Striped rows with glass effect
- Premium status indicators

---

## 📁 Project Structure

```
VideCode/
├── index.php                 # Entry point
├── assets/
│   ├── css/
│   │   └── luxury.css       # Complete luxury theme & styles
│   └── js/
│       └── animations.js    # All interactions & animations
├── views/
│   ├── login.php            # Role-based login page
│   ├── owner_dashboard.php  # Owner control panel
│   └── coordinator_dashboard.php  # Coordinator control panel
├── partials/
│   ├── header.php           # Navigation & top navbar
│   ├── sidebar.php          # Role-based sidebar menu
│   └── footer.php           # Scripts & closing tags
├── html/
│   ├── index.html           # (Legacy)
│   └── hbd.js              # (Legacy)
└── README.md               # This file
```

---

## 🚀 Getting Started

### Requirements

- PHP 7.4+ (can run locally with PHP built-in server)
- Modern web browser (Chrome, Firefox, Safari, Edge)
- No database required for demo

### Installation

1. **Clone or download the project**

   ```bash
   cd VideCode
   ```

2. **Run with PHP Built-in Server**

   ```bash
   php -S localhost:8000
   ```

3. **Open in Browser**
   ```
   http://localhost:8000/views/login.php
   ```

### Login Credentials (Demo)

- **Owner Role**: Select "Owner" and login
- **Coordinator Role**: Select "Coordinator" and login

---

## 🎨 Design System

### Color Palette

```css
Primary Dark:    #0f1419
Primary Light:   #1a2332
Accent Gold:     #d4af37
Accent Blue:     #2e5c8a
Accent Emerald:  #2d9a6a
```

### Typography

- **Display**: Playfair Display (serif) - Headlines
- **Body**: Poppins (sans-serif) - Content
- **Mono**: Inter (sans-serif) - UI elements

### Effects

- **Glassmorphism**: backdrop-filter blur effect
- **Glow**: Box shadows with accent colors
- **Hover**: Smooth transforms and color transitions
- **Animations**: Fade in, slide up, counter up, pulse glow

---

## 📝 Features Breakdown

### 🔐 Authentication

- Role-based login system
- Owner & Coordinator roles
- Session management
- Auto-redirect based on role

### 👑 Owner Features

- **Teams**: Create & view all teams
- **Technocrats**: Assign coordinators to teams
- **Events**: Assign events to specific teams
- **Leaderboard**: View-only access to live scores

### 🎯 Coordinator Features

- **Events**: Create and manage events
- **Results**: Enter team scores for events
- **Leaderboard**: Full leaderboard with podium
- **Statistics**: Event participation tracking

### 🏆 Leaderboard UI

- Podium with top 3 teams
- Medal emojis 🥇🥈🥉
- Animated rankings
- Full standings table
- Average score calculations

---

## 💻 Code Highlights

### Modal System

```javascript
// Open modal
openModal("addTeamModal");

// Close modal
closeModal("addTeamModal");
```

### Form Validation

```javascript
// Real-time validation with visual feedback
validateForm(form);
```

### Alerts & Notifications

```javascript
// Show alert message
showAlert("Team added successfully!", "success", 5000);
```

### Animations

- Counter animations for statistics
- Smooth modal transitions
- Button ripple effects
- Table row hover animations
- Sidebar smooth transitions

---

## 📱 Responsive Breakpoints

- **Desktop**: Full layout (> 1024px)
- **Tablet**: Adjusted grid (768px - 1024px)
- **Mobile**: Single column, hamburger menu (< 768px)

---

## 🎭 UI Components

### Buttons

- `.btn-primary` - Gold gradient (primary action)
- `.btn-secondary` - Blue gradient (secondary action)
- `.btn-success` - Emerald gradient (success action)
- `.btn-sm` - Small button variant

### Cards

- Luxury card styling with borders and shadows
- Hover lift effect
- Glassmorphism effect

### Tables

- Sortable columns
- Hover row highlighting
- Premium styling

### Forms

- Luxury input styling
- Focus glow effect
- Validation states
- Select dropdowns with animations

---

## 🛠 Customization

### Change Color Scheme

Edit [assets/css/luxury.css](assets/css/luxury.css) and modify CSS variables:

```css
:root {
  --accent-gold: #your-color;
  --accent-blue: #your-color;
  /* ... etc */
}
```

### Add New Routes

1. Create new PHP file in `views/`
2. Include header and footer partials
3. Use the sidebar for navigation

### Extend Animations

Edit [assets/js/animations.js](assets/js/animations.js) to add custom interactions

---

## 🚀 Production Ready

✅ **Mobile Responsive**
✅ **Accessibility Friendly**
✅ **Performance Optimized**
✅ **Security Best Practices**
✅ **Well-Commented Code**
✅ **Modular Structure**

---

## 📄 License

This project is provided as-is for educational and commercial use.

---

## 🤝 Support

For questions or improvements, refer to the inline code comments or the project documentation.

---

## 📸 Screenshots Preview

### 🔒 Login Page

- Role selection interface
- Premium gradient background
- Smooth button animations

### 👑 Owner Dashboard

- Team statistics cards
- Team management table
- Technocrat assignments
- Event assignment modal
- Read-only leaderboard

### 🎯 Coordinator Dashboard

- Event creation interface
- Results entry form
- 3D Podium leaderboard
- Full rankings table
- Live event status

---

**Built with ❤️ for Premium Tech Fest Experiences**

_VIDECODE - Vibe Coding Tech Fest Management System_
