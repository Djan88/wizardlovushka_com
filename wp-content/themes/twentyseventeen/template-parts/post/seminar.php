<?php
/**
 * Template part for displaying seminars
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>
<?php
$date_seminar = get_field('seminar_start');
$date_formated = strtotime($date_seminar);
$seminar_d = date('d',$date_formated);
$seminar_m = date('m',$date_formated);
echo '<div class="wrap">';
echo '<div class="title">';
echo the_title();
echo '</div>';
echo '<div class="content">';
echo $seminar_d;
echo ' / ';
echo $seminar_m;
echo '</div>';
echo '</div>';
?>