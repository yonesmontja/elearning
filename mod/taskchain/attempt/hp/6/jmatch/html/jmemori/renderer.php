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
 * mod/taskchain/attempt/hp/6/jmatch/html/jmemori/renderer.php
 *
 * @package    mod
 * @subpackage taskchain
 * @copyright  2010 Gordon Bateson (gordon.bateson@gmail.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since      Moodle 2.0
 */

/** Prevent direct access to this script */
defined('MOODLE_INTERNAL') || die();

/** Include required files */
require_once($CFG->dirroot.'/mod/taskchain/attempt/hp/6/jmatch/html/renderer.php');

/**
 * mod_taskchain_attempt_hp_6_jmatch_html_jmemori_renderer
 *
 * @copyright  2010 Gordon Bateson (gordon.bateson@gmail.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since      Moodle 2.0
 * @package    mod
 * @subpackage taskchain
 */
class mod_taskchain_attempt_hp_6_jmatch_html_jmemori_renderer extends mod_taskchain_attempt_hp_6_jmatch_html_renderer {

    public $js_object_type = 'JMemori';

    /**
     * constructor function
     *
     * @param xxx $page
     * @param xxx $target
     * @todo Finish documenting this function
     */
    public function __construct(moodle_page $page, $target)  {
        parent::__construct($page, $target);
        // replace standard jcloze.js with jmemori.js
        $this->javascripts = preg_grep('/jmatch.js/', $this->javascripts, PREG_GREP_INVERT);
        array_push($this->javascripts, 'mod/taskchain/attempt/hp/6/jmatch/jmemori.js');
    }

    /**
     * List of source types which this renderer can handle
     *
     * @return array of strings
     */
    static public function sourcetypes()  {
        return array('hp_6_jmatch_html_jmemori');
    }

    /**
     * fix_headcontent
     *
     * @todo Finish documenting this function
     */
    public function fix_headcontent()  {
        $this->fix_headcontent_rottmeier('jmemori');
    }

    /**
     * fix_bodycontent
     *
     * @todo Finish documenting this function
     */
    public function fix_bodycontent()  {
        $this->fix_bodycontent_rottmeier();
        parent::fix_bodycontent();
    }

    /**
     * fix_title
     *
     * @todo Finish documenting this function
     */
    public function fix_title()  {
        $this->fix_title_rottmeier_JMemori();
    }

    /**
     * get_js_functionnames
     *
     * @return xxx
     * @todo Finish documenting this function
     */
    public function get_js_functionnames()  {
        // start list of function names
        $names = parent::get_js_functionnames();
        $names .= ($names ? ',' : '').'ShowSolution,CheckPair,WriteFeedback';
        return $names;
    }

    /**
     * fix_js_WriteFeedback
     *
     * @param xxx $str (passed by reference)
     * @param xxx $start
     * @param xxx $length
     * @todo Finish documenting this function
     */
    public function fix_js_WriteFeedback(&$str, $start, $length)  {
        $this->fix_js_WriteFeedback_JMemori($str, $start, $length);
    }

    /**
     * fix_js_HideFeedback
     *
     * @param xxx $str (passed by reference)
     * @param xxx $start
     * @param xxx $length
     * @todo Finish documenting this function
     */
    public function fix_js_HideFeedback(&$str, $start, $length)  {
        $this->fix_js_HideFeedback_JMemori($str, $start, $length);
    }

    /**
     * fix_js_ShowSolution
     *
     * @param xxx $str (passed by reference)
     * @param xxx $start
     * @param xxx $length
     * @todo Finish documenting this function
     */
    public function fix_js_ShowSolution(&$str, $start, $length)  {
        $this->fix_js_ShowSolution_JMemori($str, $start, $length);
    }

    /**
     * fix_js_CheckPair
     *
     * @param xxx $str (passed by reference)
     * @param xxx $start
     * @param xxx $length
     * @todo Finish documenting this function
     */
    public function fix_js_CheckPair(&$str, $start, $length)  {
        $this->fix_js_CheckPair_JMemori($str, $start, $length);
    }

    /**
     * get_stop_function_name
     *
     * @return xxx
     * @todo Finish documenting this function
     */
    public function get_stop_function_name()  {
        return 'CheckPair';
    }

    /**
     * get_stop_function_search
     *
     * @return xxx
     * @todo Finish documenting this function
     */
    public function get_stop_function_search()  {
        return '/\s*if \((Pairs == F\.length)\)({.*?)setTimeout.*?}/s';
    }

    /**
     * get_stop_function_args
     *
     * @return xxx
     * @todo Finish documenting this function
     */
    public function get_stop_function_args()  {
        // the arguments required by CheckPair
        return '-1,'.mod_taskchain::STATUS_ABANDONED;
    }

    /**
     * get_stop_function_intercept
     *
     * @return xxx
     * @todo Finish documenting this function
     */
    public function get_stop_function_intercept()  {
        return "\n"
            ."	// intercept this Check\n"
            ."	if (id>=0) HP.onclickCheck(id);\n"
        ;
    }
}
