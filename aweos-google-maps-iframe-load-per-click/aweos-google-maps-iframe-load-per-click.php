<?php
/**
 * AWEOS Google Maps iframe Load per Click
 *
 * @author      AWEOS GmbH
 * @copyright   2021 AWEOS GmbH. All rights reserved.
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: AWEOS Google Maps iframe Load per Click
 * Plugin URI:  -
 * Description: Google Maps can't be used directly anymore, this plugin asks for the users permission. It should work automatically.
 * Version:     1.9.3
 * Author:      AWEOS GmbH
 * Author URI:  https://aweos.de
 * Text Domain: aweos-google-maps-privacy-domain
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt

Google Maps can't be used directly anymore, this plugin asks for the users permission.
This plugin helps with the GDPR for your website.

*/

use Zend\Dom\Query;

if (!defined('ABSPATH')) {
    exit;
}

require_once 'admin-menu.php';
require_once 'vendor/autoload.php';

# use search and replace

function awmp_clean_google_iframes($html)
{
    // return $html;

    return preg_replace_callback('/<iframe.*\/iframe>/Usi', function($m) {
        $html = $m[0];

        if (strpos($html, 'google.com/maps') === false) {
            return $html;
        }

        $query = new Query($html);
        $nodes = $query->execute('iframe');

        foreach ($nodes as $node) {
            $attributes = [];

            foreach ($node->attributes as $key => $value) {
                $attributes[$key] = $value->value;
            }

            // Map width and height attr's to style CSS

            $width = "";
            $height = "";

            // return print_r($attributes, true);

            // Array
            // (
            //     [width] => 750
            //     [height] => 500
            //     [id] => gmap_canvas
            //     [src] => https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=&amp;output=embed
            //     [frameborder] => 0
            //     [scrolling] => no
            //     [marginheight] => 0
            //     [marginwidth] => 0
            // )

            
            
            
            
            
            

            // if (array_key_exists('style', $attributes)) {
            //     if (strpos($attributes['width'], '%') !== false) {
            //         $suffix = '';
            //     } else if (strpos($attributes['width'], 'px') !== false) {
            //         $suffix = '';
            //     } else if (strpos($attributes['width'], 'pt') !== false) {
            //         $suffix = '';
            //     } else {
            //         $suffix = 'px';
            //     }

            //     $width .= "; width:" . $attributes['width'] . $suffix . ";";
            // } else {
            //     $width = "width:" . $attributes['width'] . $suffix . ";";
            // }

            // if (array_key_exists('height', $attributes)) {
            //     if (strpos($attributes['height'], '%') !== false) {
            //         $suffix = '';
            //     } else if (strpos($attributes['height'], 'px') !== false) {
            //         $suffix = '';
            //     } else if (strpos($attributes['height'], 'pt') !== false) {
            //         $suffix = '';
            //     } else {
            //         $suffix = 'px';
            //     }

            //     if (array_key_exists('style', $attributes)) {
            //         $height .= "; height:" . $attributes['height'] . $suffix . ";";
            //     } else {
            //         $height = "height:" . $attributes['height'] . $suffix . ";";
            //     }
            // }

            $width = "width: " . awmp_correct_dimension($attributes['width'] ?? '100%');
            $height = "height: " . awmp_correct_dimension($attributes['height'] ?? '450');

            if (array_key_exists('style', $attributes)) {
                $attributes['style'] .= "; $width; $height";
            } else {
                $attributes['style'] = "$width; $height";
            }

            if (array_key_exists('src', $attributes)) {
                $attributes['data-src'] = $attributes['src'];
            }

            if (array_key_exists('class', $attributes)) {
                $attributes['class'] .= ' awmp-map';
            } else {
                $attributes['class'] = 'awmp-map';
            }

            $attributes = array_diff_key($attributes, ['width' => '', 'height' => '', 'src' => '']);

            $attributesAsString = array_reduce(array_keys($attributes), function ($carry, $item) use ($attributes) {
                return $carry . $item.'="'.$attributes[$item].'" ';
            }, '');

            $html = '<div ' . $attributesAsString . '></div>';
            return $html;
        }

        return $html;
    }, $html);
}

function awmp_correct_dimension($dimension) {
    $groups = [];
    preg_match('/([0-9]*)(.*)/m', $dimension, $groups);

    $complete = $groups[0];
    $value = $groups[1];
    $unit = $groups[2];

    $is_plain_number = ($value && !$unit);
    
    if ($is_plain_number) {
        return "{$value}px";
    }

    return $complete;
}

function awmp_exclude($html)
{
    ob_start("awmp_clean_google_iframes");
}

add_action('wp_loaded', 'awmp_exclude');

# include jQuery to show a styled msg to the user

function awmp_enqueue()
{
    require_once 'lang/texts.php';
    wp_enqueue_script('jquery');

    wp_register_style('awmp-map', false);
    wp_enqueue_style('awmp-map');
    wp_add_inline_style( 'awmp-map', file_get_contents(plugin_dir_path(__FILE__) . "style.css") );

    wp_register_script('awmp-map', false);
    wp_enqueue_script('awmp-map', false, [], true);
    wp_add_inline_script( 'awmp-map', file_get_contents(plugin_dir_path(__FILE__) . "script.js") );

    wp_enqueue_style('awpm_style', plugin_dir_url(__FILE__) . "style.css", NULL, "5.2");
}

add_action("wp_enqueue_scripts", "awmp_enqueue");

# translations

function awmp_load_textdomain()
{
    load_plugin_textdomain(
        'aweos-google-maps-privacy-domain',
        false,
        basename(dirname(__FILE__)) . '/lang/'
    );
}

add_action('plugins_loaded', 'awmp_load_textdomain');
