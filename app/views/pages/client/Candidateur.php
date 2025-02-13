<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      min-height: 100vh;
      background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .modal-content {
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      border: none;
      background: rgba(255, 255, 255, 0.95);
    }

    .modal-header {
      background: linear-gradient(to right, #4CAF50, #45a049);
      color: white;
      border-radius: 15px 15px 0 0;
      padding: 20px;
    }

    .form-control {
      border-radius: 8px;
      border: 1px solid #ddd;
      padding: 10px;
    }

    .form-control:focus {
      box-shadow: 0 0 5px rgba(76, 175, 80, 0.3);
      border-color: #4CAF50;
    }

    .btn-success {
      background-color: #4CAF50;
      border: none;
      padding: 10px 25px;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .btn-success:hover {
      background-color: #45a049;
      transform: translateY(-2px);
    }

    .modal-footer {
      border-top: none;
      padding: 20px;
    }

    .form-label {
      color: #333;
      font-weight: 500;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="proposalModalLabel">Faire une proposition</h5>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea name ="description" class="form-control" id="description" rows="3" required></textarea>
            </div>
            
            <div class="mb-3">
              <label for="budget" class="form-label">Budget</label>
              <input name ="budget" type="number" class="form-control" id="budget" required>
            </div>
            
            <div class="mb-3">
              <label for="dateDebut" class="form-label">Date de début</label>
              <input name="date_debut" type="date" class="form-control" id="dateDebut" required>
            </div>
            
            <div class="mb-3">
              <label for="dateFin" class="form-label">Date de fin</label>
              <input name="date_fin" type="date" class="form-control" id="dateFin" required>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Envoyer </button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>