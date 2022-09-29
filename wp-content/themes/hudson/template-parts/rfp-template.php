<?php
/*
Template Name: RFP Template
@Author: Mr. Saif
@CreatedOn: 18th Sep, 2022
*/

get_header();
// get the rfp post type

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


<?php


$rfp_arg = array(
    'post_type'         => 'rfpmanagement', //supply the custom post type
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



$rfp_search_results = new WP_Query($rfp_arg);

if ($rfp_search_results->have_posts()) :
    while ($rfp_search_results->have_posts()) : $rfp_search_results->the_post();
        $rfp_status = get_field('rfp_status');
        $rfp_due_date = get_field('rfp_due_date');
        $rfp_performance = get_field('rfp_performance');
        $rfp_agency = get_field('rfp_agency');
        $rfp_type = get_field('rfp_commodity');
        $rfp_contact = get_field('rfp_contact');
        $rfp_conference = get_field('rfp_conference');
        $rfp_questions = get_field('rfp_questions');
        $rfp_other = get_field('rfp_other');
        $rfp_issued_date = get_field('rfp_issued_date');
        $rfp_title = get_the_title();
        $file = get_field('rfp_download');
        $filename = $file['filename'];
        $fileurl = $file['url'];
        $diff_day = strtotime($rfp_due_date) - time();


?>

        <div class="container rfp_container site_font_family body">


            <div class="row rfp_header">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <h1 class="rfp_post_title"><?php echo $rfp_title; ?></h1>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 border-bottom rfp_post_content">
                    <?php the_content(); ?>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 pt-4">
                    <h3 class="rfp_para"><?php echo $rfp_title . ' : ' . $rfp_status; ?></h3>
                    <div>
                        <p><?php if ($diff_day > 0) {
                                echo "Due in " . round($diff_day / (60 * 60 * 24));
                            } else {
                                echo "Delayed by " . abs(round($diff_day / (60 * 60 * 24)));
                            }
                            ?> Days</p>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 pt-4">
                    <h3 class="rfp_para">Date Issued</h3>
                    <div>
                        <p> <?php echo $rfp_issued_date; ?> </p>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 pt-4">
                    <h3 class="rfp_para">Due : Date - Time</h3>
                    <div>
                        <p><?php echo $rfp_due_date; ?></p>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 pt-4">
                    <h3 class="rfp_para">Performance Period</h3>
                    <div>
                        <p><?php echo $rfp_performance; ?></p>
                    </div>
                </div>

            </div>

            <div class="rfp_content">
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 pb-3">
                        <h3 class="rfp_para">Requesting Agency</h3>
                        <p> <?php echo $rfp_agency; ?> </p>

                    </div>
                    <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 pb-3">
                        <h3 class="rfp_para">Commodity Type</h3>
                        <p><?php echo $rfp_type; ?></p>

                    </div>


                </div>


                <div class="row">
                    <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 pb-3">
                        <h3 class="rfp_para">Purchasing Contact</h3>
                        <p><?php echo $rfp_contact; ?></p>
                    </div>
                    <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 pb-3">
                        <h3 class="rfp_para">Proposer’s Conference</h3>
                        <p><?php echo $rfp_conference; ?></p>

                    </div>


                </div>
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 pb-3">
                        <h3 class="rfp_para">Questions</h3>
                        <p><?php echo $rfp_questions; ?></p>

                    </div>
                    <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 pb-3">
                        <h3 class="rfp_para">Other Instructions</h3>
                        <p><?php echo $rfp_other ?></p>

                    </div>


                </div>

            </div>



            <div class="row rfp_footer">
                <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                    <h3 class="rfp_para rfp_file_name"><img src="<?php bloginfo('template_url') ?>/assets/img/ic-email.png" class="file_logo" alt="Logo"><?php echo $filename ?></h3>
                </div>
                <div class="col-md-4 ol-lg-4"></div>
                <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 download_section">
                    <a class="download_button" href="<?php echo $fileurl; ?>"><img src="<?php bloginfo('template_url') ?>/assets/img/ic-download.png" class="download_logo" alt="Logo">Download Now</a>
                </div>
            </div>
        </div>
<?php
    endwhile;
endif;
?>



<?php
if (have_posts()) {

    while (have_posts()) {
        the_post();
        the_content();
    }
} ?>


<?php get_footer(); ?>