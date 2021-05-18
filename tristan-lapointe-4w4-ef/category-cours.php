<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme4w4
 */
 
get_header();
?>

<!-- $tPropriété['typeCours'] = get_field('type_de_cours'); -->


	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
	
				<?php
				// echo (is_category('Projets')? '### oui projets ###': '### non ###');
				// the_archive_title( '<h1 class="page-title">', '</h1>' );
				echo '<h1 class="page-title">' . single_cat_title( '', false ) . '</h1>';
				the_archive_description( '<div class="archive-description">', '</div>' );
		
				?>	
			
			</header><!-- .page-header -->
			<section class="liste-cours">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
                propTableau($prop);
				get_template_part( 'template-parts/content', 'liste-cours' );

			endwhile;?>

			</section>

		<?php endif; ?>
		?>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();

function propTableau(&$prop)
{
	/*
	$titre = get_the_title(); 
	// 582-1W1 Mise en page Web (75h)
	$sigle = substr($titre, 0, 7);
	$nbHeure = substr($titre,-4,3);
	$titrePartiel =substr($titre,8,-6);
	$session = substr($titre, 4,1);
	// $contenu = get_the_content();
	// $resume = substr($contenu, 0, 200);
	$typeCours = get_field('type_de_cours');
	!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
*/

	$prop['titre'] = get_the_title(); 
	$prop['sigle'] = substr($prop['titre'], 0, 7);
	$prop['nbHeure'] = substr($prop['titre'],-6,6);
	$prop['titrePartiel'] = substr($prop['titre'],8,-6);
	$prop['session'] = substr($prop['titre'], 4,1);
	$prop['typeCours'] = get_field('type_de_cours');
}
