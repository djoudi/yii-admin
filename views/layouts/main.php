<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />	
	
	<?php Yii::app()->clientScript->registerCssFile(Yii::app()->clientScript->getCoreScriptUrl() . '/jui/css/base/jquery-ui.css'); ?>
	
	<?php Yii::app()->clientScript->registerCssFile('/themes/admin/assets/css/styles.css') ?>	
	<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
	<?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
	<?php Yii::app()->clientScript->registerScriptFile('/themes/admin/assets/js/relCopy.jquery.js') ?>
	<?php Yii::app()->clientScript->registerScriptFile('/themes/admin/assets/js/scripts.js') ?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
	
	<?php
		if(!Yii::app()->user->isGuest){
			$this->widget('zii.widgets.CMenu', array(
				'id' => 'admin-menu',
				'htmlOptions' => array(
					'class' => 'clearfix',
				),
				'items' => array(
					// bands
					array('label' => 'Bands', 'url' => '/admin/band', 'items' => array(
						array('label' => 'List bands', 'url' => '/admin/band'),
						array('label' => 'Create band', 'url' => '/admin/band/create'),
					)),				
				
					// pages
					array('label' => 'Pages', 'url' => '/admin/page', 'items' => array(
						array('label' => 'List pages', 'url' => '/admin/page'),
						array('label' => 'Create page', 'url' => '/admin/page/create'),
					)),
				
					// pages
					array('label' => 'Venues', 'url' => '/admin/venue', 'items' => array(
						array('label' => 'List venues', 'url' => '/admin/venue'),
						array('label' => 'Create venue', 'url' => '/admin/venue/create'),
					)),				
				
					// pages
					array('label' => 'Shows', 'url' => '/admin/show', 'items' => array(
						array('label' => 'List shows', 'url' => '/admin/show'),
						array('label' => 'Create show', 'url' => '/admin/show/create'),
					)),
				
					// users
					array('label' => 'Users', 'url' => '/user', 'items' => array(
						array('label' => 'List users', 'url' => '/user'),
						array('label' => 'Create user', 'url' => '/user/admin/create'),
						array('label' => 'Profile fields', 'url' => '/user/profileField', 'visible' => Yii::app()->user->checkAccess('User.ProfileField.*'), 'items' => array(
							array('label' => 'Create profile field', 'url' => '/user/profileField/create', 'visible' => Yii::app()->user->checkAccess('User.ProfileField.*')),
						)),
						array('label' => 'Rights', 'url' => '/rights', 'visible' => Yii::app()->getModule('user')->isAdmin()),
					)),						
				
					array('label' => 'Hello there, ' . Yii::app()->user->name . '!', 'url' => '/user/profile', 'itemOptions' => array('class'=>'right first'), 'items' => array(
						array('label' => 'Edit profile', 'url' => '/user/profile/edit'),
						array('label' => 'Change password', 'url' => '/user/profile/changepassword'),
						array('label' => 'Logout', 'url' => '/site/logout'),
					)),
					array('label' => 'Public site', 'url' => '/', 'itemOptions' => array('class'=>'right'))
				),
			));
		}
	
	?>

	<div id="page">
		
		<div id="header"><?php print Yii::app()->name; ?> Admin</div><!-- end header -->
		
		<div id="main">
			
			<?php $messages = Yii::app()->user->getFlashes(); ?>
			<?php	if(!empty($messages)):	?>

				<div class="messages">
					<?php foreach($messages as $message): ?>
						<p><?php print $message ?></p>
					<?php endforeach; ?>
				</div>

			<?php endif; ?>		
			
			<?php print $content; ?>
		</div>
		
	</div><!-- end page -->

</body>
</html>
