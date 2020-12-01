<img style="height: 350px; width: 420px;" src="<?php echo base_url().'assets/images/posts/'.$post['post_image']; ?>">
<h2><?php echo $post['nom']; ?></h2>
<h3><?php echo $post['prenom']; ?></h3>
<div class="post-body">
	<?php echo $post['pays']; ?>
	<p><?php echo $post['apropos']; ?></p>
</div>
<?php if ($this->session->userdata('user_id') == $post['user_id']): ?>
	<hr>
	<a class="btn btn-info pull-left" href="edit/<?php echo $post['slug']; ?>">Modifier</a>
	<?php echo form_open('posts/delete/'.$post['id']); ?>
		<input type="submit" value="Supprimer" onclick="return confirm('Confirmez la suppression ?')" class="btn btn-danger">
	</form>
<?php endif ?>
<h3>Commenter</h3>
<?php if ($comments) : ?>
	<?php foreach ($comments as $comment) : ?>
		<div class="well">
			<h5>
				<?php echo $comment['body']; ?> [de <strong><?php echo $comment['name'] ?></strong>]
			</h5>
		</div>	
	<?php endforeach; ?>
	<?php else : ?>
		<p>Aucun commenter</p>
<?php endif; ?>
<h3>Ajouter commenter</h3>
<?php echo validation_errors(); ?>
<?php echo form_open('comment/create/'.$post['id']); ?>
	<div class="form-group">
	    <label>Nom</label>
	    <input type="text" class="form-control" name="name">
	</div>
	<div class="form-group">
	    <label>Email</label>
	    <input type="email" class="form-control" name="email">
	</div>
	<div class="form-group">
	   	<label>Commenter</label>
	    <input type="text" class="form-control" name="body">
	</div>
	<button type="submit" class="btn btn-primary">Commenter</button>
</form>