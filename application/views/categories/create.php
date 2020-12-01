<?php echo validation_errors(); ?>
<?php echo form_open_multipart('categories/create'); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h3 class="text-center"><?= $title ?></h3>
			<div class="form-group">
		    	<label>Nom du Club</label>
		    	<input type="text" class="form-control" name="name" placeholder="Tapez le nom du Club">
		    </div>
		    <button type="submit" class="btn btn-primary">Ajouter</button>
		</div>
	</div>	    
</form>