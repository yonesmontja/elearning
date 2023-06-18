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
 * This file defines the Estonian(V4.1) keyboard layout.
 *
 * @package    mod_mootyper
 * @copyright  2016 onwards AL Rachels (drachels@drachels.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
 require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/config.php');
 require_login($course, true, $cm);
?>
<div id="innerKeyboard" style="margin: 0px auto;display: inline-block;
<?php
echo (isset($displaynone) && ($displaynone == true)) ? 'display:none;' : '';
?>
">
<div id="keyboard" class="keyboardback">Estonian(V4) Keyboard Layout<br>
    <section>
        <div class="mtrow" style='float: left; margin-left:5px; font-size: 15px !important; line-height: 15px'>
            <div id="jkeytilde" class="normal" style="text-align:left; color:red">~<br>ˇ</div>
            <div id="jkey1" class="normal" style='text-align:left;'>!<br>1</div>
            <div id="jkey2" class="normal" style='text-align:left;'>"<br>2
                <span style="color:blue">&nbsp;@</span></div>
            <div id="jkey3" class="normal" style='text-align:left;'>#<br>3
                <span style="color:blue">&nbsp;&nbsp;&nbsp;£</span></div>
            <div id="jkey4" class="normal" style='text-align:left;'>¤<br>4
                <span style="color:blue">&nbsp;&nbsp;&nbsp;$</span></div>
            <div id="jkey5" class="normal" style='text-align:left;'>%<br>5
                <span style="color:blue">&nbsp;&nbsp;&nbsp;€</span></div>
            <div id="jkey6" class="normal" style='text-align:left;'>&amp;<br>6</div>
            <div id="jkey7" class="normal" style='text-align:left;'>/<br>7
                <span style="color:blue">&nbsp;&nbsp;&nbsp;{</span></div>
            <div id="jkey8" class="normal" style='text-align:left;'>(<br>8
                <span style="color:blue">&nbsp;&nbsp;&nbsp;[</span></div>
            <div id="jkey9" class="normal" style='text-align:left;'>)<br>9
                <span style="color:blue">&nbsp;&nbsp;&nbsp;]</span></div>
            <div id="jkey0" class="normal" style='text-align:left;'>=<br>0
                <span style="color:blue">&nbsp;&nbsp;&nbsp;}</span></div>
            <div id="jkeyplus" class="normal" style='text-align:left;'>?<br>+
                <span style="color:blue">&nbsp;&nbsp;&nbsp;\</span></div>
            <div id="jkeyaccent" class="normal" style='text-align:left; color:red'>`<br>´</div>
            <div id="jkeybackspace" class="normal" style="width: 95px;">Backspace</div>
        </div>
    <div style="float: left;">
        <div class="mtrow" style='float: left; margin-left:5px; font-size: 15px !important; line-height: 15px'>
            <div id="jkeytab" class="normal" style="width: 60px;">Tab</div>
            <div id="jkeyq" class="normal" style='text-align:left;'>Q<br>&nbsp; &nbsp; &nbsp;</div>
            <div id="jkeyw" class="normal" style='text-align:left;'>W<br>&nbsp; &nbsp; &nbsp;</div>
            <div id="jkeye" class="normal" style='text-align:left;'>E<br>
                <span style="color:blue">&nbsp; &nbsp; &nbsp;€</span></div>
            <div id="jkeyr" class="normal" style='text-align:left;'>R<br>&nbsp; &nbsp; &nbsp;</div>
            <div id="jkeyt" class="normal" style='text-align:left;'>T<br>&nbsp; &nbsp; &nbsp;</div>
            <div id="jkeyy" class="normal" style='text-align:left;'>Y<br>&nbsp; &nbsp; &nbsp;</div>
            <div id="jkeyu" class="normal" style='text-align:left;'>U<br>&nbsp; &nbsp; &nbsp;</div>
            <div id="jkeyi" class="normal" style='text-align:left;'>I<br>&nbsp; &nbsp; &nbsp;</div>
            <div id="jkeyo" class="normal" style='text-align:left;'>O<br>&nbsp; &nbsp; &nbsp;</div>
            <div id="jkeyp" class="normal" style='text-align:left;'>P<br>&nbsp; &nbsp; &nbsp;</div>
            <div id="jkeyü" class="normal" style='text-align:left;'>Ü<br>&nbsp; &nbsp; &nbsp;</div>
            <div id="jkeyõ" class="normal" style='text-align:left;'>Õ<br>
                <span style="color:blue">&nbsp; &nbsp; &nbsp;§</span></div>
        </div>
        <div id="jkeyenter" class="normal" style="width: 50px; margin-right:5px; float: right; height: 85px;">Enter</div>
        <div class="mtrow" style='float: left; margin-left:5px; font-size: 15px !important; line-height: 15px'>
            <div id="jkeycaps" class="normal" style="width: 80px;">C.lock</div>
            <div id="jkeya" class="finger4" style='text-align:left;'>A<br>&nbsp; &nbsp; &nbsp;</div>
            <div id="jkeys" class="finger3" style='text-align:left;'>S<br>
                <span style="color:blue">&nbsp; &nbsp; &nbsp;š</span></div>
            <div id="jkeyd" class="finger2" style='text-align:left;'>D<br>&nbsp; &nbsp; &nbsp;</div>
            <div id="jkeyf" class="finger1" style='text-align:left;'>F<br>&nbsp; &nbsp; &nbsp;</div>
            <div id="jkeyg" class="normal" style='text-align:left;'>G<br>&nbsp; &nbsp; &nbsp;</div>
            <div id="jkeyh" class="normal" style='text-align:left;'>H<br>&nbsp; &nbsp; &nbsp;</div>
            <div id="jkeyj" class="finger1" style='text-align:left;'>J<br>&nbsp; &nbsp; &nbsp;</div>
            <div id="jkeyk" class="finger2" style='text-align:left;'>K<br>&nbsp; &nbsp; &nbsp;</div>
            <div id="jkeyl" class="finger3" style='text-align:left;'>L<br>&nbsp; &nbsp; &nbsp;</div>
            <div id="jkeyö" class="finger4" style='text-align:left;'>Ö<br>&nbsp; &nbsp; &nbsp;</div>
            <div id="jkeyä" class="normal" style='text-align:left;'>Ä<br>
                <span style="color:blue">&nbsp; &nbsp; &nbsp;^</span></div>
            <div id="jkeyapostrophe" class="normal" style='text-align:left;'>*<br>'
                <span style="color:blue">&nbsp;&nbsp;½</span></div>
        </div>
    </div>

        <div class="mtrow" style='float: left; margin-left:5px; font-size: 15px !important; line-height: 15px'>
            <div id="jkeyshiftl" class="normal" style="width: 70px;">Shift</div>
            <div id="jkeyckck" class="normal"  style='text-align:left;'>&gt;<br>&lt;
                <span style="color:blue">&nbsp;&nbsp;&nbsp;|</span></div>
            <div id="jkeyz" class="normal" style='text-align:left;'>Z<br>
                <span style="color:blue">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ž</span></div>
            <div id="jkeyx" class="normal" style='text-align:left;'>X<br>&nbsp; &nbsp; &nbsp;</div>
            <div id="jkeyc" class="normal" style='text-align:left;'>C<br>&nbsp; &nbsp; &nbsp;</div>
            <div id="jkeyv" class="normal" style='text-align:left;'>V<br>&nbsp; &nbsp; &nbsp;</div>
            <div id="jkeyb" class="normal" style='text-align:left;'>B<br>&nbsp; &nbsp; &nbsp;</div>
            <div id="jkeyn" class="normal" style='text-align:left;'>N<br>&nbsp; &nbsp; &nbsp;</div>
            <div id="jkeym" class="normal" style='text-align:left;'>M<br>&nbsp; &nbsp; &nbsp;</div>
            <div id="jkeycomma" class="normal"  style='text-align:left;'>;<br>,</div>
            <div id="jkeyperiod" class="normal"  style='text-align:left;'>:<br>.</div>
            <div id="jkeyminus" class="normal"  style='text-align:left;'>_<br>-</div>
            <div id="jkeyshiftd" class="normal" style="width: 105px; border-right-style: solid;">Shift</div>
        </div>
        <div class="mtrow" style='float: left; margin-left:5px; font-size: 15px !important; line-height: 15px'>
            <div id="jkeyctrll" class="normal" style="width: 60px;">Ctrl</div>
            <div id="jkeyfn" class="normal" style="width: 50px;">Win</div>
            <div id="jkeyalt" class="normal" style="width: 50px;">Alt</div>
            <div id="jkeyspace" class="normal" style="width: 245px;">Space</div>
            <div id="jkeyaltgr" class="normal" style="color:blue; width: 50px;">Alt Gr</div>
            <div id="jkeyfn" class="normal" style="width: 50px;">Win</div>
            <div id="jempty" class="normal" style="width: 50px;">Menu</div>
            <div id="jkeyctrlr" class="normal" style="width: 60px; border-right-style: solid;">Ctrl</div><br>
        </div>
    </section>
</div>
</div>
