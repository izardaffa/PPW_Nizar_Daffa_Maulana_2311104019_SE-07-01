<?php
session_start();

// Logout sederhana via query string.
if (isset($_GET['logout'])) {
	session_destroy();
	header('Location: login.php');
	exit;
}

if (!isset($_SESSION['user_id'])) {
	header('Location: login.php');
	exit;
}

$name = $_SESSION['name'] ?? $_SESSION['username'];
?>
<!doctype html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<style>
		body { font-family: Arial, sans-serif; background: #f4f6f8; display: flex; align-items: center; justify-content: center; min-height: 100vh; }
		.card { background: #fff; border: 1px solid #e2e5e9; border-radius: 8px; padding: 24px; width: 360px; box-shadow: 0 6px 16px rgba(0,0,0,0.08); text-align: center; }
		h2 { margin: 0 0 12px; font-size: 22px; }
		p { margin: 0 0 16px; font-size: 15px; color: #505962; }
		a { display: inline-block; padding: 10px 14px; background: #dc3545; color: #fff; border-radius: 6px; text-decoration: none; font-weight: 600; }
		a:hover { background: #bb2d3b; }
	</style>
</head>
<body>
	<div class="card">
		<h2>Halo, <?php echo htmlspecialchars($name); ?>!</h2>
		<p>Berhasil Login!</p>
		<a href="?logout=1">Logout</a>
	</div>
</body>
</html>
