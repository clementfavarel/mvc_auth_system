<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="assets/styles/auth.css">
</head>

<body>
    <div class="card">
        <h1>Inscription</h1>
        <form action="Controller/register.contr.php" method="post">
            <div class="input-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" name="username" required>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="password_confirm">Confirmer le mot de passe</label>
                <input type="password" name="password_confirm" required>
            </div>
            <input type="submit" value="Inscription" class="btn">
        </form>
        <a href="index.php?login" class="link">J'ai déjà un compte</a>
    </div>
</body>

</html>