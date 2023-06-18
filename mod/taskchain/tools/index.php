<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * mod/taskchain/tools/index.php
 *
 * @package    mod
 * @subpackage taskchain
 * @copyright  2013 Gordon Bateson (gordon.bateson@gmail.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since      Moodle 2.0
 */

/** Include required files */
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/config.php');
require_once($CFG->dirroot.'/mod/taskchain/locallib.php');

require_login(SITEID);
if (class_exists('context_system')) {
    $context = context_system::instance();
} else {
    $context = get_context_instance(CONTEXT_SYSTEM);
}
require_capability('moodle/site:config', $context);

// $SCRIPT is set by initialise_fullme() in 'lib/setuplib.php'
// it is the path below $CFG->wwwroot of this script
$PAGE->set_url($CFG->wwwroot.$SCRIPT);

// set title
$title = get_string('toolsindex', 'mod_taskchain');
$PAGE->set_title($title);
$PAGE->set_heading($title);
$PAGE->set_pagelayout('admin');

echo $OUTPUT->header();
echo $OUTPUT->box_start();

// get path to this directory
$dirname = dirname($SCRIPT);
$dirpath = $CFG->dirroot.$dirname;

echo html_writer::start_tag('ul')."\n";

$files = array();
$items = new DirectoryIterator($dirpath);
foreach ($items as $item) {
    if ($item->isDot() || substr($item, 0, 1)=='.' || $item=='index.php' || trim($item)=='') {
        continue;
    }
    if ($item->isFile()) {
        $files[] = "$item"; // convert $item to string
    }
}
sort($files);
foreach ($files as $file) {
    $href = $CFG->wwwroot.$dirname.'/'.$file;
    echo html_writer::tag('li', html_writer::tag('a', $file, array('href' => $href)))."\n";
}

echo html_writer::end_tag('ul')."\n";

echo $OUTPUT->box_end();
echo $OUTPUT->footer();
