<?php echo validation_errors(); ?>
<?php echo form_open('categories/update'); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h2 class="text-center"><?= $title ?></h2>
		    <input type="hidden" name="id" value="<?php echo $club['id']; ?>">
			<div class="form-group">
		    	<label>Nom du club</label>
		    	<input type="text" class="form-control" name="name" placeholder="Tapez le nom du club" value="<?php echo $club['name']; ?>">
			</div>
		  	<button type="submit" class="btn btn-primary" onclick="return confirm('Voulez-vous enregister la modification ?')">Enregistrer</button>
		</div>
	</div>	  	
</form>