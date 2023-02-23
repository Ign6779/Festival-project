<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Haarlem Yummy</title>
  <link rel="stylesheet" href="/../css/yummy.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- font families  -->
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Corben" />
  <link href='https://fonts.googleapis.com/css?family=Mandali' rel='stylesheet'>
</head>


<body>
  <?php
    include __DIR__ . '/../header.php';
    $user = $this->userService->getByUsername('gnas');
  ?>
  <section class="yummy-header">
    <h1 class="yummy-title">YUMMY! HAARLEM</h1>

  </section>


  <h2><?php echo $user->getUsername() ?></h2>
  <h2><?php echo $user->getPassword() ?></h2>

  <?php
  include __DIR__ . '/../footer.php';
  ?>
</body>
