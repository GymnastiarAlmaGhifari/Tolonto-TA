<?php
require_once 'core/init.php';

$Sadmin = new ControllerSuperAdmin();
$SadminUser = new ControllerSuperadminUser();
    
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
    <title>Profile</title>
</head>

<body>
    <!--loader start  -->
    <div id="loader" class="fixed bg-neutral_900 h-screen w-screen flex flex-row justify-center items-center z-50">
        <span class="loader-103"> </span>
    </div>
    <!-- loader end -->
    <main class=" bg-neutral_900 w-full ">
        <div class="overflow-x-hidden overflow-y-auto font-noto-sans h-screen">
            <form action="profile.php" method="post">
                <!-- header -->
                <?php require_once 'components/main/header.php'; ?>
                <!-- sidebar -->
                <?php require_once 'components/main/sidebar.php'; ?>
            </form>
            <?php require_once 'components/main/modalLogout.php'; ?>
            <!-- list control -->
            <section id="control" class="xs:mt-[84px] sm:mt-24 text-neutral_050  xs:ml-[84px] sm:ml-24 ">
                <div class="container">

                    <div class="w-full p-4 bg-neutral_800 flex flex-col justify-center items-center gap-4">
                                <label tabindex="0" class="rounded-lg w-[32px]">
                                    <img src="<?php echo $user_data['img']; ?>" alt="" class="rounded-lg w-[200px] h-[200px]">
                                </label>
                                <label <?php echo $user_data['username'];
                                    ?>></label>
                        <div class="flex flex-col gap-8 ml-24">
                            <div class="flex flex-row gap-4">
                                <h1 class="font-bold text-2xl"><?php echo $user_data['username'];?></h1>
                            </div>
                            <div class="flex flex-row gap-4">
                                <h2> terakhir diupdate pada : <?php echo $user_data['update_at']?></h2>
                            </div>
                        </div>
                        <button id="ubah_profile" class=" w-full p-4 bg-[#32FC00] rounded-lg text-justify drop-shadow-2xl mt-4 font-bold" name="submin"> Ubah Username dan Password</button>
                    </div>
            </section>
    </main>
    <!-- fungsi multi level user       -->  
    <?php require_once 'components/profile/modals_ubahpassword.php'; ?>
</body>
<script>
    
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

        const table_admin = document.getElementById('table-admin');
        var loader = document.getElementById('loader');
        window.addEventListener("load", () => {
            loader.classList.add("hidden");
        });
    </script>

</html>