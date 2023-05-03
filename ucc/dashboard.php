<?php include('header.php'); ?>
    <main class="dashboard">
        <?php
            $user = $_GET['username'];

            if (!isset($user)) {
                header('Location: log-in.php');
            }
        ?>
        <div class="dashboard-content font-0">
            <h1 class="dashboard-heading">Welcome <span><?= $user; ?>!</span></h1>
        </div>
    </main>
<?php include('footer.php'); ?>