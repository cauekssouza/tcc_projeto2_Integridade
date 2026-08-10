<?php

define('TITLE', 'Verify Email');

require_once '../assets/layouts/header.php';

check_logged_in_butnot_verified();

$statusMessage = $_SESSION['STATUS']['verify'] ?? '';

?>

<main class="container" role="main">
    <div class="row">

        <aside class="col-sm-3">
            <?php require '../assets/layouts/profile-card.php'; ?>
        </aside>

        <section
            class="col-sm-7 m-5 px-5 align-self-center bg-light rounded shadow-lg box-shadow verify-message"
            aria-labelledby="verify-email-title"
        >
            <form action="includes/sendverificationemail.inc.php" method="post">

                <?php insert_csrf_token(); ?>

                <h1
                    id="verify-email-title"
                    class="h5 text-center text-primary mb-5"
                >
                    Verify Your Email Address
                </h1>

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

                <?php if ($statusMessage !== ''): ?>
                    <div class="text-center mt-5">
                        <p class="text-success mb-0">
                            <?= htmlspecialchars($statusMessage, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                    </div>
                <?php endif; ?>

            </form>
        </section>

    </div>
</main>

<?php require_once '../assets/layouts/footer.php'; ?>
