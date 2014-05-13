<?php if(!empty($_SESSION['messages'])): ?>
	<ul>
	<?php foreach($_SESSION['messages'] as $message): ?>
		<li><?php echo htmlspecialchars($message); ?></li>
	<?php endforeach; ?>
	</ul>
<?php $_SESSION['messages'] = null; endif; ?>