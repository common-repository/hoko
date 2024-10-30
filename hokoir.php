<?php
/**
 * Plugin Name: هوکو
 * Plugin URI: http://www.hoko.ir
 * Description: نمایش جدیدترین موبایل ها و تبلت های بازار و موبایل ها و تبلت های با بیشترین کاهش قیمت در هفته - به همراه ابزارک و کد کوتاه -
 * Version: 1.0
 * Author: pazis
 * Author URI: http://www.pazis.ir
 * License: GPL1
 */
defined('ABSPATH') or die('No script kiddies please!');

add_action('admin_menu', 'hokoir_menu');
add_action('widgets_init', 'hokoir_load_widget');
add_action('admin_init', 'hoko_register_settings');

register_activation_hook(   __FILE__, 'hokoir_on_activation' );
function hokoir_on_activation(){
	$url_new = 'http://www.hoko.ir/newProductsTable?lc=6495ED&pc=000000&hbc=F0FFFF&htc=000000&thbc=1ABC9C&thtc=FFFFFF&orc=FFFFFF&erc=F0FFFF&num=10&w=400';
	$url_drop = 'http://www.hoko.ir/priceDropProductsTable?lc=6495ED&pc=000000&hbc=F0FFFF&htc=000000&thbc=1ABC9C&thtc=FFFFFF&orc=FFFFFF&erc=F0FFFF&num=10&w=400';
	add_option('hokoir_plugin_widget_new', $url_new, '', 'yes');
	add_option('hokoir_plugin_widget_drop', $url_drop, '', 'yes');
}

function hokoir_menu(){
    add_menu_page('تنظيمات افزونه هوکو', 'هوکو', 'manage_options', 'hokoir_page', 'main_page', 'dashicons-tickets', 6);
}

function hokoir_admin_notice_success() {
    ?>
    <div class="notice notice-success is-dismissible">
        <p>تغییرات با موفقیت ذخیره شد.</p>
    </div>
    <?php
}



function hokoir_settings_link($links) { 
  $settings_link = '<a href="admin.php?page=hokoir_page">تنظیمات</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}

$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'hokoir_settings_link' );

function hokoir_load_widget()
{
    register_widget('hokoir_widget');
}


function hoko_register_settings()
{
    if (isset($_POST['submit'])) {
        $lc = (isset($_POST['lc'])&&(strlen($_POST['lc'])==6))?sanitize_text_field($_POST['lc']):'6495ED';
        $pc = (isset($_POST['pc'])&&(strlen($_POST['pc'])==6))?sanitize_text_field($_POST['pc']):'000000';
        $hbc = (isset($_POST['hbc'])&&(strlen($_POST['hbc'])==6))?sanitize_text_field($_POST['hbc']):'F0FFFF';
        $htc = (isset($_POST['htc'])&&(strlen($_POST['htc'])==6))?sanitize_text_field($_POST['htc']):'000000';
        $thbc = (isset($_POST['thbc'])&&(strlen($_POST['thbc'])==6))?sanitize_text_field($_POST['thbc']):'1ABC9C';
        $thtc = (isset($_POST['thtc'])&&(strlen($_POST['thtc'])==6))?sanitize_text_field($_POST['thtc']):'FFFFFF';
        $orc = (isset($_POST['orc'])&&(strlen($_POST['orc'])==6))?sanitize_text_field($_POST['orc']):'FFFFFF';
        $erc = (isset($_POST['erc'])&&(strlen($_POST['erc'])==6))?sanitize_text_field($_POST['erc']):'F0FFFF';
        $w = isset($_POST['w'])?sanitize_text_field($_POST['w']):'400';
        $num = isset($_POST['num'])?sanitize_text_field($_POST['num']):'10';
		
		$lc2 = (isset($_POST['lc2'])&&(strlen($_POST['lc2'])==6))?sanitize_text_field($_POST['lc2']):'6495ED';
        $pc2 = (isset($_POST['pc2'])&&(strlen($_POST['pc2'])==6))?sanitize_text_field($_POST['pc2']):'000000';
        $hbc2 = (isset($_POST['hbc2'])&&(strlen($_POST['hbc2'])==6))?sanitize_text_field($_POST['hbc2']):'F0FFFF';
        $htc2 = (isset($_POST['htc2'])&&(strlen($_POST['htc2'])==6))?sanitize_text_field($_POST['htc2']):'000000';
        $thbc2 = (isset($_POST['thbc2'])&&(strlen($_POST['thbc2'])==6))?sanitize_text_field($_POST['thbc2']):'1ABC9C';
        $thtc2 = (isset($_POST['thtc2'])&&(strlen($_POST['thtc2'])==6))?sanitize_text_field($_POST['thtc2']):'FFFFFF';
        $orc2 = (isset($_POST['orc2'])&&(strlen($_POST['orc2'])==6))?sanitize_text_field($_POST['orc2']):'FFFFFF';
        $erc2 = (isset($_POST['erc2'])&&(strlen($_POST['erc2'])==6))?sanitize_text_field($_POST['erc2']):'F0FFFF';
        $w2 = isset($_POST['w2'])?sanitize_text_field($_POST['w2']):'400';
        $num2 = isset($_POST['num2'])?sanitize_text_field($_POST['num2']):'10';

        $url_new = 'http://www.hoko.ir/newProductsTable?lc=' . $lc . '&pc=' . $pc . '&hbc=' . $hbc
            . '&htc=' . $htc . '&thbc=' . $thbc . '&thtc=' . $thtc
            . '&orc=' . $orc . '&erc=' . $erc. '&num=' . $num . '&w=' . $w ;
        $url_drop = 'http://www.hoko.ir/priceDropProductsTable?lc=' . $lc2 . '&pc=' . $pc2 . '&hbc=' . $hbc2
            . '&htc=' . $htc2 . '&thbc=' . $thbc2 . '&thtc=' . $thtc2
            . '&orc=' . $orc2 . '&erc=' . $erc2 . '&num=' . $num2 . '&w=' . $w2 ;
        update_option('hokoir_plugin_widget_new', $url_new, '', 'yes');
        update_option('hokoir_plugin_widget_drop', $url_drop, '', 'yes');
		add_action( 'admin_notices', 'hokoir_admin_notice_success' );
    }
}

