<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nounowstarter
 */

?>
<?php if (is_search()) {
    echo '<h2 class="search-result"> 검색 결과가 없습니다. </h2>';
} else {
    echo '<h2 class="no-content"> 컨텐츠가 없읍니다. </h2>';
}
?>
