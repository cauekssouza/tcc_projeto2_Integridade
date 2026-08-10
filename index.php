<?php

declare(strict_types=1);

define('TITLE', 'Verify Email');

require_once '../assets/layouts/header.php';

check_logged_in_butnot_verified();

$verificationMessage = $_SESSION['STATUS']['verify'] ?? '';

?>

<main class="container" role="main">
    <div class="row align-items-center">

        <aside class="col-sm-3">
            <?php require '../assets/layouts/profile-card.php'; ?>
        </aside>

        <section class="col-sm-7 mx-sm-5 my-5 px-5 py-4 bg-light rounded shadow-lg verify-message">
            <form action="includes/sendverificationemail.inc.php" method="post">
                <?php insert_csrf_token(); ?>

                <h1 class="h5 text-center mb-5 text-primary">
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

                <?php if ($verificationMessage !== ''): ?>
                    <div class="text-center mt-5">
                        <p class="text-success mb-0" role="status">
                            <?= htmlspecialchars(
                                $verificationMessage,
                                ENT_QUOTES,
                                'UTF-8'
                            ); ?>
                        </p>
                    </div>
                <?php endif; ?>
            </form>
        </section>

    </div>
</main>

<?php require_once '../assets/layouts/footer.php'; ?>
