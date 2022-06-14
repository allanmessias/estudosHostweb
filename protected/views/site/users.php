<?php foreach ($allUsers as $users):?>
    <h3><?php echo $users['username']?></h3>
    <h3><?php echo $users['email']?></h3>
    <h3><?php echo $users['password']?></h3>
<?php endforeach; ?>