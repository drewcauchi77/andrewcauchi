<?php /* Template Name: Contact Template */

get_header();
$fields = get_fields();

?>
<main class="content">
    <section class="section contact-form-section">
        <div class="container contact-form-container">
            <div class="form-details">
                <h1 class="form-title"><?= $fields['title']; ?></h1>
                <div class="form-description">
                    <p><?= $fields['tagline']; ?></p>
                </div>
                <div class="form-contents">
                    <div class="orange-circle"></div>
                    <div class="black-circle"></div>
                    <div class="form">
                        <?= do_shortcode('[contact-form-7 id="184" title="Contact Form"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();