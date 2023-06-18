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

namespace mod_learningmap;

/**
 * Unit test for mod_learningmap
 *
 * @package     mod_learningmap
 * @copyright   2021-2023, ISB Bayern
 * @author      Stefan Hanauska <stefan.hanauska@csg-in.de>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @group      mod_learningmap
 * @group      mebis
 * @covers     \mod_learningmap\mapworker
 */
class mod_learningmap_mapworker_test extends \advanced_testcase {
    /**
     * The course used for testing
     *
     * @var \stdClass
     */
    protected $course;
    /**
     * The learning map used for testing
     *
     * @var \stdClass
     */
    protected $learningmap;
    /**
     * The activities linked in the learningmap
     *
     * @var array
     */
    protected $activities;
    /**
     * The user used for testing
     *
     * @var \stdClass
     */
    protected $user1;
    /**
     * The modinfo of the course
     *
     * @var \course_modinfo|null
     */
    protected $modinfo;
    /**
     * The completion info of the course
     *
     * @var \completion_info
     */
    protected $completion;
    /**
     * The cm_info object belonging to the learning map (differs from the learningmap record)
     *
     * @var \cm_info
     */
    protected $cm;
    /**
     * Prepare testing environment
     */
    public function setUp(): void {
        global $DB;
        $this->course = $this->getDataGenerator()->create_course(['enablecompletion' => 1]);
        $this->learningmap = $this->getDataGenerator()->create_module('learningmap', [
            'course' => $this->course,
            'completion' => COMPLETION_TRACKING_AUTOMATIC,
            'completiontype' => LEARNINGMAP_NOCOMPLETION
        ]);

        $this->activities = [];
        for ($i = 0; $i < 9; $i++) {
            $this->activities[] = $this->getDataGenerator()->create_module(
                'page',
                [
                    'name' => 'A',
                    'content' => 'B',
                    'course' => $this->course,
                    'completion' => COMPLETION_TRACKING_AUTOMATIC,
                    'completionview' => COMPLETION_VIEW_REQUIRED
                ]
            );
            // The JSON contains spare course module IDs 9999x, replacing them by the real course module IDs here.
            $this->learningmap->placestore = str_replace(99990 + $i, $this->activities[$i]->cmid, $this->learningmap->placestore);
        }
        $DB->set_field('learningmap', 'placestore', $this->learningmap->placestore, ['id' => $this->learningmap->id]);

        $this->user1 = $this->getDataGenerator()->create_user(
            [
                'email' => 'user1@example.com',
                'username' => 'user1'
            ]
        );

        $this->modinfo = get_fast_modinfo($this->course, $this->user1->id);
        $this->completion = new \completion_info($this->modinfo->get_course());
        $this->cm = $this->modinfo->get_cm($this->learningmap->cmid);
    }

    /**
     * Tests slicemode
     *
     * @return void
     */
    public function test_slicemode() : void {
        $this->resetAfterTest();
        $this->setAdminUser();
        $this->setUser($this->user1);
        $placestore = json_decode($this->learningmap->placestore, true);
        $placestore['slicemode'] = true;
        $mapworker = new mapworker($this->learningmap->intro, $placestore, $this->cm, false);
        $mapworker->process_map_objects();
        // The values the overlay path description is expected to have.
        $expectedvalues = [
            'M 0 0 L 0 2111 L 800 2111 L 800 0 Z M 72 47 L 338 47 L 338 108 L 72 108 Z',
            'M 0 0 L 0 2111 L 800 2111 L 800 0 Z M 72 47 L 338 47 L 338 242 L 72 242 Z',
            'M 0 0 L 0 2111 L 800 2111 L 800 0 Z M 72 47 L 481 47 L 481 349 L 72 349 Z',
            'M 0 0 L 0 2111 L 800 2111 L 800 0 Z M 72 47 L 481 47 L 481 349 L 72 349 Z',
            'M 0 0 L 0 2111 L 800 2111 L 800 0 Z M 72 47 L 481 47 L 481 349 L 72 349 Z',
            'M 0 0 L 0 2111 L 800 2111 L 800 0 Z M 72 47 L 481 47 L 481 349 L 72 349 Z',
            'M 0 0 L 0 2111 L 800 2111 L 800 0 Z M 72 47 L 649 47 L 649 349 L 72 349 Z',
            // When all places are visible, there is no overlay anymore.
            null
        ];
        $overlay = $mapworker->get_attribute('learningmap-overlay', 'd');
        $this->assertEquals($overlay, 'M 0 0 L 0 2111 L 800 2111 L 800 0 Z M 37 12 L 137 12 L 137 112 L 37 112 Z');

        for ($i = 0; $i < 8; $i++) {
            $activitycoursemodule = $this->modinfo->get_cm($this->activities[$i]->cmid);
            $this->completion->set_module_viewed($activitycoursemodule, $this->user1->id);
            $mapworker = new mapworker($this->learningmap->intro, $placestore, $this->cm, false);
            $mapworker->process_map_objects();
            $overlay = $mapworker->get_attribute('learningmap-overlay', 'd');
            $this->assertEquals($overlay, $expectedvalues[$i]);
        }
    }
}
