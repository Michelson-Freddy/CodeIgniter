<!DOCTYPE html>
<html>
<head>
	<title>Gestion des équipes</title>
	<link href="<?php echo base_url().'assets/css/'; ?>bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url().'assets/css/'; ?>bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url().'assets/css/'; ?>style.css" rel="stylesheet" type="text/css" >
</head>
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container">
				<div id="navbar">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo base_url().'pages/view/about'; ?>">Acceuil</a></li>
						<li><a href="<?php echo base_url().'posts'; ?>">Joueur</a></li>
						<li><a href="<?php echo base_url().'categories'; ?>">Club</a></li>
						<li><a href="<?php echo base_url().'nationalite'; ?>">Pays</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php if (!$this->session->userdata('logged_in')) : ?>
							<li>
								<a href="<?php echo base_url().'users/login'; ?>">Se connecter</a>
							</li>
							<li>
								<a href="<?php echo base_url().'users/register'; ?>">Creer un compte</a>
							</li>
						<?php endif; ?>
						<?php if ($this->session->userdata('logged_in')) : ?>
							<li>
								<a href="<?php echo base_url().'posts/create'; ?>">Ajouter joueur</a>
							</li>
							<li>
								<a href="<?php echo base_url().'categories/create'; ?>">Ajouter club</a>
							</li>
							<li>
								<a href="<?php echo base_url().'nationalite/create'; ?>">Ajouter pays</a>
							</li>
							<li>
								<a href="<?php echo base_url().'users/logout'; ?>">Deconnexion</a>
							</li>
						<?php endif; ?>	
					</ul>
				</div>
			</div>
		</nav>

		<div class="container">
			<?php if($this->session->flashdata('user_logout')):  ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_logout').'</p>'; ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('login_failed')):  ?>
				<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('user_loggedin')):  ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('user_register')):  ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_register').'</p>'; ?>
			<?php endif; ?>
			<?php if($this->session->flashdata('Ajout réussi')):  ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('Ajout réussi').'</p>'; ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('Modification réussi')):  ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('Modification réussi').'</p>'; ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('Suppression réussi')):  ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('Suppression réussi').'</p>'; ?>
			<?php endif; ?>


