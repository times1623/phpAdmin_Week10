<?php
	var_dump($_GET);
	$fields = array(
		'name'=>array(
			'type'=>'text',
			'label'=>'Name'
		),
		'email'=>array(
			'type'=>'email',
			'label'=>'Email'
		),
		'phone'=>array(
			'type'=>'tel',
			'label'=>'Phone'
		),
		'massage'=>array(
			'type'=>'textarea',
			'label'=>'Massage'
		),		
	);
?>
<html>
<head>
	<meta charset="utf-8">
	<title>cont</title>
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>
	<form action="connect.php" method="GET">
		<?php foreach ($fields as $field_name => $field_config):?>
			<?php if ($field_config['type']==='textarea'):?>
				<label for="<?php echo $field_name;?>"><?php echo $field_config['label'];?></label>
				<textarea id="<?php echo $field_name; ?>" name="<?php echo $field_name; ?>" row="3"></textarea>
			<?php elseif ($field_config['type'] ): ?>
		<label for="<?php echo $field_name;?>"><?php echo $field_config['label'];?></label>
		<input id="<?php echo $field_name; ?>" type="<?php echo $field_config['type']; ?>" name="<?php echo $field_name; ?>">
		<?php endif;?>
	<?php endforeach?>

		<button type="submit">Submit</button>
	</form>


</body>
</html>