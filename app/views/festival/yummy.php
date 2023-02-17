<?php
  include __DIR__ . '/../header.php';
  $user = $this->userService->getByUsername('gnas');
?>

<h2><?php echo $user->getUsername() ?></h2>
<h2><?php echo $user->getPassword() ?></h2>

<?php
include __DIR__ . '/../footer.php';
?>