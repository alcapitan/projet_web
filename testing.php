<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Connexion</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet">
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #6e8efb, #a777e3);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    .login-container {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.3);
      padding: 2rem;
      width: 350px;
      text-align: center;
    }
    .login-container h2 {
      margin-bottom: 1.5rem;
      color: #333;
    }
    .login-container input {
      width: 100%;
      padding: 12px 15px;
      margin: 8px 0;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 1rem;
      transition: border-color 0.3s ease;
    }
    .login-container input:focus {
      border-color: #6e8efb;
      outline: none;
    }
    .login-container button {
      width: 100%;
      padding: 12px;
      background: #6e8efb;
      border: none;
      border-radius: 5px;
      color: #fff;
      font-size: 1rem;
      cursor: pointer;
      margin-top: 1rem;
      transition: background 0.3s ease;
    }
    .login-container button:hover {
      background: #5a7de0;
    }
    .login-container .links {
      margin-top: 1rem;
      font-size: 0.9rem;
    }
    .login-container .links a {
      color: #6e8efb;
      text-decoration: none;
    }
    .login-container .links a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Connexion</h2>
    <form id="loginForm">
      <input type="text" id="username" placeholder="Nom d'utilisateur" required>
      <input type="password" id="password" placeholder="Mot de passe" required>
      <button type="submit">Se connecter</button>
      <div class="links">
        <a href="#">Mot de passe oublié ?</a>
      </div>
    </form>
  </div>
  <script>
    document.getElementById('loginForm').addEventListener('submit', function(e) {
      e.preventDefault();
      const username = document.getElementById('username').value;
      const password = document.getElementById('password').value;
      if(username && password) {
        alert('Bienvenue, ' + username + ' !');
      } else {
        alert('Veuillez remplir tous les champs.');
      }
    });
  </script>
</body>
</html>


