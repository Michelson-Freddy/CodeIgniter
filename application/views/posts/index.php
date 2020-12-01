<h2>LISTES DES JOUEURS</h2>
<?php if ($experiencePro) : ?>
	<?php foreach ($experiencePro as $post) : ?>
		<h3><?php echo $post['nom']; ?></h3>
		<h4><?php echo $post['prenom']; ?></h4>
		<div class="row">
			<div class="col-md-3">
				<img style="height: 200px; width: 220px;" src="<?php echo base_url().'assets/images/posts/'.$post['post_image']; ?>">
			</div>
			<div class="col-md-9">
				<small class="post-date">Publié le: <?php echo $post['date_ajout']; ?></small>
				<p><?php echo $post['pays']; ?><br></p>
				<p>Jouer au <strong><?php echo $post['name']; ?></strong></p>
				<p><a class="btn btn-success" href="<?php echo site_url('/posts/'.$post['slug']); ?>">Plus details</a></p>	
			</div>
		</div>			
	<?php endforeach; ?>
	<?php else : ?>
		<p>Aucun joueur dans ce club</p>
<?php endif; ?>