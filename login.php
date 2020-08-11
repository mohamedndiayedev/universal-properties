<?php if(!isset($Translation)){ @header('Location: index.php?signIn=1'); exit; } ?>
<?php include_once("$currDir/header.php"); ?>

<img src="universal.jpeg" class="center" width="300" height="200">
<div class="row">
	<div class="col s10 m2 l0"> 
	
		<div class="panel panel-success"> 
			<style>
				# col {
					color:#cbb4d4;
					text-align:center;
					font-weight: bold;
				  };
					#tax {
					color:#cbb4d4;
					text-align:center;
					font-weight: bold;
				  };
	       </style>
		
			<h1 id="col"><strong>Universal Properties Agency - Ultimate Dashboard</strong></h1>
			<?php if($_GET['loginFailed']){ ?>
			<div class="alert alert-danger"><?php echo $Translation['login failed']; ?></div>
			<?php } ?>
			<div class="panel-heading">
				<h4 id="tax">ULTIMATE DASHBOARD - By ANK Analytics</h4>
				<?php if(sqlValue("select count(1) from membership_groups where allowSignup=1")){ ?>
					<h1 class="btn btn-success pull-right">Universal Properties Agency.<br/>A Gambian Real Estate Company</h1>
				<?php } ?>
				<div class="clearfix"></div>
			</div>

			<div class="panel-body">
				<form method="post" action="index.php">
					<div class="form-group">
						<label class="control-label" for="username"><?php echo $Translation['username']; ?></label>
						<input class="form-control" name="username" id="username" type="text" placeholder="<?php echo $Translation['username']; ?>" required>
					</div>
					<div class="form-group">
						<label class="control-label" for="password"><?php echo $Translation['password']; ?></label>
						<input class="form-control" name="password" id="password" type="password" placeholder="<?php echo $Translation['password']; ?>" required>
						<!-- <span class="help-block"><?php echo $Translation['forgot password']; ?></span> -->
					</div>
	<!-- 				<div class="checkbox">
						<label class="control-label" for="rememberMe">
							<input type="checkbox" name="rememberMe" id="rememberMe" value="1">
							<?php echo $Translation['remember me']; ?>
						</label>
					</div> -->

					<div class="row">
						<div class="col-sm-offset-3 col-sm-6">
							<button name="signIn" type="submit" id="submit" value="signIn" class="btn btn-primary btn-lg btn-block"><?php echo $Translation['sign in']; ?></button>
						</div>
					</div>
				</form>
			</div>

			<?php if(is_array(getTableList()) && count(getTableList())){ /* if anon. users can see any tables ... */ ?>
				<div class="panel-footer">
					
				</div>
			<?php } ?>

		</div>
	</div>
</div>

<script>document.getElementById('username').focus();</script>
<?php include_once("$currDir/footer.php"); ?>