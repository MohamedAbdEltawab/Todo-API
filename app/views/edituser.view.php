<?php require ('partials/header.php'); ?>


<h1>Edit User</h1>


<form method="post" action="updateuser">
	<input type="hidden" name="id" value="<?= $user[0]->id ?>">
	<input type="text" name="name" value="<?= $user[0]->name ?>">
	<input type="text" name="age" value="<?= $user[0]->age ?>">
	<button type="submit" >Update</button>
</form>


<?php require 'partials/footer.php'; ?>