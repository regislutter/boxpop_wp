<?php
/**
 * Template Name: Box List
 * Created by PhpStorm.
 * User: rlutter
 * Date: 16-05-27
 * Time: 13:17
 */

        get_header();
        $cb_page_id = get_the_ID();
        $cb_page_base_color = get_post_meta($cb_page_id , 'cb_overall_color_post', true );
        $cb_page_featured_style = get_post_meta( $cb_page_id, 'cb_page_featured_style', true );
        $cb_page_comments = get_post_meta( $cb_page_id, 'cb_page_comments', true );
        $cb_page_title = get_post_meta( $cb_page_id, 'cb_page_title', true );

        if ( ( $cb_page_base_color == '#' ) || ( $cb_page_base_color == NULL ) ) {
            $cb_page_base_color = ot_get_option('cb_base_color', '#eb9812');
        }

        if ( ( class_exists('Woocommerce') ) && ( ( is_cart() == true ) || ( is_checkout() == true ) || ( is_order_received_page() == true ) || ( is_account_page() == true ) ) ) {
            $cb_page_base_color = ot_get_option('cb_woocommerce_global_color', '#eb9812');
        }

        if ( ( $cb_page_featured_style == NULL ) || ( $cb_page_featured_style == '4' ) || ( $cb_page_featured_style == '5' ) ) {
            echo cb_featured_image( $post, 'page' );
        }
?>
    <div id="cb-content" class="wrap clearfix">
        <?php if ( $cb_page_title != 'off' ) { ?>
            <div class="cb-cat-header" style="border-bottom-color:<?php echo $cb_page_base_color; ?>;">
                <h1 id="cb-cat-title" ><?php echo the_title(); ?></h1>
            </div>
        <?php } ?>

        <?php echo cb_breadcrumbs(); ?>

        <div class="table-container">
        <table width="100%">
            <tr>
                <th>Box</th>
                <th>Prix mensuel</th>
                <th>Coût de livraison</th>
                <th>Frais de douane</th>
                <th>Pop!</th>
                <th>Exclusivités</th>
                <th>Thème mensuel</th>
                <th>Pays</th>
                <th>Note</th>
                <th>Site</th>
            </tr>
        <?php
        $args = array('post_type' => 'box');
        $query_box = new WP_Query($args);
        if ($query_box->have_posts()) : while ($query_box->have_posts()) : $query_box->the_post();

            echo('<tr>');

            if ( has_post_thumbnail() ) {
                echo('<td><a href="'.get_post_permalink($post->id).'">');
                the_post_thumbnail();
                echo('</a></td>');
            }else{
                echo('<td><a href="'.get_post_permalink($post->id).'">'.$post->post_title.'</a></td>');
            }

            echo('<td>');
            if(get_field('prix', $post->id)) {
                the_field('prix', $post->id);
            }
            echo('</td>');

            echo('<td>');
            if(get_field('cout_de_livraison', $post->id)) {
                the_field('cout_de_livraison', $post->id);
            }
            echo('</td>');

            echo('<td>');
            if(get_field('frais_de_douane', $post->id)) {
                the_field('frais_de_douane', $post->id);
            }
            echo('</td>');

            echo('<td>');
            if(get_field('avec_pop', $post->id)) {
                the_field('avec_pop', $post->id);
            }
            echo('</td>');

            echo('<td>');
            if(get_field('produits_exclusifs', $post->id)) {
                the_field('produits_exclusifs', $post->id);
            }
            echo('</td>');

            echo('<td>');
            if(get_field('themes', $post->id)) {
                the_field('themes', $post->id);
            }
            echo('</td>');

            echo('<td>');
            if(get_field('pays', $post->id)) {
                the_field('pays', $post->id);
            }
            echo('</td>');

            echo('<td>');
            if(get_field('note', $post->id)) {
                the_field('note', $post->id);
            }
            echo('</td>');

            echo('<td>');
            if(get_field('website', $post->id)) {
                echo('<span class="cb-button cb-pink cb-normal cb-center btn-buy-orange"><a href="'.get_field('website', $post->id).'" target="_blank" rel="nofollow">Acheter</a></span>');
            }
            echo('</td>');

            echo('</tr>'); endwhile; endif; ?>
        </table></div>

        <!-- Reset custom query
        <?php wp_reset_postdata(); ?>

        </div> <!-- end #main -->

    </div> <!-- end #cb-content -->

<?php get_footer(); ?>