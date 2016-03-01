<?php 
/*
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
        <input type="text" class="search-field"
            placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    </label>
    <input type="submit" class="search-submit"
        value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
</form>
*/
?>

<form class="usa-search usa-search-small" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<div role="search">
		<label class="usa-sr-only" for="search-field-small">Search big</label>
		<input type="search" class="search-field"
			id="search-field-small" 
			placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
			value="<?php echo get_search_query() ?>" 
			name="s"
			title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
		<button type="submit">
			<span class="usa-sr-only">Search</span>
		</button>
	</div>
</form>
