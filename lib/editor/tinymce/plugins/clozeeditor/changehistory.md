# CHANGE HISTORY
## TODO
(190 errors/235 warnings) => phplint (0/0), phpcs (0/0), js (185/234), css (1/0), phpdoc (3/0), savepoint (0/0), thirdparty (0/0), grunt (1/1), shifter (0/0), mustache (0/0), 

## 05 March 2022
* tested OK with Moodle 4.0beta (Build: 20220303)
* 
## 04 November 2020
* tested OK with Moodle 3.10beta+ (Build: 20201103)


## 01 April 2020. v3.8r05
* Started to fix warnings reported by Moodle plugins database report.
* Package tiny_mce is not valid

## 01 April 2020. v3.8r02
* Started to fix warnings reported by Moodle plugins database report.
* Simple update date and version.

## 27 December 2019. v3.8r1
* Started to fix warnings reported by Moodle plugins database report.
* Started with file dialog.php by splitting two very long lines

## 14 January 2019. v3.5r7
* Started to fix warnings reported by Moodle code checker plugin in JS files
* Managed to fix all warnings except for two where Line exceeds 132 characters:

lib\editor\tinymce\plugins\clozeeditor\dialog.php
    #66: ············<option·value="SHORTANSWER_C"><?php·echo·get_string('shortanswer',·'quiz')."·(".get_string('casesensitive',·'quiz').")";·?></option>
Line exceeds 132 characters; contains 144 characters
    
#90: ··<input·type="button"·name="addline"····value="<?php·echo·get_string('addfields',·'form',·1);·?>"·onclick="addRow('main_table');"·style="margin-top:·5px;·"·/>
Line exceeds 132 characters; contains 159 characters

## 05 September 2018. v3.5r5

### possible important changes in 
* tinymce/editor_plugin.js - restored file from moodle.com
* dialog.css - restored file from moodle.com
* version.php - Version and release changed

## 05 September 2018. v3.5r4
### minor changes in:
* encode.js - Comments should start with Uppercase
* parse.js - space in line before var noStrings = "";
* parseAnswer.js - Comments should start with Uppercase
* parseFeedback.js - Comments should start with Uppercase
* parseHelper.js - Comments should start with Uppercase
* parsePercentaje.js - Comments should start with Uppercase
* popup.js - Comments should start with Uppercase
* changehistory.md - THIS FILE
* dialog.php  * @package    tinymce_colzeeditor  made * @package    tinymce_clozeeditor
* version.php - Version and release changed

### possible important changes in 
* tinymce/editor_plugin.js - spaces between key and : character
* dialog.css many spaces in many places and some : characters at end of line


## 09 June 2018. 1.0
* Add privacy plugin data
* Increased window width (was 490) to 620 pixels
* Fixed all errors reported by the Moodle code checker plugin: 
  replaced tabs with spaces, 
  removed extra spaces at end of line, 
  added some needed spaces for indentation,
  added some braces in order to fix inline control errors
* Changed version numbering to 3.5r1 to reflect that 
  now it is compatable with Moodle 3.5 branch and that this is minor version 1
 
* (Hopefully) Fixed some phpdocs problems detected in the code by local_moodlecheck
* (Hopefully) Fixed most CSS problems detected by stylelint
 
* Previous version had (212 errors/353 warnings)
  => phplint (0/0), phpcs (0/53), 
  js (187/299), 
  css (9/0), 
  phpdoc (15/0), savepoint (0/0), thirdparty (0/0), 
  grunt (1/1), shifter (0/0), mustache (0/0),

* PHPDocs style problems (15 errors, 0 warnings)
* This section shows the phpdocs problems detected in the code by local_moodlecheck [More info]

* lib/editor/tinymce/plugins/clozeeditor/classes/privacy/provider.php
(#23) File-level phpdocs block is not found
(#25) Class provider is not documented
(#34) Function provider::_get_reason is not documented
(#19) Invalid inline phpdocs tag @package found
(#20) Invalid inline phpdocs tag @copyright found
(#21) Invalid inline phpdocs tag @license found
(#32) Invalid inline phpdocs tag @return found
(#25) Package is not specified for class provider. It is also not specified in file-level phpdocs

* lib/editor/tinymce/plugins/clozeeditor/dialog.php
(#17) File-level phpdocs block is not found
* lib/editor/tinymce/plugins/clozeeditor/lang/en/tinymce_clozeeditor.php
(#16) No one-line description found in phpdocs for file
(#19) Package tiny_mce is not valid
* lib/editor/tinymce/plugins/clozeeditor/lib.php
(#17) File-level phpdocs block is not found
(#32) Function tinymce_clozeeditor::update_init_params is not documented
(#23) Package tiny_mce is not valid
* lib/editor/tinymce/plugins/clozeeditor/version.php
(#19) Package tiny_mce is not valid

* CSS problems (9 errors, 0 warnings)
* This section shows CSS problems detected by stylelint [More info]

* lib/editor/tinymce/plugins/clozeeditor/dialog.css
(#6) Expected single space before "{" (block-opening-brace-space-before)
(#11) Expected a trailing semicolon (declaration-block-trailing-semicolon)
(#2) Expected indentation of 4 spaces (indentation)
(#3) Expected indentation of 4 spaces (indentation)
(#7) Expected indentation of 4 spaces (indentation)
(#15) Expected indentation of 4 spaces (indentation)
(#19) Expected indentation of 4 spaces (indentation)
(#20) Expected indentation of 4 spaces (indentation)
(#19) Unexpected unit "pt" (unit-blacklist)
