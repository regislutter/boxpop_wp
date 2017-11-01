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
            <div class="filters">
                <div class="filter-group">
                    <div class="filter-label">
                        Filtres :
                    </div>
                    <div class="filter" data-filter=".with-pop">Avec Pop!</div>
                    <div class="filter" data-filter=".with-figure">Avec figurine</div>
                    <div class="filter" data-filter=".with-exclusives">Avec exclusivités</div>
                    <div class="filter" data-filter=".with-theme">Avec thème</div>
                </div>
                <div class="filter-group">
                    <div class="filter-label">
                        Note :
                    </div>
                    <div class="sort" data-sort="rating:desc">5 étoiles avant</div>
                    <div class="sort" data-sort="rating:asc">1 étoile avant</div>
                    <div class="filter-label">
                        Prix :
                    </div>
                    <div class="sort" data-sort="price:desc">+ cher avant</div>
                    <div class="sort" data-sort="price:asc">- cher avant</div>
                    <div class="filter-label">
                        Pays :
                    </div>
                    <div class="sort" data-sort="country:asc">A vers Z</div>
                    <div class="sort" data-sort="country:desc">Z vers A</div>
                </div>
<!--                <div class="filter" data-filter="all">Show All</div>-->

            </div>
        <table id="list-boxes-shops" width="100%">
            <thead>
                <tr class="persist-table-head">
                    <th width="140px">Box</th>
                    <th>Prix mensuel (livraison incluse)</th>
                    <th width="100px">Pop!</th>
                    <th width="100px">Figurine</th>
                    <th width="100px">Exclusivités</th>
                    <th width="100px">Thème mensuel</th>
                    <th width="100px">Pays</th>
                    <th width="110px">Note</th>
                    <th width="50px">Votes</th>
                    <th width="130px">Site</th>
                    <th width="100px">Fiche détaillée</th>
                </tr>
            </thead>
            <tbody>
        <?php
        $args = array('posts_per_page' => -1, 'post_type' => 'box', 'orderby' => 'rand');
        $query_box = new WP_Query($args);
        if ($query_box->have_posts()) : while ($query_box->have_posts()) : $query_box->the_post();

            echo('<tr class="mix');
            if(get_field('avec_pop', $post->id) == 'Toujours' || get_field('avec_pop', $post->id) == 'Souvent'){
                echo(' with-pop');
            }
            if(get_field('figurine', $post->id) == 'Toujours' || get_field('figurine', $post->id) == 'Souvent'){
                echo(' with-figure');
            }
            if(get_field('produits_exclusifs', $post->id) != 'Jamais'){
                echo(' with-exclusives');
            }
            if(get_field('themes', $post->id) != 'Non'){
                echo(' with-theme');
            }

            // Price total
            $price = 0;
            if(get_field('prix', $post->id)) {
                $price += floatval(str_replace(',','.',get_field('prix', $post->id)));
            }
            if(get_field('cout_de_livraison', $post->id)) {
                $price += floatval(str_replace(',','.',get_field('cout_de_livraison', $post->id)));
            }
            echo('" data-price="'.$price.'" data-rating="'.get_post_meta( $post->ID, 'wp_review_user_reviews', true ).'" data-country="'.get_field('pays', $post->id).'">');

            if ( has_post_thumbnail() ) {
                echo('<td><a href="'.get_post_permalink($post->id).'">');
                the_post_thumbnail('thumbnail');
                echo('</a></td>');
            }else{
                echo('<td><a href="'.get_post_permalink($post->id).'">'.$post->post_title.'</a></td>');
            }

            // Price total
            echo('<td class="center">'.number_format($price, 2).'€</td>');

            echo('<td class="center">');
            if(get_field('avec_pop', $post->id)) {
                switch(get_field('avec_pop', $post->id)){
                    case 'Toujours':
                        echo('<img src="data:image/png;base64,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" title="Inclus toujours une Pop!"/>');
                        break;
                    case 'Jamais':
                        echo('<img src="data:image/png;base64,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" title="Inclus toujours une Pop!"/>');
                        break;
                    default:
                        the_field('avec_pop', $post->id);
                        break;
                }
            }
            echo('</td>');

            echo('<td class="center">');
            if(get_field('figurine', $post->id)) {
                switch(get_field('figurine', $post->id)){
                    case 'Toujours':
                        echo('<img src="data:image/png;base64,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" title="Inclus toujours une Pop!"/>');
                        break;
                    case 'Jamais':
                        echo('<img src="data:image/png;base64,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" title="Inclus toujours une Pop!"/>');
                        break;
                    default:
                        the_field('figurine', $post->id);
                        break;
                }
            }
            echo('</td>');

            echo('<td class="center">');
            if(get_field('produits_exclusifs', $post->id)) {
                switch(get_field('produits_exclusifs', $post->id)){
                    case 'Oui':
                        echo('<img src="data:image/png;base64,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" title="Inclus toujours une Pop!"/>');
                        break;
                    case 'Jamais':
                        echo('<img src="data:image/png;base64,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" title="Inclus toujours une Pop!"/>');
                        break;
                    default:
                        the_field('produits_exclusifs', $post->id);
                        break;
                }
            }
            echo('</td>');

            echo('<td class="center">');
            if(get_field('themes', $post->id)) {
                switch(get_field('themes', $post->id)){
                    case 'Oui':
                        echo('<img src="data:image/png;base64,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" title="Inclus toujours une Pop!"/>');
                        break;
                    case 'Non':
                        echo('<img src="data:image/png;base64,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" title="Inclus toujours une Pop!"/>');
                        break;
                    default:
                        the_field('themes', $post->id);
                        break;
                }
            }
            echo('</td>');

            echo('<td>');
            if(get_field('pays', $post->ID)) {
                the_field('pays', $post->ID);
            }
            echo('</td>');

            echo('<td>');
                echo wp_review_visitor_rating_shortcode(['id'=>$post->ID]);
                $votes = mts_get_post_reviews( $post->ID )['count'];
//                echo($votes.($votes>1?' votes':' vote'));
                

//                var_dump(get_post_meta( $post->ID, 'wp_review_total', true ));
//                var_dump(wp_review_show_total(false, 'review-total-only', $post->id, array())); // Note admin
            echo('</td>');

            echo('<td class="center">'.$votes.'</td>');

            echo('<td class="center">');
            if(get_field('website', $post->id)) {
                echo('<span class="cb-button cb-pink cb-normal cb-center btn-buy-orange"><a href="'.get_field('website', $post->id).'" target="_blank" rel="nofollow">Acheter</a></span>');
            }
            if(get_field('offre', $post->ID)) {
                the_field('offre', $post->ID);
            }
            echo('</td>');

            echo('<td>');
            echo('<span class="cb-button cb-pink cb-normal cb-center btn-buy-orange"><a href="'.get_post_permalink($post->id).'" rel="nofollow">Voir</a></span>');
            echo('</td>');

            echo('</tr>'); endwhile; endif; ?>
            </tbody>
        </table></div>

        <!-- Reset custom query
        <?php wp_reset_postdata(); ?>

        </div> <!-- end #main -->

    </div> <!-- end #cb-content -->

<?php get_footer(); ?>
