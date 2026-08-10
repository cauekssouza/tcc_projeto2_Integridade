<?php

declare(strict_types=1);

define('TITLE', 'Verify Email');

require_once '../assets/layouts/header.php';

check_logged_in_butnot_verified();

/**
 * Escapa conteúdo para saída segura em HTML.
 */
function e(string $value): string
{
    return htmlspecialchars(
        $value,
        ENT_QUOTES | ENT_SUBSTITUTE,
        'UTF-8'
    );
}

/*
 * Obtém a mensagem da sessão e remove-a imediatamente,
 * funcionando como uma "flash message".
 */
$verifyMessage = '';

if (
    isset($_SESSION['STATUS']['verify']) &&
    is_string($_SESSION['STATUS']['verify'])
) {
    $verifyMessage = $_SESSION['STATUS']['verify'];
    unset($_SESSION['STATUS']['verify']);
}

?>

<main role="main" class="container">
    <div class="row">

        <div class="col-sm-3">
            <?php require '../assets/layouts/profile-card.php'; ?>
        </div>

        <div
            class="shadow-lg box-shadow col-sm-7 px-5 m-5 bg-light rounded
                   align-self-center verify-message"
        >
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
                    Before proceeding, please check your email for a verification
                    link. If you did not receive the email,

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
                            <?= e($verifyMessage) ?>
                        </h6>
                    </div>
                <?php endif; ?>
            </form>
        </div>

    </div>
</main>

<?php

require_once '../assets/layouts/footer.php';
