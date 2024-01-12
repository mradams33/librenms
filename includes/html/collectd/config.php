<?php
/**
 * Configuration file for Collectd graph browser
 */

use LibreNMS\Config;

if (Config::has('rrdgraph_def_text')) {
    Config::set('rrdgraph_def_text', str_replace('  ', ' ', Config::get('rrdgraph_def_text')));
    Config::set('rrd_opts_array', explode(' ', trim(Config::get('rrdgraph_def_text'))));
}

// Array of paths when collectd's rrdtool plugin writes RRDs
Config::set('datadirs', [Config::get('collectd_dir')]);
// Width of graph to be generated by rrdgraph
Config::set('rrd_width', $_GET['width'] ?? 270);

// Height of graph to be generated by rrdgraph
Config::set('rrd_height', $_GET['height'] ?? 120);

// List of supported timespans (used for period drop-down list)
Config::set('timespan', [
    [
        'name' => 'hour',
        'label' => 'past hour',
        'seconds' => 3600,
    ],
    [
        'name' => 'day',
        'label' => 'past day',
        'seconds' => 86400,
    ],
    [
        'name' => 'week',
        'label' => 'past week',
        'seconds' => 604800,
    ],
    [
        'name' => 'month',
        'label' => 'past month',
        'seconds' => 2678400,
    ],
    [
        'name' => 'year',
        'label' => 'past year',
        'seconds' => 31622400,
    ],
]);
// Interval at which values are collectd (currently ignored)
Config::set('rrd_interval', 10);
// Average rows/rra (currently ignored)
Config::set('rrd_rows', 2400);
// Additional options to pass to rrdgraph
// Config::set('rrd_opts', (Config::get('rrdgraph_defaults', ''));
// Config::set('rrd_opts', array('-E', "-c", "SHADEA#a5a5a5", "-c", "SHADEB#a5a5a5", "-c", "FONT#000000", "-c", "CANVAS#FFFFFF", "-c", "GRID#aaaaaa",
// "-c", "MGRID#FFAAAA", "-c", "FRAME#3e3e3e", "-c", "ARROW#5e5e5e", "-R", "normal");
// Predefined set of colors for use by collectd_draw_rrd()
Config::set('rrd_colors', [
    'h_1' => 'F7B7B7',
    'f_1' => 'FF0000', // Red
    'h_2' => 'B7EFB7',
    'f_2' => '00E000', // Green
    'h_3' => 'B7B7F7',
    'f_3' => '0000FF', // Blue
    'h_4' => 'F3DFB7',
    'f_4' => 'F0A000', // Yellow
    'h_5' => 'B7DFF7',
    'f_5' => '00A0FF', // Cyan
    'h_6' => 'DFB7F7',
    'f_6' => 'A000FF', // Magenta
    'h_7' => 'FFC782',
    'f_7' => 'FF8C00', // Orange
    'h_8' => 'DCFF96',
    'f_8' => 'AAFF00', // Lime
    'h_9' => '83FFCD',
    'f_9' => '00FF99',
    'h_10' => '81D9FF',
    'f_10' => '00B2FF',
    'h_11' => 'FF89F5',
    'f_11' => 'FF00EA',
    'h_12' => 'FF89AE',
    'f_12' => 'FF0051',
    'h_13' => 'BBBBBB',
    'f_13' => '555555',
]);
/*
 * Path to TTF font file to use in error images
 * (fallback when file does not exist is GD fixed font)
 */
Config::set('error_font', '/usr/share/fonts/corefonts/arial.ttf');

/*
 * Constant defining full path to rrdtool
 */
define('RRDTOOL', Config::get('rrdtool'));
