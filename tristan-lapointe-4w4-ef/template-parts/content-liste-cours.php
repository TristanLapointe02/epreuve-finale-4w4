<?php
/**
 * Template part l'affichage des bloc de cours dans front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme4w4
 */
global $prop;
?>

<article>
    
	<p class="typeDeCours"><?php echo $prop['typeCours']?></p>
	<a href="<?php echo get_permalink() ?>" ><?php echo $prop['sigle']; ?></a>
	<p class="nbHeure"><?php echo $prop['nbHeure'] ?></p>
</article>
