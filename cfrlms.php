<?php
/*
Plugin Name: CloudFlare Rocket Loader Manual Settings
Version: 1.0
Plugin URI: http://mentormate.com/wordpress/cloudflare-rocket-loader-manual-settings/
Description: Allows you to manually set which JavaScript files to optimize with the CloudFlare Rocket Loader.
Author: MentorMate
Author URI: http://mentormate.com/

Copyright 2014 MentorMate (email: andy@mentormate.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

if ( ! class_exists( 'CloudFlareRocketLoaderManualSettings_Admin' ) ) {

	require_once('cfrlms_plugin_tools.php');
	
	class CloudFlareRocketLoaderManualSettings_Admin extends CFRLMS_Plugin_Admin {
		
		var $hook 		= 'cloudflare-rocket-loader-manual-settings';
		var $longname	= 'CloudFlare Rocket Loader Manual Settings';
		var $shortname	= 'Rocket Loader Settings';
		var $filename	= 'cloudflare-rocket-loader-manual-settings/cfrlms.php';
		var $homepage	= 'http://wordpress.org/plugins/cloudflare-rocket-loader-manual-settings/';
		
		function register_settings_page() {
			add_options_page($this->longname, $this->shortname, $this->accesslvl, $this->hook, array(&$this,'config_page'));
		}

		function plugin_options_url() {
			return admin_url( 'options-general.php?page='.$this->hook );
		}
		
		function config_page_scripts() {
			if (isset($_GET['page']) && $_GET['page'] == $this->hook) {
				wp_enqueue_script('jquery');
				wp_enqueue_script('postbox');
				wp_enqueue_script('dashboard');
				wp_enqueue_script('thickbox');
			}
		}
		
		function config_page() {
			$options = get_option('cfrlmsoptions');
			
			if ( isset($_POST['submit']) ) {
				if (!current_user_can('manage_options')) die(__('You cannot edit the CloudFlare Rocket Loader Manual Settings options.'));
				check_admin_referer('cfrlms-config');

				$inputs = array(
					"optimize1" => array( 
						"label" => "JavaScript URL",
						"type" => "text",
					),
					"optimize2" => array( 
						"label" => "JavaScript URL",
						"type" => "text",
					),
					"optimize3" => array( 
						"label" => "JavaScript URL",
						"type" => "text",
					),
					"optimize4" => array( 
						"label" => "JavaScript URL",
						"type" => "text",
					),
					"optimize5" => array( 
						"label" => "JavaScript URL",
						"type" => "text",
					),
					"optimize6" => array( 
						"label" => "JavaScript URL",
						"type" => "text",
					),
					"optimize7" => array( 
						"label" => "JavaScript URL",
						"type" => "text",
					),
					"optimize8" => array( 
						"label" => "JavaScript URL",
						"type" => "text",
					),
					"optimize9" => array( 
						"label" => "JavaScript URL",
						"type" => "text",
					),
					"optimize10" => array( 
						"label" => "JavaScript URL",
						"type" => "text",
					),
					"optimize11" => array( 
						"label" => "JavaScript URL",
						"type" => "text",
					),
					"optimize12" => array( 
						"label" => "JavaScript URL",
						"type" => "text",
					),
					"optimize13" => array( 
						"label" => "JavaScript URL",
						"type" => "text",
					),
					"optimize14" => array( 
						"label" => "JavaScript URL",
						"type" => "text",
					),
					"optimize15" => array( 
						"label" => "JavaScript URL",
						"type" => "text",
					),
					"optimize16" => array( 
						"label" => "JavaScript URL",
						"type" => "text",
					),
					"optimize17" => array( 
						"label" => "JavaScript URL",
						"type" => "text",
					),
					"optimize18" => array( 
						"label" => "JavaScript URL",
						"type" => "text",
					),
					"optimize19" => array( 
						"label" => "JavaScript URL",
						"type" => "text",
					),
					"optimize20" => array( 
						"label" => "JavaScript URL",
						"type" => "text",
					),
				);

				foreach ($inputs as $key => $val) {
					if (isset($_POST[$key]) && trim($_POST[$key]) != "") {
						if ($val['type'] == "image") {
							$url = $_POST[$key];
						} else {
							$options[$key] = $_POST[$key];
						}
					} else {
						$options[$key] = "";
					}
				}
			
				if (get_option('cfrlmsoptions') != $options) {
					update_option('cfrlmsoptions', $options);
					$message = "<p>CloudFlare Rocket Loader Manual Settings settings have been updated.</p>";
				}
			}
			
			$options = get_option('cfrlmsoptions');
			
			if (isset($error) && $error != "") {
				echo "<div id=\"message\" class=\"error\">$error</div>\n";
			} elseif (isset($message) && $message != "") {
				echo "<div id=\"updatemessage\" class=\"updated fade\">$message</div>\n";
				echo "<script type=\"text/javascript\">setTimeout(function(){jQuery('#updatemessage').hide('slow');}, 3000);</script>";
			}
			?>
			<div class="wrap">
				<h2>CloudFlare Rocket Loader Manual Settings options</h2>
				<div class="postbox-container" style="width:70%;margin-right: 20px;">
					<div class="metabox-holder">	
						<div class="meta-box-sortables">
							<form action="" method="post" id="cfrlms-conf" enctype="multipart/form-data">
								<?php
								if ( function_exists('wp_nonce_field') )
									wp_nonce_field('cfrlms-config');

								$content = '<input class="text" type="text" value="'.$options['optimize1'].'" name="optimize1" id="optimize1" style="width:100%;"/>';

								$rows = array ();
								$rows[] = array(
											'id' => 'optimize1',
											'label' => 'JavaScript URL',
											'desc' => '',
											'content' => $content
										);

								$content = '<input class="text" type="text" value="'.$options['optimize2'].'" name="optimize2" id="optimize2" style="width:100%;"/>';

								$rows[] = array(
											'id' => 'optimize2',
											'label' => 'JavaScript URL',
											'desc' => '',
											'content' => $content
										);

								$content = '<input class="text" type="text" value="'.$options['optimize3'].'" name="optimize3" id="optimize3" style="width:100%;"/>';

								$rows[] = array(
											'id' => 'optimize3',
											'label' => 'JavaScript URL',
											'desc' => '',
											'content' => $content
										);

								$content = '<input class="text" type="text" value="'.$options['optimize4'].'" name="optimize4" id="optimize4" style="width:100%;"/>';

								$rows[] = array(
											'id' => 'optimize4',
											'label' => 'JavaScript URL',
											'desc' => '',
											'content' => $content
										);

								$content = '<input class="text" type="text" value="'.$options['optimize5'].'" name="optimize5" id="optimize5" style="width:100%;"/>';

								$rows[] = array(
											'id' => 'optimize5',
											'label' => 'JavaScript URL',
											'desc' => '',
											'content' => $content
										);

								$content = '<input class="text" type="text" value="'.$options['optimize6'].'" name="optimize6" id="optimize6" style="width:100%;"/>';

								$rows[] = array(
											'id' => 'optimize6',
											'label' => 'JavaScript URL',
											'desc' => '',
											'content' => $content
										);

								$content = '<input class="text" type="text" value="'.$options['optimize7'].'" name="optimize7" id="optimize7" style="width:100%;"/>';

								$rows[] = array(
											'id' => 'optimize7',
											'label' => 'JavaScript URL',
											'desc' => '',
											'content' => $content
										);

								$content = '<input class="text" type="text" value="'.$options['optimize8'].'" name="optimize8" id="optimize8" style="width:100%;"/>';

								$rows[] = array(
											'id' => 'optimize8',
											'label' => 'JavaScript URL',
											'desc' => '',
											'content' => $content
										);

								$content = '<input class="text" type="text" value="'.$options['optimize9'].'" name="optimize9" id="optimize9" style="width:100%;"/>';

								$rows[] = array(
											'id' => 'optimize9',
											'label' => 'JavaScript URL',
											'desc' => '',
											'content' => $content
										);

								$content = '<input class="text" type="text" value="'.$options['optimize10'].'" name="optimize10" id="optimize10" style="width:100%;"/>';

								$rows[] = array(
											'id' => 'optimize10',
											'label' => 'JavaScript URL',
											'desc' => '',
											'content' => $content
										);

								$content = '<input class="text" type="text" value="'.$options['optimize11'].'" name="optimize11" id="optimize11" style="width:100%;"/>';

								$rows[] = array(
											'id' => 'optimize11',
											'label' => 'JavaScript URL',
											'desc' => '',
											'content' => $content
										);

								$content = '<input class="text" type="text" value="'.$options['optimize12'].'" name="optimize12" id="optimize12" style="width:100%;"/>';

								$rows[] = array(
											'id' => 'optimize12',
											'label' => 'JavaScript URL',
											'desc' => '',
											'content' => $content
										);

								$content = '<input class="text" type="text" value="'.$options['optimize13'].'" name="optimize13" id="optimize13" style="width:100%;"/>';

								$rows[] = array(
											'id' => 'optimize13',
											'label' => 'JavaScript URL',
											'desc' => '',
											'content' => $content
										);

								$content = '<input class="text" type="text" value="'.$options['optimize14'].'" name="optimize14" id="optimize14" style="width:100%;"/>';

								$rows[] = array(
											'id' => 'optimize14',
											'label' => 'JavaScript URL',
											'desc' => '',
											'content' => $content
										);

								$content = '<input class="text" type="text" value="'.$options['optimize15'].'" name="optimize15" id="optimize15" style="width:100%;"/>';

								$rows[] = array(
											'id' => 'optimize15',
											'label' => 'JavaScript URL',
											'desc' => '',
											'content' => $content
										);

								$content = '<input class="text" type="text" value="'.$options['optimize16'].'" name="optimize16" id="optimize16" style="width:100%;"/>';

								$rows[] = array(
											'id' => 'optimize16',
											'label' => 'JavaScript URL',
											'desc' => '',
											'content' => $content
										);

								$content = '<input class="text" type="text" value="'.$options['optimize17'].'" name="optimize17" id="optimize17" style="width:100%;"/>';

								$rows[] = array(
											'id' => 'optimize17',
											'label' => 'JavaScript URL',
											'desc' => '',
											'content' => $content
										);

								$content = '<input class="text" type="text" value="'.$options['optimize18'].'" name="optimize18" id="optimize18" style="width:100%;"/>';

								$rows[] = array(
											'id' => 'optimize18',
											'label' => 'JavaScript URL',
											'desc' => '',
											'content' => $content
										);

								$content = '<input class="text" type="text" value="'.$options['optimize19'].'" name="optimize19" id="optimize19" style="width:100%;"/>';

								$rows[] = array(
											'id' => 'optimize19',
											'label' => 'JavaScript URL',
											'desc' => '',
											'content' => $content
										);

								$content = '<input class="text" type="text" value="'.$options['optimize20'].'" name="optimize20" id="optimize20" style="width:100%;"/>';

								$rows[] = array(
											'id' => 'optimize20',
											'label' => 'JavaScript URL',
											'desc' => '',
											'content' => $content
										);

								$this->postbox('optimize','Load Scripts through CloudFlare Rocket Loader', $this->form_table($rows));

								?>
								<div class="submit">
									<input type="submit" class="button-primary" name="submit" value="Save Changes &raquo;" />
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="postbox-container" style="width:20%;">
					<div class="metabox-holder">	
						<div class="meta-box-sortables">
							<?php
								$this->plugin_like('cloudflare-rocket-loader-manual-settings');
								$this->plugin_support('cloudflare-rocket-loader-manual-settings');
								$this->news(); 
							?>
						</div>
						<br/><br/><br/>
					</div>
				</div>
			</div>
<?php		
			}
	}
	$bsa = new CloudFlareRocketLoaderManualSettings_Admin();
}



add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );
function rocket_loader_attributes( $url ){
	$options = get_option('cfrlmsoptions');
    $optimize = array (
        $options['optimize1'],
        $options['optimize2'],
        $options['optimize3'],
        $options['optimize4'],
        $options['optimize5'],
        $options['optimize6'],
        $options['optimize7'],
        $options['optimize8'],
        $options['optimize9'],
        $options['optimize10'],
        $options['optimize11'],
        $options['optimize12'],
        $options['optimize13'],
        $options['optimize14'],
        $options['optimize15'],
        $options['optimize16'],
        $options['optimize17'],
        $options['optimize18'],
        $options['optimize19'],
        $options['optimize20']
    );

    if ( in_array( $url, $optimize ) )
    { // this will be optimized
        return "$url' data-cfasync='true";
    }

    return $url;
}
add_filter( 'clean_url', 'rocket_loader_attributes', 11, 1 );

?>