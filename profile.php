<?php

require_once 'core/init.php';

$Sadmin = new ControllerSuperAdmin();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/output.css">
    <link rel="stylesheet" href="assets/styles/animation.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./public/favicon.ico" type="image/x-icon">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <title>Profile</title>
</head>

<body>
    <main class=" bg-neutral_900 w-full ">
        <div class="overflow-x-hidden overflow-y-auto font-noto-sans h-screen">
            <form action="profil.php" method="post">
                <!-- header -->
                <?php require_once 'components/main/header.php'; ?>
                <!-- sidebar -->
                <?php require_once 'components/main/sidebar.php'; ?>
            </form>

            <!-- list control -->
            <section id="control" class="mt-24 text-neutral_050  ml-24">
                <div class="container">
                    <div class="w-[1133px] p-4 bg-neutral_800 flex flex-row gap-2">
                        <h1>Profile</h1>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>

</html>