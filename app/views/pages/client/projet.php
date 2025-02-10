<!DOCTYPE html>
<html>
<head>
  <style>
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
      transition: transform 0.2s;
    }

    .add-btn:hover {
      transform: scale(1.05);
    }

    /* Modal styles */
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
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      width: 90%;
      max-width: 600px;
      max-height: 90vh;
      overflow-y: auto;
      animation: slideDown 0.5s ease-out;
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

    @keyframes slideDown {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
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
      transition: background 0.3s;
    }

    .submit-btn:hover {
      background: #45a049;
    }

    /* Full width project cards */
    .projects-list {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .project-card {
      background: white;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      transition: transform 0.3s;
      animation: fadeIn 0.5s ease-out;
      width: 100%;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .project-card:hover {
      transform: translateY(-5px);
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

    .dates > div {
      flex: 1;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>Projets</h1>
      <button class="add-btn" onclick="document.getElementById('formModal').classList.add('active')">+ Nouveau Projet</button>
    </div>

    <!-- Modal Form -->
    <div id="formModal" class="modal">
      <div class="form-container">
        <button class="close-btn" onclick="document.getElementById('formModal').classList.remove('active')">&times;</button>
        <h2>Ajouter un nouveau projet</h2>
        <form>
          <div class="form-group">
            <label>Titre</label>
            <input type="text" name="title" placeholder="Entrez le titre du projet">
          </div>

          <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="4" placeholder="Décrivez votre projet"></textarea>
          </div>

          <div class="form-group">
            <label>Budget</label>
            <input name="budget" type="number" placeholder="Entrez le budget">
          </div>

          <div class="dates">
            <div class="form-group">
              <label>Date de début</label>
              <input name="date_debut" type="date">
            </div>

            <div class="form-group">
              <label>Date de fin</label>
              <input  name="date_fin" type="date">
            </div>
          </div>

          <div class="form-group">
            <label>Catégorie</label>
            <select>
              <option>Développement Web</option>
              <option>Design</option>
              <option>Marketing</option>
              <option>Rédaction</option>
            </select>
          </div>

          <div class="form-group">
            <label>Tags</label>
            <div class="tags-input">
              <span class="tag">React</span>
              <span class="tag">Design</span>
              <span class="tag">UI/UX</span>
            </div>
          </div>

          <button type="submit" class="submit-btn">Publier le projet</button>
        </form>
      </div>
    </div>

    <div class="projects-list">
      <!-- Exemple de projets -->
      <div class="project-card">
        <div class="project-header">
          <div class="project-title">Site E-commerce Premium</div>
          <div class="project-budget">3000 €</div>
        </div>
        <div class="project-description">
          Création d'un site e-commerce moderne avec panier d'achat et paiement en ligne. Interface utilisateur premium avec animations et expérience utilisateur optimisée.
        </div>
        <div class="project-meta">
          <span class="meta-item">Catégorie: Développement Web</span>
          <span class="meta-item">Début: 10/02/2024</span>
          <span class="meta-item">Fin: 10/03/2024</span>
        </div>
        <div class="project-tags">
          <span class="project-tag">React</span>
          <span class="project-tag">Node.js</span>
          <span class="project-tag">E-commerce</span>
        </div>
      </div>

      <div class="project-card">
        <div class="project-header">
          <div class="project-title">Application Mobile de Livraison</div>
          <div class="project-budget">5000 €</div>
        </div>
        <div class="project-description">
          Développement d'une application mobile de livraison de repas avec géolocalisation en temps réel et système de paiement intégré.
        </div>
        <div class="project-meta">
          <span class="meta-item">Catégorie: Développement Mobile</span>
          <span class="meta-item">Début: 15/02/2024</span>
          <span class="meta-item">Fin: 15/04/2024</span>
        </div>
        <div class="project-tags">
          <span class="project-tag">React Native</span>
          <span class="project-tag">iOS</span>
          <span class="project-tag">Android</span>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Fermer le modal en cliquant en dehors
    document.querySelector('.modal').addEventListener('click', function(e) {
      if (e.target === this) {
        this.classList.remove('active');
      }
    });
  </script>
</body>
</html>