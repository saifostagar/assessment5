<?php
/*
Template Name: Job Template
@Author: Mr. Saif
@CreatedOn: 27th Sep, 2022
*/

get_header();

?>

<div class="header_banner">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="page_title"><?php the_title(); ?></h1>
            </div>
            <div class="col-4 float-right banner-img">
                <?php the_post_thumbnail(); ?>
            </div>
        </div>
    </div>

</div>

<div class="container job_page_body">

<?php

$jobs_arg = array(
    'post_type'         => 'jobsmanagement', //supply the custom post type
    'posts_per_page'    => 4, //no# posts per page
    'order'             => 'DESC', //order the results 
    // meta query -- search with taxonomy
    // 'tax_query' => array(
    //     array(
    //         'taxonomy' => 'jobs-category',
    //         'field'    => 'slug',
    //         'terms' => 'hr-jobs	'
    //     )
    // )
);

$announce_search_results = new WP_Query($announce_arg);


$jobs_search_results = new WP_Query($jobs_arg);
if ($jobs_search_results->have_posts()) :
    while ($jobs_search_results->have_posts()) : $jobs_search_results->the_post();
        $job_location = get_field('jobsmanagement_location');
        $job_org= get_field('jobsmanagement_organization');

?>
        <div class="container single_job border-bottom py-4 pb-20">
            <div class="row">

                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="container job_item_left">
                        <div class="row ">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <h1 class="job_page_title"><?php the_title(); ?></h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <h3 class="job_page_org"><?php echo $job_org; ?></h3>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <h3 class="job_page_location"><?php echo $job_location; ?></h3>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6 job_details_section">
                    <a class="job_details" href="<?php echo the_permalink(); ?>">View Details</a>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6 job_apply_section">
                    <a class="job_apply" href="<?php echo the_permalink(); ?>">Apply Now</a>
                </div>

            </div>
        </div>

<?php
    endwhile;
    
endif;
?>
</div>

<?php get_footer(); ?>