function main_page()
{
    wp_enqueue_script('jquery', false, array('json2'), false, false);
    wp_enqueue_script('jscolor.min', plugin_dir_url(__FILE__) . 'jscolor.min.js');
    wp_enqueue_script('hoko', plugin_dir_url(__FILE__) . 'hoko.js', array('jquery'), false, false);
    wp_enqueue_style('style', plugin_dir_url(__FILE__) . 'style.css');
	
	$hoko_new = get_option('hokoir_plugin_widget_new');
	$hoko_drop = get_option('hokoir_plugin_widget_drop');
	
    ?>
    <div class="wrap">
        <h2>تنظیمات ویجت هوکو</h2>
        <section style="direction:rtl;" class="hokoir">
            <form method="post" action="">
                <div id="tab1">
                    <h2>کد جدیدترین ها</h2>

                    <div style="min-width:280px; width:40%;">
                        <span>رنگ لینک ها: </span>
                        <input style="width:20%;" id="lc" class="jscolor" name="lc" value="<?=substr($hoko_new, 39, 6);?>">

                        <br>
                        <span>رنگ قیمت ها: </span>
                        <input style="width:20%;" id="pc" class="jscolor" name="pc" value="<?=substr($hoko_new, 49, 6);?>">

                        <br>
                        <span>رنگ پس زمینه ی عنوان جدول: </span>
                        <input style="width:20%;" id="hbc" class="jscolor" name="hbc" value="<?=substr($hoko_new, 60, 6);?>">

                        <br>
                        <span>رنگ نوشته ی عنوان جدول: </span>
                        <input style="width:20%;" id="htc" class="jscolor" name="htc" value="<?=substr($hoko_new, 71, 6);?>">

                        <br>
                        <span>رنگ پس زمینه ی سربرگ جدول: </span>
                        <input style="width:20%;" id="thbc" class="jscolor" name="thbc" value="<?=substr($hoko_new, 83, 6);?>">

                        <br>
                        <span>رنگ نوشته ی سربرگ جدول: </span>
                        <input style="width:20%;" id="thtc" class="jscolor" name="thtc" value="<?=substr($hoko_new, 95, 6);?>">

                        <br>
                        <span>رنگ پس زمینه ی سطرهای فرد: </span>
                        <input style="width:20%;" id="orc" class="jscolor" name="orc" value="<?=substr($hoko_new, 106, 6);?>">

                        <br>
                        <span>رنگ پس زمینه ی سطرهای زوج: </span>
                        <input style="width:20%;" id="erc" class="jscolor" name="erc" value="<?=substr($hoko_new, 117, 6);?>">

                        <br>
                        <span>تعداد سطرهای جدول: </span>
                        <select id="num" name="num">
                            <option value="05" <?=substr($hoko_new, 128, 2)=='05'?' selected="true"':'';?>>5</option>
                            <option value="10" <?=substr($hoko_new, 128, 2)=='10'?' selected="true"':'';?>>10</option>
                            <option value="25" <?=substr($hoko_new, 128, 2)=='25'?' selected="true"':'';?>>25</option>
                            <option value="50" <?=substr($hoko_new, 128, 2)=='50'?' selected="true"':'';?>>50</option>
                        </select>

                        <br>
                        <span>پهنای جدول به پیکسل*: </span>
                        <input type="text" style="width:20%;" id="w" name="w" value="<?=substr($hoko_new, 133);?>">
                        <br>
                        <span>* مقدار مجاز: بین 100 تا 1800</span>
                        <br><br>
                        <a id="gen">تولید مجدد </a>
                        <br><br>
						
                    </div>

                    <div style="min-width:280px; width:40%;">
                        کد کوتاه :
                        <textarea id="shortcode1" rows="5"></textarea>
                        <br>
                        <a target="_blank" href="http://www.hoko.ir/newProductsTable?" id="preview">پیش نمایش</a>
                        <a id="defaults1">مقادیر پیشفرض</a>
                    </div>
                </div>

                <div id="tab2">
                    <h2>کد بیشترین کاهش قیمت هفته</h2>

                    <div style="min-width:280px; width:40%;">
                        <span>رنگ لینک ها: </span>
                        <input style="width:20%;" id="lc2" class="jscolor" name="lc2" value="<?=substr($hoko_drop, 45, 6);?>">

                        <br>
                        <span>رنگ قیمت ها: </span>
                        <input style="width:20%;" id="pc2" class="jscolor" name="pc2" value="<?=substr($hoko_drop, 55, 6);?>">

                        <br>
                        <span>رنگ پس زمینه ی عنوان جدول: </span>
                        <input style="width:20%;" id="hbc2" class="jscolor" name="hbc2" value="<?=substr($hoko_drop, 66, 6);?>">

                        <br>
                        <span>رنگ نوشته ی عنوان جدول: </span>
                        <input style="width:20%;" id="htc2" class="jscolor" name="htc2" value="<?=substr($hoko_drop, 77, 6);?>">

                        <br>
                        <span>رنگ پس زمینه ی سربرگ جدول: </span>
                        <input style="width:20%;" id="thbc2" class="jscolor" name="thbc2" value="<?=substr($hoko_drop, 89, 6);?>">

                        <br>
                        <span>رنگ نوشته ی سربرگ جدول: </span>
                        <input style="width:20%;" id="thtc2" class="jscolor" name="thtc2" value="<?=substr($hoko_drop, 101, 6);?>">

                        <br>
                        <span>رنگ پس زمینه ی سطرهای فرد: </span>
                        <input style="width:20%;" id="orc2" class="jscolor" name="orc2" value="<?=substr($hoko_drop, 112, 6);?>">

                        <br>
                        <span>رنگ پس زمینه ی سطرهای زوج: </span>
                        <input style="width:20%;" id="erc2" class="jscolor" name="erc2" value="<?=substr($hoko_drop, 123, 6);?>">

                        <br>
                        <span>تعداد سطرهای جدول: </span>
                        <select id="num2" name="num2">
                            <option value="05" <?=substr($hoko_drop, 134, 2)=='05'?' selected="true"':'';?>>5</option>
                            <option value="10" <?=substr($hoko_drop, 134, 2)=='10'?' selected="true"':'';?>>10</option>
                            <option value="25" <?=substr($hoko_drop, 134, 2)=='25'?' selected="true"':'';?>>25</option>
                            <option value="50" <?=substr($hoko_drop, 134, 2)=='50'?' selected="true"':'';?>>50</option>
                        </select>

                        <br>
                        <span>پهنای جدول به پیکسل*: </span>
                        <input type="text" style="width:20%;" id="w2" name="w2" value="<?=substr($hoko_drop, 139);?>">
                        <br>
                        <span>* مقدار مجاز: بین 100 تا 1800</span>

                        <br><br>
                        <a id="gen2">تولید مجدد </a>
                        <br><br>
                    </div>

                    <div style="min-width:280px; width:40%;">
                        کد کوتاه :
                        <textarea id="shortcode2" rows="5"></textarea>
                        <br>
                        <a target="_blank" href="http://www.hoko.ir/priceDropProductsTable?" id="preview2">پیش نمایش</a>
                        <a id="defaults2">مقادیر پیشفرض</a>
                    </div>
                </div>
                <input type="submit" name="submit" value="ثبت تغییرات"/>
            </form>
        </section>
    </div>
    <?php
}

