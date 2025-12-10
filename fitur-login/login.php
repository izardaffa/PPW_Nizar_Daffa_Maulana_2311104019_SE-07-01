<?php
session_start();
require_once __DIR__ . '/connect.php';

// Alihkan jika sudah login.
if (isset($_SESSION['user_id'])) {
	header('Location: index.php');
	exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = trim($_POST['username'] ?? '');
	$password = $_POST['password'] ?? '';

	if ($username === '' || $password === '') {
		$error = 'Username dan password wajib diisi.';
	} else {
		$sql = 'SELECT id, name, username, password FROM users WHERE username = ? LIMIT 1';
		$stmt = mysqli_prepare($conn, $sql);

		if ($stmt) {
			mysqli_stmt_bind_param($stmt, 's', $username);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			$user = mysqli_fetch_assoc($result);
			mysqli_stmt_close($stmt);

			if ($user && $user['password'] === md5($password)) {
				$_SESSION['user_id'] = $user['id'];
				$_SESSION['username'] = $user['username'];
				$_SESSION['name'] = $user['name'];

				header('Location: index.php');
				exit;
			}

			$error = $user ? 'Password salah.' : 'Username tidak ditemukan.';
		} else {
			$error = 'Terjadi kesalahan. Silakan coba lagi.';
		}
	}
}
?>
<!doctype html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<style>
		body { font-family: Arial, sans-serif; background: #f4f6f8; display: flex; align-items: center; justify-content: center; min-height: 100vh; }
		.card { background: #fff; border: 1px solid #e2e5e9; border-radius: 8px; padding: 24px; width: 320px; box-shadow: 0 6px 16px rgba(0,0,0,0.08); }
		h2 { margin: 0 0 16px; font-size: 20px; text-align: center; }
		label { display: block; margin-bottom: 6px; font-weight: 600; }
		input { width: 100%; padding: 10px 12px; margin-bottom: 12px; border: 1px solid #cfd4da; border-radius: 6px; font-size: 14px; }
		button { width: 100%; padding: 10px 12px; border: none; background: #0d6efd; color: #fff; font-weight: 600; border-radius: 6px; cursor: pointer; }
		button:hover { background: #0b5ed7; }
		.error { color: #b42318; background: #fef3f2; border: 1px solid #f3b8b3; padding: 10px 12px; border-radius: 6px; margin-bottom: 12px; font-size: 14px; }
	</style>
</head>
<body>
	<div class="card">
		<h2>Login</h2>
		<?php if ($error): ?>
			<div class="error"><?php echo htmlspecialchars($error); ?></div>
		<?php endif; ?>
		<form method="post" action="">
			<label for="username">Username</label>
			<input type="text" id="username" name="username" placeholder="Masukkan username" required>

			<label for="password">Password</label>
			<input type="password" id="password" name="password" placeholder="Masukkan password" required>

			<button type="submit">Masuk</button>
		</form>
	</div>
</body>
</html>
