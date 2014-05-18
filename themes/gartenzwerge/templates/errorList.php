<?php if(!empty($data['error'])): ?>
<div id="errorBox">
    <strong>Fehler!</strong>
	<ul>
	<?php foreach($data['error'] as $error): ?>
		<li><?php echo htmlspecialchars($error); ?></li>
	<?php endforeach; ?>
	</ul>
</div>
<?php endif; ?>
