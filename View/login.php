<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="assets/styles/auth.css">
</head>

<body>
    <div class="card">
        <h1>Connexion</h1>
        <form action="Controller/login.contr.php" method="post">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" required>
            </div>
            <input type="submit" value="Connexion" class="btn">
        </form>
        <a href="index.php?register" class="link">Créer un compte</a>
    </div>
</body>

</html>