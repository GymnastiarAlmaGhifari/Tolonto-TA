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
    <title>Document</title>
</head>

<body>
    
    <?php require_once 'components/main/header.php'; ?>
    <?php require_once 'components/main/sidebar.php'; ?>
    
    <main class=" bg-neutral_900 w-full ">
        <div class="overflow-x-hidden overflow-y-auto font-noto-sans h-screen">
            <form action="dashboardSuperAdmin.php" method="post">
                <!-- header -->
                <?php require_once 'components/main/header.php'; ?>
                <!-- sidebar -->
                <?php require_once 'components/main/sidebar.php'; ?>
            
            </form>
            <!-- list control -->
            <section id= "profile" class="mt-24 text-neutral_100 ml-24 mr-24">
                <div class= "container">
                    <div class="w-full p-4 bg-neutral_800 flex flex-col justify-center items-center gap-4">
                                <label tabindex="0" class="rounded-lg w-[32px]">
                                    <img src="<?php echo $user_data['img']; ?>" alt="" class="rounded-lg w-[200px] h-[200px]">
                                </label>
                                <label <?php echo $user_data['username'];
                                    ?>></label>
                        <div class="flex flex-col gap-8 ml-24 mr-24">
                            <div class="flex flex-row gap-4">
                                <h1 class="font-bold text-2xl"><?php echo $user_data['username'];?></h1>
                            </div>
                            <div class="flex flex-row gap-4">
                                <h2> terakhir diupdate pada : <?php echo $user_data['update_at']?></h2>
                            </div>
                        </div>
                        <button id="ubah_profile" class=" w-full p-4 bg-[#32FC00] rounded-lg text-justify drop-shadow-2xl mt-4 font-bold"> Ubah Username dan Password</button>
                    </div>
                </div>
            </section>
    </main>
    <!-- fungsi multi level user       -->  
    <?php require_once 'components/profile/modals_ubahpassword.php'; ?>
</body>


</html>