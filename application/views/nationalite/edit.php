<?php echo validation_errors(); ?>
<?php echo form_open('nationalite/update'); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h3 class="text-center"><?= $title ?></h3>
			<input type="hidden" name="id" value="<?php echo $country['id']; ?>">
			<div class="form-group">
		    	<label>Nom du pays</label>
			    <input type="text" class="form-control" name="pays" value="<?php echo $country['pays']; ?>">
			</div>
			<button class="btn btn-primary" onclick="return confirm('Voulez-vous enregister la modification ?');">Enregister</button>
		</div>
	</div>
</form>	