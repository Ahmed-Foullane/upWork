<!DOCTYPE html>
<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@5.9.0/dist/css/coreui.min.css" rel="stylesheet">
  <script defer src="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@5.9.0/dist/js/coreui.bundle.min.js"></script>
  <style>
    .client-info {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
      padding: 10px;
      background: #f8f9fa;
      border-radius: 5px;
    }

    .client-image {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      margin-right: 15px;
      object-fit: cover;
    }

    .client-details {
      display: flex;
      flex-direction: column;
    }

    .client-name {
      font-weight: bold;
      font-size: 16px;
    }

    .client-title {
      color: #666;
      font-size: 14px;
    }

    .proposal-btn {
      background: #6c5ce7;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 10px;
      width: auto;
      font-size: 14px;
    }

    .proposal-btn:hover {
      background: #5b4bc4;
    }

    .update-btn {
      background: #007bff;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 10px;
      width: auto;
      font-size: 14px;
    }

    .update-btn:hover {
      background: #0056b3;
    }

    .project-card {
      position: relative;
      display: flex;
      flex-direction: column;
    }

    .project-card .update-btn {
      align-self: flex-end;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background: #f0f2f5;
      padding: 20px;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
    }

    .add-btn {
      background: #4CAF50;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }

    .add-btn:hover {
      background: #45a049;
    }

    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      z-index: 1000;
    }

    .modal.active {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding-top: 50px;
    }

    .form-container {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      width: 90%;
      max-width: 600px;
      max-height: 90vh;
      overflow-y: auto;
      position: relative;
    }

    .close-btn {
      position: absolute;
      right: 20px;
      top: 20px;
      background: none;
      border: none;
      font-size: 24px;
      cursor: pointer;
      color: #666;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
      width: 100%;
      padding: 8px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 14px;
    }

    .tags-input {
      display: flex;
      flex-wrap: wrap;
      gap: 5px;
      padding: 5px;
      border: 1px solid #ddd;
      border-radius: 4px;
    }

    .tag {
      background: #e9ecef;
      padding: 5px 10px;
      border-radius: 15px;
      font-size: 12px;
    }

    .submit-btn {
      background: #4CAF50;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      width: 100%;
      font-size: 16px;
    }

    .submit-btn:hover {
      background: #45a049;
    }

    .projects-list {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .project-card {
      background: white;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      width: 100%;
    }

    .project-header {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      margin-bottom: 15px;
    }

    .project-title {
      font-size: 20px;
      font-weight: bold;
    }

    .project-budget {
      font-size: 18px;
      color: #4CAF50;
      font-weight: bold;
    }

    .project-description {
      color: #666;
      margin-bottom: 15px;
      line-height: 1.6;
    }

    .project-meta {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 15px;
      margin-bottom: 15px;
      padding: 10px;
      background: #f8f9fa;
      border-radius: 5px;
    }

    .meta-item {
      font-size: 14px;
      color: #555;
    }

    .project-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
    }

    .project-tag {
      background: #e9ecef;
      padding: 6px 12px;
      border-radius: 15px;
      font-size: 13px;
      color: #555;
    }

    .dates {
      display: flex;
      gap: 20px;
      margin-bottom: 15px;
    }

    .dates>div {
      flex: 1;
    }

    .search-bar {
      margin-bottom: 20px;
      display: flex;
      justify-content: flex-end;
    }

    .search-input {
      padding: 10px;
      width: 300px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 16px;
    }
  </style>
    <style>
    :root {
      --sidebar-width: 250px;
      --header-height: 60px;
      --primary-color: #2ecc71;
      --primary-dark: #27ae60;
      --secondary-color: #f8f9fa;
      --text-color: #2c3e50;
      --hover-color: #e8f5e9;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background: #f0f2f5;
    }

    .dashboard {
      display: flex;
      min-height: 100vh;
    }

    /* Enhanced Sidebar Styles */
    .sidebar {
      width: var(--sidebar-width);
      background: white;
      padding: 20px;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
      position: fixed;
      height: 100vh;
      overflow-y: auto;
      border-right: 1px solid #e0e0e0;
    }

    .logo {
      font-size: 24px;
      font-weight: bold;
      color: var(--primary-color);
      margin-bottom: 30px;
      padding: 10px;
    }

    .nav-item {
      margin-bottom: 10px;
    }

    .nav-link {
      display: flex;
      align-items: center;
      padding: 12px;
      color: var(--text-color);
      text-decoration: none;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .nav-link:hover {
      background-color: var(--hover-color);
      color: var(--primary-color);
      transform: translateX(5px);
    }

    .nav-link i {
      margin-right: 10px;
      font-size: 18px;
    }

    .nav-link.active {
      background-color: var(--primary-color);
      color: white;
    }

    /* Enhanced Search Input */
    .search-container {
      position: relative;
      width: 300px;
    }

    .search-input {
      width: 100%;
      padding: 12px 20px 12px 45px;
      border: 2px solid #e0e0e0;
      border-radius: 25px;
      font-size: 14px;
      transition: all 0.3s ease;
      color: var(--text-color);
      background-color: white;
    }

    .search-input:focus {
      outline: none;
      border-color: var(--primary-color);
      box-shadow: 0 0 0 3px rgba(46, 204, 113, 0.2);
    }

    .search-icon {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #999;
      font-size: 18px;
    }

    /* Main Content Styles */
    .main-content {
      flex: 1;
      margin-left: var(--sidebar-width);
      padding: 20px;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
      background: white;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    /* Enhanced Dashboard Cards */
    .dashboard-cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
    }

    .card {
      background: white;
      padding: 25px;
      border-radius: 15px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      border-left: 4px solid var(--primary-color);
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card-title {
      font-size: 16px;
      color: var(--text-color);
      margin-bottom: 10px;
    }

    .card-value {
      font-size: 28px;
      font-weight: bold;
      color: var(--primary-color);
    }

    /* Enhanced Notification Badge */
    .notification-badge {
      background: #e74c3c;
      color: white;
      padding: 2px 8px;
      border-radius: 12px;
      font-size: 12px;
      margin-left: 8px;
    }

    /* Projects List */
    .projects-list {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .project-card {
      background: white;
      border-radius: 15px;
      padding: 25px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      transition: transform 0.3s ease;
    }

    .project-card:hover {
      transform: translateY(-3px);
    }

    .project-header {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      margin-bottom: 15px;
    }

    .project-title {
      font-size: 20px;
      font-weight: bold;
      color: var(--text-color);
    }

    .project-budget {
      font-size: 18px;
      color: var(--primary-color);
      font-weight: bold;
    }

    /* Action Buttons */
    .btn {
      padding: 10px 20px;
      border-radius: 8px;
      border: none;
      cursor: pointer;
      transition: all 0.3s ease;
      font-weight: 500;
    }

    .btn-primary {
      background-color: var(--primary-color);
      color: white;
    }

    .btn-primary:hover {
      background-color: var(--primary-dark);
      transform: translateY(-2px);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .sidebar {
        width: 70px;
        padding: 10px;
      }

      .logo {
        font-size: 20px;
        text-align: center;
      }

      .nav-link span {
        display: none;
      }

      .main-content {
        margin-left: 70px;
      }

      .search-container {
        width: 200px;
      }

      .dashboard-cards {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>

<body>
<div class="dashboard">
    <!-- Sidebar Navigation -->
    <div class="sidebar">
      <div class="logo">Dashboard</div>
      <nav>
        <div class="nav-item">
          <a href="#" class="nav-link active">
            <i class="bi bi-house-door"></i>
            <span>Tableau de bord</span>
          </a>
        </div>
        <div class="nav-item">
          <a href="#" class="nav-link">
            <i class="bi bi-briefcase"></i>
            <span>Projets</span>
          </a>
        </div>
        <div class="nav-item">
          <a href="/Tag" class="nav-link">
            <i class="bi bi-tags"></i>
            <span>Tags</span>
          </a>
        </div>
        <div class="nav-item">
          <a href="/category" class="nav-link">
            <i class="bi bi-folder"></i>
            <span>Catégories</span>
          </a>
        </div>
        <div class="nav-item">
          <a href="#" class="nav-link">
            <i class="bi bi-star"></i>
            <span>Avis</span>
            <span class="notification-badge">3</span>
          </a>
        </div>
        <div class="nav-item">
          <a href="#" class="nav-link">
            <i class="bi bi-bell"></i>
            <span>Notifications</span>
            <span class="notification-badge">5</span>
          </a>
        </div>
        <div class="nav-item">
          <a href="#" class="nav-link">
            <i class="bi bi-bell"></i>
            <span>chat</span>
            <span class="notification-badge">5</span>
          </a>
        </div>
      </nav>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
      <div class="header">
        <h1>Tableau de bord</h1>
        <div class="search-container">
          <i class="bi bi-search search-icon"></i>
          <input type="text" class="search-input" placeholder="Rechercher...">
        </div>
      </div>

      <!-- Dashboard Summary Cards -->
      <div class="dashboard-cards">
        <div class="card">
          <div class="card-title">Projets Totaux</div>
          <div class="card-value">24</div>
        </div>
        <div class="card">
          <div class="card-title">Projets Actifs</div>
          <div class="card-value">12</div>
        </div>
        <div class="card">
          <div class="card-title">Nouveaux Avis</div>
          <div class="card-value">3</div>
        </div>
        <div class="card">
          <div class="card-title">Notifications</div>
          <div class="card-value">5</div>
        </div>
      </div>
      
   
</body>
</html>