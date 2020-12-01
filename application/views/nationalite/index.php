<h2><?= $title ?></h2>
	<table class="table table-hover">
		<?php foreach ($origine as $country): ?>
			<tr>
				<td><?php echo $country['pays']; ?></td>
				<td>
					<a href="<?php echo site_url('/nationalite/posts/'.$country['id']); ?>">
						<button class="btn btn-success">Voir les joueurs</button>
					</a>
				</td>
				<td><a href="nationalite/edit/<?php echo $country['id']; ?>"><button class="btn btn-primary">Modifier</button></a></td>
				<td>
					<?php echo form_open('nationalite/delete/'.$country['id']); ?>
						<button class="btn btn-danger" onclick="return confirm('Confirmez la suppression ?');">Supprimer</button>
					</form>
				</td>
			</tr>
		<?php endforeach; ?>	
	</table>