<?php 

require 'partials/header.php'; ?>



	<ul>
		<?php foreach ($users as $user) : ?>
		
			<li>
					<?= $user->name; ?>
					
					<button>
						<a href="edituser?id=<?= $user->id; ?>" class="btn-edit">
							Edit
						</a>
					</button>
					
					<button class="btn-del">
						<a href="deleteuser?id=<?= $user->id; ?>" >
							Delete
						</a>
					</button>
					

			

				
				</li>

		<?php endforeach ?>
	</ul>



<form method="post" action="/users">
	
	<input type="text" name="name" required>
	<button type="submit" name="submit">Submit</button>
</form>

<?php require 'partials/footer.php'; ?>