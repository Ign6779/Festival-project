this is the yummy page 
<?php
    $user = $this->userService->getByUsername('gnas');
?>

<h2><?php echo $user->getUsername() ?></h2>
<h2><?php echo $user->getPassword() ?></h2>