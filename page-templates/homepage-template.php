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
                <img class="portfolio-image" src="<?= $fields['introduction_section']['main_image']['url']; ?>" alt="<?= $fields['introduction_section']['main_image']['alt']; ?>">
                <div class="buttons-section">
                    <?php foreach($fields['introduction_section']['buttons'] as $button){ ?>
                        <div class="button <?= ($button['orange_button'] == true) ? 'orange-button' : '' ?>">
                            <a href="<?= $button['button_link']; ?>">
                                <?= $button['button_name']; ?>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php if($fields['about_section']['show_section'] == true){ ?>
    <section class="section about-section" id="about">
        <div class="container about-container">
            <div class="about-details">
                <h2 class="about-title"><?= $fields['about_section']['title']; ?></h2>
                <img src="<?= get_template_directory_uri(); ?>/imgs/about-section.svg" class="title-design">
                <div class="about-description"><?php echo $fields['about_section']['tagline']; ?></div>
                <div class="roles-section">
                    <?php foreach($fields['about_section']['roles'] as $role){ ?>
                        <div class="role">
                            <div class="role-icon">
                                <img src="<?= $role['icon']['url']?>" alt="<?= $role['icon']['alt']?>">
                            </div>
                            <h3 class="role-title"><?= $role['title']; ?></h3>
                            <div class="role-description">
                                <?= $role['tagline']; ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php if($fields['experience_section']['show_section'] == true){ ?>
    <section class="section experience-section" id="experience">
        <div class="container experience-container">
            <div class="experience-details">
                <div class="title-section">
                    <div class="title-design"></div>
                    <h2 class="experience-title"><?= $fields['experience_section']['title']; ?></h2>
                </div>
                <div class="experience-description"><?php echo $fields['experience_section']['tagline']; ?></div>
                <div class="languages-section">
                    <?php foreach($fields['experience_section']['languages'] as $language){ ?>
                        <div class="language">
                            <div class="language-icon" style="background-color:#<?= $language['background_colour']; ?>30;">
                                <img src="<?= $language['icon']['url']?>" alt="<?= $language['icon']['alt']?>">
                            </div>
                            <span class="language-percentage"><?= $language['percentage']; ?>%</span>
                            <h3 class="language-title"><?= $language['title']; ?></h3>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php if($fields['recent_work_section']['show_section'] == true){ ?>
    <section class="section projects-section" id="projects">
        <div class="container projects-container">
            <div class="projects-details">
                <div class="title-section">
                    <div class="title-design"></div>
                    <h2 class="projects-title"><?= $fields['recent_work_section']['title']; ?></h2>
                </div>
                <div class="projects-description"><?php echo $fields['recent_work_section']['tagline']; ?></div>
                <div class="work-section">
                    <?php foreach($fields['recent_work_section']['projects'] as $project){ ?>
                        <div class="project">
                            <?php 
                            $projectFields = get_fields($project['post']->ID);
                            $projectFeaturedImage = wp_get_attachment_url(get_post_thumbnail_id($project['post']->ID));
                            ?>
                            <div class="project-images" style="background: url('<?= $projectFeaturedImage; ?>');">
                                <a href="<?= $projectFields['website_link']; ?>" target="_blank">
                                    <img class="project-logo" src="<?= $projectFields['website_logo']['url']; ?>" alt="<?= $projectFields['website_logo']['alt']; ?>">
                                </a>
                            </div>
                            <div class="project-description">
                                <span class="description-text"><?= $project['post']->post_content; ?></span>
                            </div>
                            <div class="project-link">
                                <a href="<?= $projectFields['website_link']; ?>" target="_blank">
                                    Visit Website
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php
get_footer();