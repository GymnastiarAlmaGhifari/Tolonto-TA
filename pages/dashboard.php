<?php
require_once '../core/init.php';

if (!$user->is_login()) {
    Session::flash('login', '<script>alert("Anda Harus Login")</script>');
    Redirect::to('login');
}

if (Session::exists('dashboard')) {
    echo Session::flash('dashboard');
}

if (Input::get('nama')) {
    $user_data = $user->get_data(Input::get('nama'));
} else {
    $user_data = $user->get_data(Session::get('username'));
}

?>
<?php require_once 'components/header.php'; ?>

<!-- fungsi multi level user       -->
<?php if ($user_data['username'] == Session::get('username')) { ?>
    <?php if ($user->is_superAdmin(Session::get('username'))) { ?>
        <a style="color:#eee;margin-left:-215px;text-decoration: underline;" href="dashboardSuperAdmin.php">Selamat Datang Admin</a>
    <?php } ?>
<?php } ?>
<h1 class="judul"><strong>Halo <?php echo $user_data['username']; ?></strong></h1>



<!-- <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/output.css">
    <title>Dashboard</title>
</head>

<body>
    <h1 class="text-teriary_900 text-2xl m-7 bg-primary_500">this is dashboard</h1>
</body>

</html> -->