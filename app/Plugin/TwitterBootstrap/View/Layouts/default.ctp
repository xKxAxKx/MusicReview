<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		<?php echo __('CakePHP: the rapid development php framework:'); ?>
		<?php echo $title_for_layout; ?>
	</title>

    <!-- Bootstrap -->
	<?php echo $this->Html->css('bootstrap.min'); ?>
	<?php echo $this->Html->css('bootstrap-responsive.min'); ?>
  <?php echo $this->Html->css('4-col-portfolio'); ?>
  <?php echo $this->Html->css('bootstrap-custom'); ?>


	<!-- Le styles -->
	<style>
    /*.starter-template {
      padding: 40px 15px;
      text-align: center;
    }*/
	</style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		    </div>
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
						<li><?= $this->Html->link('Music Review', '/'); ?></li>
            <li><?= $this->Html->link('作品を検索する', '/Records/search'); ?></li>
		        <?php if($currentUser) :?>
		          <li><?= $this->Html->link('作品を追加する', '/Records/add'); ?></li>
		        <?php endif; ?>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		        <?php if($currentUser) :?>
		          <li class="dropdown">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >
									<?= $this->User->photoImage_nouser($currentUser, ['style' => 'height:23px']) ;?>
								</a>
		            <ul class="dropdown-menu">
		              <li>
		                <?= $this->Html->link('マイページ', ['controller' => 'users', 'action' => 'view', $currentUser['id']]); ?>
		              </li>
		              <li>
		                <?= $this->Html->link('設定編集', ['controller' => 'users', 'action' => 'edit']); ?>
		              </li>
		              <li>
		                <?= $this->Html->link('ログアウト', ['controller' => 'users', 'action' => 'logout']); ?>
		              </li>
		            </ul>
		          </li>
		        <?php else :?>
		          <li>
		            <?= $this->Html->link('ログイン', ['controller' => 'users', 'action' => 'login']); ?>
		          </li>
		          <li>
		            <?= $this->Html->link('新規会員登録', ['controller' => 'users', 'action' => 'signup']); ?>
		          </li>
		        <?php endif; ?>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>

		<div class="container">
    <?php echo $this->Session->flash(); ?>

    <?php echo $this->fetch('content'); ?>

		</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php echo $this->Html->script('bootstrap.min'); ?>
    <?php echo $this->fetch('script'); ?>
  </body>
</html>
