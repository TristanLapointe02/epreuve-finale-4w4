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
            $avant = 0;
			/* Start the Loop */
            
			while ( have_posts() ) :
				the_post();
                propTableau($prop);

                if ($prop['session'] != $avant): 
					if ($avant != 0): ?>
						</section>
					<?php endif; ?>	
                <?php endif; ?>
					
					<section <?php echo class_composant($prop['session']) ?>>
                    <h2><?php echo $prop['session'] ?></h2>
                    <?php get_template_part( 'template-parts/content', 'liste-cours' ); ?>
                <?php 
                $avant = $prop['session']++;

			endwhile;?>

			</section>

		<?php endif; ?>
		

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
	$prop['typeCours'] = get_field('type_de_cours');
    $prop['session'] = get_field('session');
}

function class_composant($session){

	if ($session == '1'){
		return 'class="cours-1"';
	}
	elseif ($session == '2'){
		return 'class="cours-2"';
	}
    elseif ($session == '3'){
		return 'class="cours-3"';
	}
    elseif ($session == '4'){
		return 'class="cours-4"';
	}
    elseif ($session == '5'){
		return 'class="cours-5"';
	}
    elseif ($session == '6'){
		return 'class="cours-6"';
	}
}
