<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tarea2 :: <?= $page_title ?? "BD" ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>
  <?php require_once "../template/navbar.php" ?>
  <?php if (isset($page_hero)) :?>
  <section class="hero is-medium <?= $page_hero_type ?? 'is-info' ?>">
    <div class="hero-body">
      <p class="title">
        <?= $page_hero ?>
      </p>
      <p class="subtitle">
        <?= $page_hero_subtitle ?? '' ?>
      </p>
    </div>
  </section>
  <?php endif; ?>
  <div class="container">
    <?php include $page ?>
  </div>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>

</html>