<?php require 'partials/head.php'; ?>
<?php require '../../back-end/pages/session-variables-set.php'; ?>
    <div class="hotspot"><a href="dashboard.php">next</a></div>

<?php require 'partials/header.php';?>

    <main class="first-time-display-card">
        <div class="container">
            <div class="card-display">
                <div class="content-card-display">
                    <h2>Hey, <?php echo $user_firstName; ?>!</h2>
                    <p>Looks like <span class="emphasize">there are no memories stored</span>,
                        which means no treasures to uncover. </p>
                    <p>Let's change that</p>
                    <button class="button-primary">Record a thought now</button>
                </div>
            </div>
        </div>
    </main>

<?php require 'partials/closing.php'; ?>