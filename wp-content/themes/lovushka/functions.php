<?php
function users_redirect(){
wp_redirect(site_url('/'));
die();
}
if(!current_user_can('manage_options')){
add_action('admin_init','users_redirect');
add_filter('login_redirect', 'users_redirect');
}

/* Отключаем админ панель для всех, кроме администраторов. */
if (!current_user_can('administrator')):
  show_admin_bar(false);
endif;

?>
