<?php
/*
Template Name: Announcement Template
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



<div class=" container announce_page_body">

    <?php

    $announce_arg = array(
        'post_type'         => 'announcemanagement', //supply the custom post type
        'posts_per_page'    => 10, //no# posts per page
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


    if ($announce_search_results->have_posts()) :
        while ($announce_search_results->have_posts()) : $announce_search_results->the_post();
            $getlength_content = strlen(get_the_content());
			$thelength_content = 250;
            $getlength_title = strlen(get_the_title());
			$thelength_title = 120;



    ?>
            <div class="container single_announce border-bottom py-5">
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                        <div class="announce_page_img"><?php the_post_thumbnail(); ?> </div>
                    </div>
                    <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
                        <h1 class="announce_page_title pt-1"><?php echo substr(get_the_title(), 0, $thelength_title);
							if ($getlength_title > $thelength_title) echo "...";
							?></h1>
                        <div class="announce_page_content pt-2"><?php echo substr(get_the_content(), 0, $thelength_content);
                        if ($getlength_content > $thelength_content) echo "...";
                         ?></div>
                        <h3 class="announce_page_date pt-2"><?php echo get_the_date(); ?></h3>
                    </div>
                </div>
            </div>
    <?php
        endwhile;
    endif;
    ?>
</div>

<?php get_footer(); ?>