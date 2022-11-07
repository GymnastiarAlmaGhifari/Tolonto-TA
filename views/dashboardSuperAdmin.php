<?php
require_once '../core/init.php';

if (!$user->is_login()) {
    Session::flash(
        'login',
        '<script>alert("Anda Harus Login")</script>'
    );
    Redirect::to('login');
}

if (Session::exists('dashboard')) {
    echo Session::flash('dashboard');
}

// pengecekan halaman admin
if (!$user->is_superAdmin(Session::get('username'))) {
    Session::flash(
        'dashboard',
        '<script>alert("Halaman Ini Khusus Admin")</script>'
    );
    Redirect::to('dashboard');
}

$users = $user->get_users();

?>
<?php require_once 'templates/header.php'; ?>

<h2 class="judul">Halaman Admin</h2>

<?php foreach ($users as $_user) : ?>
    <div class="list">
        <a class="list" href="dashboard.php?nama=<?php echo $_user['username'] ?>">
            <?php echo $_user['username'] ?></a>
    </div>
<?php endforeach; ?>

<?php require_once 'templates/footer.php'; ?>