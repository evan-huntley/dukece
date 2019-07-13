<?php
/*
    Template Name: Digital
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div class="digital">
        <section class="hero">
            <?php 
                $args = array(
                    'post_type'      => array('courses', 'webinars'),
                    'posts_per_page' => -1
                );
                $items = new WP_Query( $args );
            
                if ( $items->have_posts() ) : ?>
                <div class="digital-slider" id="digital-slider" aria-role="presentation">
                    <ul class="slides">
                        <?php while ( $items->have_posts() ) : $items->the_post(); ?>
                            <li class="course" style="background-image: url('<?= get_the_post_thumbnail_url(); ?>');">
                                <div class="details">
                                    <div class="wrap">
                                        <div class="excerpt">
                                            <?php the_excerpt(); ?>
                                        </div>
                                        <?php if ( get_post_type() == 'courses' ) : ?>
                                            <a class="btn" href="<?= types_render_field("digital-course-url", array("raw" => true)); ?>">Begin Course</a>
                                            <a class="btn btn-action" href="<?= get_the_permalink(); ?>">Learn More About Course</a>
                                        <?php else : ?>
                                            <a class="btn" href="<?= types_render_field("digital-webinar-url", array("raw" => true)); ?>">Watch Now</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </li>
                        <?php endwhile; wp_reset_query(); ?>
                    </ul>
                </div>
            <?php endif; ?>          
        </section>

        <section class="digital-courses">
            <div class="wrap">
                <h1>Featured Courses</h1>
                <?php 
                    $args = array(
                        'post_type'      => 'courses',
                        'posts_per_page' => -1
                    );
                    $courses = new WP_Query( $args );
                
                    if ( $courses->have_posts() ) : ?>
                        <?php while ( $courses->have_posts() ) : $courses->the_post(); ?>
                            <article class="course">
        						<a href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail('article'); ?></a>
        						<h2><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h2>
        						<div class="content">
        							<?php the_excerpt(); ?>
        						</div>
                                <a class="btn btn-action" href="<?= get_the_permalink(); ?>">Learn More and Register</a>
        					</article>
                        <?php endwhile; wp_reset_query(); ?>
                <?php endif; ?>          
            </div>
        </section>
        
        <section class="why">
            <div class="wrap">
                <h1>Why Duke Corporate Education</h1>
                <ul>
                    <li>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/i_brain-power.png" />
                        <p>Create projects you’re proud to share.<br />Classes include prompts and resources.</p>
                    </li>
                    <li>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/i_certificate.png" />
                        <p>Share and collaborate with a growing community of over 7 million creators.</p>
                    </li>
                    <li>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/i_computer.png" />
                        <p>Unlock styles and strategies today’s creators need to know.</p>
                    </li>
                </ul>
            </div>
        </section>
        
        <section class="digital-webinars">
            <div class="wrap">
                <h1>Webinars</h1>
                <?php 
                    $args = array(
                        'post_type'      => 'webinars',
                        'posts_per_page' => -1
                    );
                    $webinars = new WP_Query( $args );
                
                    if ( $webinars->have_posts() ) : ?>
                    <div class="webinar-slider" id="webinar-slider" aria-role="presentation">
                        <ul class="slides">
                        <?php while ( $webinars->have_posts() ) : $webinars->the_post(); ?>
                            <li class="webinar">
                                <div class="webinar-image">
        						   <a href="<?= types_render_field("digital-webinar-url", array("raw" => true)); ?>"><?php the_post_thumbnail('highlight'); ?></a>
        						   <h2><?php the_title(); ?></h2>
                                </div>
        						<div class="content">
        							<?php the_excerpt(); ?>
                                    <a class="btn btn-watch" href="<?= types_render_field("digital-webinar-url", array("raw" => true)); ?>">Watch Now</a>
        						</div>
        					</li>
                        <?php endwhile; wp_reset_query(); ?>
                        </ul>
                    </div>
                <?php endif; ?>    
            
                <?php if ( $webinars->have_posts() ) : ?>
                <div class="webinar-slider-nav" id="webinar-slider-nav" aria-role="presentation">
                    <ul class="slides">
                    <?php while ( $webinars->have_posts() ) : $webinars->the_post(); ?>
                        <li class="webinar">
                            <a href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail('article'); ?></a>
                            <h2><?php the_title(); ?></h2>
                        </li>
                    <?php endwhile; wp_reset_query(); ?>
                    </ul>
                </div>
            <?php endif; ?>    
            
            </div>
        </section>
        
        <section class="insights">
            <div class="wrap">
                <h1>Insights</h1>
                <?php 
                    $args = array(
                        'post_type'      => 'insights',
                        'posts_per_page' => 5
                    );
                    $insights = new WP_Query( $args );
                
                    if ( $insights->have_posts() ) : ?>
                        <?php while ( $insights->have_posts() ) : $insights->the_post(); ?>
                            <article class="library-item">
        						<a href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail('article'); ?></a>
        						<h2><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h2>
        						<div class="content">
        							<?php the_excerpt(); ?>
        						</div>
        					</article>
                        <?php endwhile; wp_reset_query(); ?>
                <?php endif; ?>                
            </div>
        </section>
        
        <section class="custom">
            <div class="wrap">
                <a class="btn btn-action" href="/our-work">Customized Programs</a>
                <p>Whether the need is building fundamentals or preparing for the unknown, at Duke Corporate Education, we build solutions grounded in your business context for the challenges you are facing and for the cohorts you are developing. We work with you to craft the right solution so that your leaders—managers, directors, high potentials or executives—acquire not just new knowledge, but also behaviors and mindsets to move the organization in the right direction fast. We’re here to help leaders get ready for what’s next.</p>
            </div>
        </section>
    </div>    
<?php endwhile; ?>
<?php get_footer( 'no-sidebar' ); // will include footer-no-sidebar.php; ?>
