<?php 

require 'partials/header.php'; ?>

	


	<h1>My Tasks</h1>
	<ul>
		<?php 
			if(isset($tasks)):

				foreach ($tasks as $task) : ?>
				
					<li>
						<?php if ($task->completed):?>

							<strike><?= $task->description; ?></strike>

						<?php else: ?>

							<?= $task->description; ?>

						<?php endif ?>

					</li>

		<?php

				 endforeach; 
			endif;

			?>
	</ul>

	<ul>
		
		<?php 
			if (isset($errors)) {
				foreach ($errors as $error) {
					echo "<li>" . $error[0]. "</li>";
				}
			}
		?>
		
	</ul>



<form method="post" action="/">
	
	<input type="text" name="description">
	<button type="submit" name="submit">Submit</button>
</form>



<?php require 'partials/footer.php'; ?>