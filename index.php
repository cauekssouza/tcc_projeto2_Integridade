<?php

define('TITLE', 'Verify Email');

include '../assets/layouts/header.php';

check_logged_in_butnot_verified();

$verifyMessage = $_SESSION['STATUS']['verify'] ?? '';

?>

<main class="container">
    <div class="row">
        <aside class="col-sm-3">
            <?php include '../assets/layouts/profile-card.php'; ?>
        </aside>

        <section class="col-sm-7 m-5 px-5 bg-light rounded shadow-lg align-self-center verify-message">
            <form action="includes/sendverificationemail.inc.php" method="post">
                <?php insert_csrf_token(); ?>

                <h5 class="mb-5 text-center text-primary">
                    Verify Your Email Address
                </h5>

                <p>
                    Before proceeding, please check your email for a verification link.
                    If you did not receive the email,
                    <button
                        type="submit"
                        name="verifysubmit"
                        class="btn btn-link p-0 align-baseline"
                    >
                        click here to send another
                    </button>.
                </p>

                <?php if ($verifyMessage !== ''): ?>
                    <div class="mt-5 text-center">
                        <p class="text-success mb-0">
                            <?= htmlspecialchars($verifyMessage, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                    </div>
                <?php endif; ?>
            </form>
        </section>
    </div>
</main>

<?php include '../assets/layouts/footer.php'; ?>
