<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
global $InputField2;
global $InputField3;
$stylex = 'style="'.$InputField2.'"';


if (isset($InputField2) && $InputField2 !=''){
	$InputField2=$InputField2;
} 
else{
	$InputField2='';
}



if (isset($InputField3) && $InputField3 > 0 && is_numeric($InputField3)){
	$numx=$InputField3;
} 
else{
	$numx=5;
}


// query all the posts
$queryposts = new WP_Query(array('post_type'=>'post','posts_per_page' => $numx,)); ?>


<?php if ( $queryposts->have_posts() ) : ?>

<ul>
<!-- start the loop -->
<?php while ( $queryposts->have_posts() ) : $queryposts->the_post(); ?>
<li><a href="<?php the_permalink(); ?>" <?php if ($InputField2 !== '' && $stylex !== NULL) {echo $stylex;}?>><?php the_title(); ?></a></li>
<?php endwhile; ?>
<!-- end of the loop -->
</ul>

<!-- reset postdata -->
<?php wp_reset_postdata(); ?>

<?php else : ?>
<!-- output if there are no posts -->
<p><?php _e( 'There are no posts yet.' ); ?></p>
<?php endif; ?>


