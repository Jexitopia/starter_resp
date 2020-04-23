<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <input type="text" name="s" id="search" placeholder="Type to search..." class="searchbar" value="<?php the_search_query(); ?>" />        
</form> 
<button id="searchButton" onclick="toggleSearch()"><i class="fas fa-search"></i></button>  