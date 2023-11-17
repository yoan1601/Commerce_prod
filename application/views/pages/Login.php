<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
<!-- Bootstrap core CSS -->
<link href="<?= base_url('assets\css\bootstrap.min.css')?>" rel="stylesheet">

<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
</style>
    <link rel="stylesheet" href="<?= base_url("assets\css\signin.css") ?>">
</head>
<body>
<main class="form-signin">
  <form method="POST" action="<?= site_url("login/seConnecter") ?>">
    <h1 class="h3 mb-3 fw-normal">Connectez vous</h1>

    <div class="form-floating">
      <input type="nom" class="form-control" id="floatingInput" placeholder="nom" name="nom_emp">
      <label for="floatingInput">Nom</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="mot de passe" name="motdepasse">
      <label for="floatingPassword">Mot de passe</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
  </form>
</main>
    
</body>
</html>