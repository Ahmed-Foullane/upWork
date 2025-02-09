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
      max-width: 500px;
      animation: slideDown 0.5s ease-out;
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
    .form-group textarea {
      width: 100%;
      padding: 8px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 14px;
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

    /* Table styles */
    .table-container {
      background: white;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      overflow: hidden;
      animation: fadeIn 0.5s ease-out;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background: #f8f9fa;
      font-weight: bold;
      color: #333;
    }

    tr:hover {
      background: #f5f5f5;
    }

    .tag-name {
      display: inline-block;
      background: #e9ecef;
      padding: 5px 10px;
      border-radius: 15px;
      font-size: 14px;
    }

    .actions {
      display: flex;
      gap: 10px;
    }

    .edit-btn, .delete-btn {
      padding: 5px 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 12px;
      transition: background 0.3s;
    }

    .edit-btn {
      background: #ffd700;
      color: #333;
    }

    .delete-btn {
      background: #ff4444;
      color: white;
    }

    .edit-btn:hover {
      background: #ffc700;
    }

    .delete-btn:hover {
      background: #ff3333;
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
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>Gestion des Tags</h1>
      <button class="add-btn" onclick="document.getElementById('formModal').classList.add('active')">+ Nouveau Tag</button>
    </div>

    <!-- Modal Form -->
    <div id="formModal" class="modal">
      <div class="form-container">
        <button class="close-btn" onclick="document.getElementById('formModal').classList.remove('active')">&times;</button>
        <h2>Ajouter un nouveau tag</h2>
        <form method='POST' action="/Tag/addTag">
          <div class="form-group">
            <label>Nom du tag</label>
            <input type="text" name ="name" placeholder="Entrez le nom du tag">
          </div>

          <div class="form-group">
            <label>Description</label>
            <textarea name ="description" rows="4" placeholder="Décrivez le tag"></textarea>
          </div>

          <button type="submit" class="submit-btn">Ajouter le tag</button>
        </form>
      </div>
    </div>

    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>Tag</th>
            <th>Description</th>
            <th>Date de création</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><span class="tag-name">React</span></td>
            <td>Bibliothèque JavaScript pour créer des interfaces utilisateur</td>
            <td>09/02/2024</td>
            <td class="actions">
              <button class="edit-btn">Modifier</button>
              <button class="delete-btn">Supprimer</button>
            </td>
          </tr>
          <tr>
            <td><span class="tag-name">Design</span></td>
            <td>Conception d'interfaces et d'expériences utilisateur</td>
            <td>09/02/2024</td>
            <td class="actions">
              <button class="edit-btn">Modifier</button>
              <button class="delete-btn">Supprimer</button>
            </td>
          </tr>
          <tr>
            <td><span class="tag-name">Node.js</span></td>
            <td>Environnement d'exécution JavaScript côté serveur</td>
            <td>09/02/2024</td>
            <td class="actions">
              <button class="edit-btn">Modifier</button>
              <button class="delete-btn">Supprimer</button>
            </td>
          </tr>
        </tbody>
      </table>
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