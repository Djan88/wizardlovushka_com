<?php
function users_redirect(){
wp_redirect(site_url('/'));
die();
}
if(!current_user_can('manage_options')){
add_action('admin_init','users_redirect');
add_filter('login_redirect', 'users_redirect');
}
?>
