<?php echo validation_errors(); ?>
<?php echo form_open('nationalite/create'); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h3 class="text-center"><?= $title ?></h3>
			<div class="form-group">
		    	<label>Nom du pays</label>
			    <input type="text" class="form-control" name="pays" placeholder="Tapez le nom du pays">
			</div>
			<button class="btn btn-primary">Ajouter</button>
		</div>
	</div>
</form>	