;

// Hoko widget 
class hokoir_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'hoko_widget',
            'ابزارک نمایش سریع هوکو',
            array('description' => 'نمایش سریع جدیدترین موبایل ها و تبلت های بازار و موبایل ها و تبلت های با بیشترین کاهش قیمت در هفته')
        );
    }
    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['hokoir_title']);
        $type = apply_filters('widget_title', $instance['hokoir_type']);
        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];

        if ($type == 'drop')
            echo file_get_contents(get_option('hokoir_plugin_widget_drop'));
        else
            echo file_get_contents(get_option('hokoir_plugin_widget_new'));
        echo $args['after_widget'];
    }

// Widget Backend 
    public function form($instance)
    {
        if (isset($instance['hokoir_title'])) {
            $title = $instance['hokoir_title'];
        } else {
            $title = 'هوکو';
        }
        if (isset($instance['hokoir_type'])) {
            $type = $instance['hokoir_type'];
        } else {
            $type = 'new';
        }
// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('hokoir_title'); ?>">
                <?php _e('عنوان:'); ?>
            </label>
            <input class="widget" id="<?php echo $this->get_field_id('hokoir_title'); ?>"
                   name="<?php echo $this->get_field_name('hokoir_title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
            <label for="<?php echo $this->get_field_id('hokoir_type'); ?>">
                <?php _e('نوع :'); ?>
            </label>
            <select name="<?php echo $this->get_field_name('hokoir_type'); ?>"
                    id="<?php echo $this->get_field_id('hokoir_type'); ?>">
                <option value="new"> جدیدترین ها</option>
                <option value="drop">بیشترین کاهش قیمت هفته</option>
            </select>
        </p>
        <?php
    }

// Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['hokoir_title'] = (!empty($new_instance['hokoir_title'])) ? strip_tags($new_instance['hokoir_title']) : '';
        $instance['hokoir_type'] = (!empty($new_instance['hokoir_type'])) ? strip_tags($new_instance['hokoir_type']) : '';
        return $instance;
    }
}

// hoko shortcode
/* function hoko_shortcode_new(){
	echo file_get_contents(get_option('hokoir_plugin_widget_new'));
}
function hoko_shortcode_drop(){
	echo file_get_contents(get_option('hokoir_plugin_widget_drop'));
}

add_shortcode('hokoir-new', 'hoko_shortcode_new');
add_shortcode('hokoir-drop', 'hoko_shortcode_drop'); */



function hoko_shortcode_new( $atts ) {
  $atts = shortcode_atts( 
    array(
      'lc' => '6495ED',
      'pc' => '000000',
	  'hbc' => 'F0FFFF',
      'htc' => '000000',
	  'thbc' => '1ABC9C',
      'thtc' => 'FFFFFF',
	  'orc' => 'FFFFFF',
	  'erc' => 'F0FFFF',
      'w' => '400',
	  'num' => '10'
    ), 
    $atts
  );
  $url = trim('http://www.hoko.ir/newProductsTable?lc='.$atts['lc'].'&pc='.$atts['pc'].
  '&hbc='.$atts['hbc'].'&htc='.$atts['htc'].'&thbc='.$atts['thbc'].'&thtc='.$atts['thtc'].
  '&orc='.$atts['orc'].'&erc='.$atts['erc'].'&w='.$atts['w'].'&num='.$atts['num']);
  //return $url;
  return file_get_contents($url);
}

function hoko_shortcode_drop( $atts ) {
  $atts = shortcode_atts( 
    array(
      'lc' => '6495ED',
      'pc' => '000000',
	  'hbc' => 'F0FFFF',
      'htc' => '000000',
	  'thbc' => '1ABC9C',
      'thtc' => 'FFFFFF',
	  'orc' => 'FFFFFF',
	  'erc' => 'F0FFFF',
      'w' => '400',
	  'num' => '10'
    ), 
    $atts
  );
  $url = 'http://www.hoko.ir/priceDropProductsTable?lc='.$atts['lc'].'&pc='.$atts['pc'].'&hbc='.$atts['hbc'].
  '&htc='.$atts['htc'].'&thbc='.$atts['thbc'].'&thtc='.$atts['thtc'].
  '&orc='.$atts['orc'].'&erc='.$atts['erc'].'&w='.$atts['w'].'&num='.$atts['num'];
  //return $url;
  return file_get_contents($url);
}

add_shortcode('hokoir-new','hoko_shortcode_new');
add_shortcode('hokoir-drop', 'hoko_shortcode_drop');
?>