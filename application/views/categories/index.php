<h2><?= $title ?></h2>
<table class="table table-hover">
	<?php foreach ($club as $post) : ?>
		<tr>
			<td>
				<?php echo $post['name']; ?>
			</td>
			<td>
				<a href="<?php echo site_url('/categories/posts/'.$post['id']); ?>">
					<button class="btn btn-success">Voir les joueurs</button>
				</a>
			</td>
			<td>
				<a class="btn btn-info pull-left" href="categories/edit/<?php echo $post['id']; ?>">Modifier</a>
			</td>
			<td>
				<?php echo form_open('categories/delete/'.$post['id']); ?>
					<input type="submit" value="Supprimer" onclick="return confirm('Confirmez la suppression ?')" class="btn btn-danger">
				</form>
			</td>
		</tr>
	<?php endforeach; ?>
</table>
