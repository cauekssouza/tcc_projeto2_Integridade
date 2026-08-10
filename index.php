<?php

define('TITLE', 'Verify Email');

include '../assets/layouts/header.php';

check_logged_in_butnot_verified();

// Recupera a mensagem da sessão com segurança.
$verifyMessage = '';

if (
    isset($_SESSION['STATUS']['verify']) &&
    is_string($_SESSION['STATUS']['verify'])
) {
    $verifyMessage = $_SESSION['STATUS']['verify'];

    // Flash message: remove após ser recuperada.
    unset($_SESSION['STATUS']['verify']);
}

?>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-3">
            <?php include '../assets/layouts/profile-card.php'; ?>
        </div>

        <div class="shadow-lg box-shadow col-sm-7 px-5 m-5 bg-light rounded align-self-center verify-message">

            <form
                action="includes/sendverificationemail.inc.php"
                method="post"
                autocomplete="off"
            >

                <?php insert_csrf_token(); ?>

                <h5 class="text-center mb-5 text-primary">
                    Verify Your Email Address
                </h5>

                <p>
                    Before proceeding, please check your email for a verification link.
                    If you did not receive the email,

                    <button
                        type="submit"
                        name="verifysubmit"
                        value="1"
                        class="btn btn-link p-0 align-baseline"
                    >
                        click here to send another
                    </button>.
                </p>

                <?php if ($verifyMessage !== ''): ?>

                    <div class="text-center mt-5">
                        <h6 class="text-success">
                            <?= htmlspecialchars(
                                $verifyMessage,
                                ENT_QUOTES | ENT_SUBSTITUTE,
                                'UTF-8'
                            ); ?>
                        </h6>
                    </div>

                <?php endif; ?>

            </form>

        </div>

    </div>

</main>

<?php include '../assets/layouts/footer.php'; ?>
