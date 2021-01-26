<?php /* Template Name: Homepage Template */

get_header();
$fields = get_fields();
//var_dump($fields);
?>

<?php if($fields['introduction_section']['show_section'] == true){ ?>
    <section class="section introduction-section">
        <div class="container introduction-container">
            <div class="intro-details">
                <h2 class="intro-tagline"><?= $fields['introduction_section']['tagline']; ?></h2>
                <h1 class="intro-title"><?= $fields['introduction_section']['title']; ?></h1>
            </div>
            <div class="portfolio-image">
                <img src="<?= $fields['introduction_section']['main_image']['url']; ?>" alt="<?= $fields['introduction_section']['main_image']['alt']; ?>">
            </div>
            <div class="buttons-section">
                <?php foreach($fields['introduction_section']['buttons'] as $button){ ?>
                    <div class="button">
                        <a href="<?= $button['button_link']; ?>">
                            <?= $button['button_name']; ?>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>

<?php
get_footer();