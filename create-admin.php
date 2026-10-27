<?php
declare(strict_types=1);
$path = __DIR__ . '/data/store.json';
$db = json_decode(file_get_contents($path), true, 512, JSON_THROW_ON_ERROR);
$name = trim(readline('Administrator name: '));
$email = strtolower(trim(readline('Administrator email: ')));
$password = (string) readline('Password (at least 12 characters): ');
if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 12) { fwrite(STDERR, "Enter a name, valid email, and password with at least 12 characters.\n"); exit(1); }
foreach ($db['users'] as &$user) if ($user['email'] === $email) { fwrite(STDERR, "That email already exists.\n"); exit(1); }
$db['users'][] = ['id' => bin2hex(random_bytes(8)), 'name' => $name, 'email' => $email, 'password' => password_hash($password, PASSWORD_DEFAULT), 'role' => 'admin', 'active' => true];
file_put_contents($path, json_encode($db, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES), LOCK_EX);
echo "Administrator created for {$email}.\n";
