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
 * The admin interface for the offlinequiz evaluation cronjob.
 *
 * @package       report_offlinequizcron
 * @author        Juergen Zimmer
 * @author        Thomas Wedekind
 * @copyright     2013 The University of Vienna
 * @since         Moodle 2.5.3
 * @license       http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 **/

defined('MOODLE_INTERNAL') || die;

$plugin->version   = 2021051900;                 // The current plugin version (Date: YYYYMMDDXX)
$plugin->release   = "v3.11.0";      // User-friendly version number.
$plugin->requires  = 2021050700;                 // Requires this Moodle version
$plugin->maturity  = MATURITY_STABLE;
$plugin->component = 'report_offlinequizcron';   // Full name of the plugin (used for diagnostics).
$plugin->dependencies = array('mod_offlinequiz' => 2019110500);
