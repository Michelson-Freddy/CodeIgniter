<?php echo validation_errors(); ?>
<?php echo form_open('users/register'); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h2 class="text-center"><?= $title ?></h2>
			<div class="form-group">
		    	<label>Nom</label>
		    	<input type="text" class="form-control" name="name" placeholder="Tapez votre nom">
		    </div>
		    <div class="form-group">
		        <label>Email</label>
		        <input type="text" class="form-control" name="email" placeholder="Tapez votre email">
		    </div>
			<div class="form-group">
		    	<label>Username</label>
		        <input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur">
		    </div>
		    <div class="form-group">
		    	<label>Mot de passe</label>
		        <input type="password" class="form-control" name="password" placeholder="Votre mot de passe">
		    </div>
		    <div class="form-group">
		    	<label>Confirmation du mot de passe</label>
		        <input type="password" class="form-control" name="password2" placeholder="Confirmer le mot de passe">
		    </div>
		    <button type="submit" class="btn btn-primary btn-block">Creer un compte</button>
		</div>    
	</div>    
</form>