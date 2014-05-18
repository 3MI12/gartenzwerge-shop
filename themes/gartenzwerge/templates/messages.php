<?php if(!empty($_SESSION['messages'])): ?>
<div id="errorBox">
	<ul>

	<?php foreach($_SESSION['messages'] as $message): ?>

		<li><?php echo htmlspecialchars($message); ?></li>

	<?php endforeach; ?>

	</ul>
</div>
<?php $_SESSION['messages'] = null; endif; ?>