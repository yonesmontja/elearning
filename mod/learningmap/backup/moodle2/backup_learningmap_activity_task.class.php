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

defined('MOODLE_INTERNAL') || die();
global $CFG;
require_once($CFG->dirroot.'/mod/learningmap/backup/moodle2/backup_learningmap_stepslib.php');

/**
 * Backup class for mod_learningmap
 *
 * @package     mod_learningmap
 * @copyright   2021-2023, ISB Bayern
 * @author      Stefan Hanauska <stefan.hanauska@csg-in.de>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class backup_learningmap_activity_task extends backup_activity_task {

    /**
     * No specific settings for this activity
     */
    protected function define_my_settings() : void {
    }

    /**
     * Defines a backup step to store the instance data in the learningmap.xml file
     */
    protected function define_my_steps() : void {
        $this->add_step(new backup_learningmap_activity_structure_step('learningmap_structure', 'learningmap.xml'));
    }

    /**
     * Encodes the links to view.php for backup
     *
     * @param string $content
     * @return string
     */
    public static function encode_content_links($content) : string {
        global $CFG;

        $base = preg_quote($CFG->wwwroot.'/mod/learningmap', '#');

        $pattern = "#(".$base."\/view.php\?id\=)([0-9]+)#";
        $content = preg_replace($pattern, '$@LEARNINGMAPVIEWBYID*$2@$', $content);
        return $content;
    }
}
