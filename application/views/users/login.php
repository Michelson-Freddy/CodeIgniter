<?php echo form_open('users/login'); ?>
	<div class="row">
		<div class="col-md-3 col-md-offset-4">
			<h1 class="text-center"><?php echo $title; ?></h1>
			<div class="form-group">
				<input type="text" class="form-control" value="Admin" name="username" placeholder="Entrer le nom d'utilisateur" required autofocus>
			</div>
			<div class="form-group">
				<input type="password" class="form-control" value="password" name="password" placeholder="Entrer le mot de passe" required autofocus>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Se connecter</button>
    	</div>
    </div>	
</form>