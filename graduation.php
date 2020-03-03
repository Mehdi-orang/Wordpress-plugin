<?php
/**
 * @package graduation
 * @version 1.0.0
 */
/*
Plugin Name: Graduation Management
Plugin URI: http://www.cti.my
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of a hardworking team.
Author: Mehdi Orang Pour
Version: 1.0.0
*/

require_once('include/view.php');
class Graduation{

    static function activate(){
        // global $wpdb;
        // $charset_collate = $wpdb->get_charset_collate();
        // $table_graduation = $wpdb->prefix ."graduation";
        // $query = $wpdb->get_var( "SHOW TABLES LIKE '$table_graduation'");
        // if($query!=$table_graduation){
        //     $sql = "CREATE TABLE $table_graduation(
        //         id mediumint(9) NOT NULL AUTO_INCREMENT,
        //         date datetime DEFAULT NULL,
        //         service varchar(50) DEFAULT NULL,
        //         available tinyint(4) DEFAULT 1,
        //         PRIMARY KEY (id),
        //         UNIQUE KEY id (id)
        //        ) $charset_collate;";
        //        $wpdb->query($sql);
        // }
        //         $wpdb->insert(
        //             $table_graduation,
        //             array(
        //             'service'=> 'seat',
        //             'available' => 1 ,
        //             'date' => current_time( 'mysql' ),
        //             )
        //     );
        }
        static function deactivate(){
            // global $wpdb;
            // $wpdb->update( 
            //             $wpdb->prefix.'graduation', 
            //             array( 
            //                 'available' => 0
            //             ), 
            //             array( 'id' => 1), 
            //             array( 
            //                 '%d'	
                            
            //             ), 
            //             array( '%d' ) 
            //         );
         
    }

    static function uninstall(){
        // global $wpdb;
        // $table_graduation = $wpdb->prefix ."graduation";
        // $sql="DROP TABLE ".$table_graduation;
        // $wpdb->query($sql); 
    }
     
   
}



register_activation_hook(__FILE__,array('Graduation', 'activate'));
register_deactivation_hook(__FILE__,array('Graduation', 'deactivate'));
####### if you want this hook work you shouldn't have uninstall.php file in your plugin########
register_uninstall_hook(__FILE__,array('Graduation','uninstall'));


###### API Class with static classes to fetch spesefic data########
###################################################################
class GAPU{
    public static  function greeting(){
        echo 'welcome to Graduation cermony 2020';
    }
}

######### Define a function within proper do action and add it to header with add_action('wp_head',) #######
add_action( 'wp_head','send_to_theme');  // it will not run on dashboard
// add_action( 'init', 'send_to_theme' ); // it will run everywhere even dashboard
function send_to_theme(){
    do_action('wpdocs_i_am_hook');
}

################ Create user #############################
// add_action( 'init','create_my_user'); 
// function create_my_user(){
//     $username = 'mamal2';
//     $email = 'mamalia@example.com';
//     $password = 'mamali24';
//     $user_id = wp_create_user( $username, $password, $email );
// }


######## Define the menue and submenue ##########
function graduation_admin_menu(){
	add_menu_page('APU Graduation','APU Graduation', 'manage_options','apu_graduation_menu','main_graduation_menu','dashicons-welcome-learn-more',1000);
}
add_action('admin_menu','graduation_admin_menu');



################ Define shortcode with attributes #####################
function wpdocs_bartag_func( $atts ) {

    $atts = shortcode_atts(
        array(
            'form' => '',
            'entry'=>'',
        ), $atts, 'mehdiForm' );
       
        if(empty($atts['form'])){
            return $atts['entry'];
        }elseif(empty($atts['entry'])){
           return $atts['form'];
        }else{
            return;
        }
}
add_shortcode( 'mehdiForm', 'wpdocs_bartag_func' );

#########################################################################
################ if we have a few values to say it's a good practice to save theme as array value in option table##############

// function wporg_settings_init()
// {
//     // register a new setting for "reading" page
//     register_setting('reading', 'wporg_setting_name');
 
//     // register a new section in the "reading" page
//     add_settings_section(
//         'wporg_settings_section',
//         'WPOrg Settings Section',
//         'wporg_settings_section_cb',
//         'reading'
//     );
 
//     // register a new field in the "wporg_settings_section" section, inside the "reading" page
//     add_settings_field(
//         'wporg_settings_field',
//         'WPOrg Setting',
//         'wporg_settings_field_cb',
//         'reading',
//         'wporg_settings_section'
//     );
// }
 
// /**
//  * register wporg_settings_init to the admin_init action hook
//  */
// add_action('admin_init', 'wporg_settings_init');
 
// /**
//  * callback functions
//  */
 
// // section content cb
// function wporg_settings_section_cb()
// {
//     echo '<p>WPOrg Section Introduction.</p>';
// }
 
// // field content cb
// function wporg_settings_field_cb()
// {
//     // get the value of the setting we've registered with register_setting()
//     $setting = get_option('wporg_setting_name');
//     // output the field
/*     ?>
//     <input type="text" name="wporg_setting_name" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
//     <?php
// }
*/

