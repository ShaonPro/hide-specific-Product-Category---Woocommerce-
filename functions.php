add_filter('get_terms', 'exclude_single_category_from_shop', 10, 3);

function exclude_single_category_from_shop($terms, $taxonomies, $args) {
    if (in_array('product_cat', $taxonomies) && !is_admin() && is_shop()) {
        $exclude_category = 'product-categroy-URL/slug'; // Replace with the actual slug of your category
        $terms = array_filter($terms, function ($term) use ($exclude_category) {
            return $term->slug !== $exclude_category;
        });
    }

    return $terms;
}
