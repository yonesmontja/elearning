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
 * Renderer module for the learningmap.
 *
 * @module     mod_learningmap/renderer
 * @copyright  2023 ISB Bayern
 * @author     Philipp Memmel
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
import Ajax from 'core/ajax';
import Log from 'core/log';
import Pending from 'core/pending';

export const selectors = {
    LEARNINGMAP_RENDER_CONTAINER_PREFIX: 'learningmap-render-container-'
};

/**
 * Renders the learningmap into the correct div.
 *
 * @param {number} cmId the course module id of the learningmap
 */
export const init = (cmId) => {
    const rendererPendingPromise = new Pending('mod_learningmap/renderer-' + cmId);
    renderLearningmap(cmId);
    rendererPendingPromise.resolve();
};

/**
 * Render the learningmap with the given cmId into the corresponding div in the DOM.
 *
 * @param {number} cmId the course module id of the learningmap
 */
export const renderLearningmap = (cmId) => {
    const promises = Ajax.call(
        [
            {
                methodname: 'mod_learningmap_get_learningmap',
                args: {
                    'cmId': cmId
                }
            }
        ]);

    promises[0].then(data => {
        const targetDiv = document.getElementById(selectors.LEARNINGMAP_RENDER_CONTAINER_PREFIX + cmId);
        targetDiv.innerHTML = data.content;
        return true;
    }).catch((error) => {
        Log.error(error);
        return false;
    });
};
