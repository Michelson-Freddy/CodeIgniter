<?php echo validation_errors(); ?>
<?php echo form_open_multipart('posts/create'); ?>
	<div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h3 class="text-center"><?= $title ?></h3>
        	<div class="form-group">
            	<label>Nom du joueur</label>
            	<input type="text" class="form-control" name="nom" placeholder="Tapez le nom du joueur">
            </div>
            <div class="form-group">
            	<label>Prenom du joueur</label>
            	<input type="text" class="form-control" name="prenom" placeholder="Tapez le prenom du joueur">
            </div>
            <div class="form-group">
                <label>Nationalité</label>
                <select name="nationalite_id" class="form-control">
                    <?php foreach ($nationalite as $country): ?>
                        <option value="<?php echo $country['id']; ?>"><?php echo $country['pays']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Club</label>
                <select name="category_id" class="form-control">
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>A propos</label>
                <textarea class="form-control" name="apropos" placeholder="Desciption"></textarea>
            </div>
            <div class="form-group">
                <label>Importer une image de joueur</label>
                <input type="file" name="userfile">
            </div>
          	<button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
    </div>    
</form>