<?php
/*
    Template Name: Home Page
*/

    $block_1_title = types_render_field('block-1-title', array('raw' => true));
    $block_1_url = types_render_field('block-1-url', array('raw' => true));
    $block_1_image = types_render_field('block-1-image', array('raw' => true));

    $block_2_title = types_render_field('block-2-title', array('raw' => true));
    $block_2_url = types_render_field('block-2-url', array('raw' => true));
    $block_2_image = types_render_field('block-2-image', array('raw' => true));

    $block_3_title = types_render_field('block-3-title', array('raw' => true));
    $block_3_url = types_render_field('block-3-url', array('raw' => true));
    $block_3_image = types_render_field('block-3-image', array('raw' => true));

    $dialogue_content = types_render_field('dialogue-content', array('raw' => false));
?>

<?php get_header(); ?>
<div class="features">
    <ul class="stories">
        <li>
            <a class="title" href="<?php echo $block_1_url; ?>"><?php echo $block_1_title; ?></a>
            <img src="<?php echo $block_1_image; ?>" />
        </li>
        <li>
            <a class="title" href="<?php echo $block_2_url; ?>"><?php echo $block_2_title; ?></a>
            <img src="<?php echo $block_2_image; ?>" />
        </li>
        <li>
            <a class="title" href="<?php echo $block_3_url; ?>"><?php echo $block_3_title; ?></a>
            <img src="<?php echo $block_3_image; ?>" />
        </li>
    </ul>
    <div class="dialogue">
        <div class="header">
            <h2>Duke CE Leadership Insights</h2>
            <a class="btn" href="#">Subscribe</a>
        </div>
        <div class="dialogue-content">
            <?php echo $dialogue_content; ?>
        </div>
    </div>
    <div class="ft-block">
        <p><img src="<?php echo bloginfo('template_directory'); ?>/assets/img/l_financial-times.jpg" alt="Financial Times Logo" /> Ranked among the top 3 in custom executive education globally for 15 consecutive years</p>
    </div>
    <div class="social">
        <h3>Connect with Duke CE</h3>
        <ul>
            <li><a href="https://www.linkedin.com/companies/20660"><img src="<?php echo bloginfo('template_directory'); ?>/assets/img/i_linkedin.jpg" alt="LinkedIn" /></a></li>
            <li><a href="http://www.facebook.com/pages/Duke-Corporate-Education/135647923775"><img src="<?php echo bloginfo('template_directory'); ?>/assets/img/i_facebook.jpg" alt="Facebook" /></a></li>
            <li><a href="https://twitter.com/DukeCorpEd"><img src="<?php echo bloginfo('template_directory'); ?>/assets/img/i_twitter.jpg" alt="Twitter" /></a></li>
            <li><a href="https://instagram.com/dukecorporateeducation/"><img src="<?php echo bloginfo('template_directory'); ?>/assets/img/i_instagram.jpg" alt="Instagram" /></a></li>
            <li><a href="https://www.youtube.com/user/DukeCorpEd"><img src="<?php echo bloginfo('template_directory'); ?>/assets/img/i_youtube.jpg" alt="Youtube" /></a></li>
            <li><a href="<?php echo get_site_url(); ?>/index.php/contact"><img src="<?php echo bloginfo('template_directory'); ?>/assets/img/i_email.jpg" alt="Email" /></a></li>
        </ul>
    </div>
</div>
<div class="locations">
    <ul>
        <li>
            <div class="location-name">Ahmedabad, IN</div>
            <div class="phone">+91 79 6621 3100</div>
            <a href="<?php echo get_site_url(); ?>/index.php/contact">Contact</a>
        </li>
        <li>
            <div class="location-name">Carlsbad, CA USA</div>
            <div class="phone">+1 760 710 2444</div>
            <a href="<?php echo get_site_url(); ?>/index.php/contact">Contact</a>
        </li>
        <li>
            <div class="location-name">Durham, NC USA</div>
            <div class="phone">+1 919 680 5000</div>
            <a href="<?php echo get_site_url(); ?>/index.php/contact">Contact</a>
        </li>
        <li>
            <div class="location-name">Johannesburg, ZA</div>
            <div class="phone">+27 (0)11 575 6241</div>
            <a href="<?php echo get_site_url(); ?>/index.php/contact">Contact</a>
        </li>
        <li>
            <div class="location-name">London, UK</div>
            <div class="phone">+44 (0)20 7936 6100</div>
            <a href="<?php echo get_site_url(); ?>/index.php/contact">Contact</a>
        </li>
        <li>
            <div class="location-name">Singapore, SG</div>
            <div class="phone">+65 6701 5300</div>
            <a href="<?php echo get_site_url(); ?>/index.php/contact">Contact</a>
        </li>
    </ul>
</div>

<?php get_footer(); // will include footer-no-sidebar.php; ?>
