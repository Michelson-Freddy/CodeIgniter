<?php echo validation_errors(); ?>
<?php echo form_open('posts/update'); ?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h3 class="text-center"><?= $title ?></h3>
            <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
        	<div class="form-group">
            	<label>Nom joueur</label>
            	<input type="text" class="form-control" name="nom" placeholder="Tapez le nom du joueur" value="<?php echo $post['nom']; ?>">
            </div>
            <div class="form-group">
                <label>Prenom joueur</label>
                <input type="text" class="form-control" name="prenom" placeholder="Tapez le prenom du joueur" value="<?php echo $post['prenom']; ?>">
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
                <textarea class="form-control" name="apropos" placeholder="Desciption"><?php echo $post['apropos']; ?></textarea>
            </div>
          	<button type="submit" class="btn btn-primary" onclick="return confirm('Confirmez la modification?')">Enregistrer</button>
        </div>
    </div>    
</form>