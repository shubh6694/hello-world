<?php
/*
Plugin Name: shubh user form
Description: This is just a simple plugin, that gets data from user and insert it into wordpress database.
Author: Shubham Kale
Version: 1.5
*/

if (!defined('ABSPATH')) // Protecting PHP file 
    die('Not allowed'); // from direct access

class Shubh_Plugin
{
    public function __construct() // is exucuted as soon as new instace of class is instantiated.
    {
        add_action   ('wp_enqueue_scripts', array( $this , 'enqueue_script'));
        add_action   ('init', array( $this , 'create_user_wp' ));
        add_shortcode('test', array( $this , 'my_form_shortcode'));
    }

    function enqueue_script()   // to enqueue or link script and style file
    {
        wp_enqueue_script('custom_script', plugin_dir_url(__FILE__).'/js/custom-script.js', array('jquery'));
    }

    //to include html file to create shortcode and load html form   
    function my_form_shortcode()
    {
        include_once(plugin_dir_path(__FILE__).'/include/form.php');
        ob_start();              // output-buffering start
        locate_template('form');
        return ob_get_clean();  // get output-buffer data and then delete or clean the buffer
    }
    
    //function to insert data into DB
    function create_user_wp()
    {
        if (isset($_POST['bttn'])) {
            $usrname  = $_POST["user_name"];
            $usremail = $_POST["user_email"];
            $usrfname = $_POST['user_fname'];
            $usrlname = $_POST['user_lname'];
            $website  = $_POST["user_website"];
            $password = $_POST["user_pw"];
            $role     = $_POST['user_role'];

            $usrexist = username_exists($usrname);
            if ($usrexist == $usrname) {
                echo "user already exist !!!";
            } else {
                $userdata = [
                    'user_login' => $usrname,
                    'user_email' => $usremail,
                    'first_name' => $usrfname,
                    'last_name' => $usrlname,
                    'user_url' => $website,
                    'user_pass' => $password,
                    'user_nicename' => $usrfname
                ];
                
                // insert user
                $user_id = wp_insert_user($userdata);
                
                // insert user role
                $user = new WP_User($user_id);
                $user->set_role($role);
                
                if (isset($_POST["send_user"])) {
                    echo "email sent!!!";
                    //send mail to user
                    wp_mail($usremail, 'Welcome to Wordpress!!!', 'Your Password is: ' . $password);
                }
                
                if (!is_wp_error($user_id)) {
                    echo "User created : " . $user_id;
                }
            }
        }
    }
    
} // class close

global $shubh_plugin;
$shubh_plugin = new Shubh_Plugin();
?>