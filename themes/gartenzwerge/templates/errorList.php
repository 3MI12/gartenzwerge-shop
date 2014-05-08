<?php if(!empty($data['error'])): ?>
	<strong>Fehler!</strong>
	<ul>
	<?php foreach($data['error'] as $error): ?>
		<li><?php echo htmlspecialchars($error); ?></li>
	<?php endforeach; ?>
	</ul>
<?php endif; ?>
