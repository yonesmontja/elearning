/**
 * @fileOverview Arabic(V4)dual keyboard driver.
 * @author <a href="mailto:drachels@drachels.com">AL Rachels</a>
 * @version 4.0
 * @since 06/29/2018
 */

/**
 * Check for combined character.
 * @param {string} chr The combined character.
 * @returns {string} The character.
 */
function isCombined(chr) {
    return false;
}

/**
 * Process keyup for combined character.
 * @param {string} e The combined character.
 * @returns {bolean} The result.
 */
function keyupCombined(e) {
    return false;
}

/**
 * Process keyupFirst.
 * @param {string} event Type of event.
 * @returns {bolean} The event.
 */
function keyupFirst(event) {
    return false;
}

/**
 * Check for character typed so flags can be set.
 * @param {string} ltr The current letter.
 */
function keyboardElement(ltr) {
    this.chr = ltr.toUpperCase();
    this.alt = false;
    // @codingStandardsIgnoreLine
    if (ltr.match(/[ّّ ّ !@#$%^&*)(_+ ]/i)) {
        this.shift = true;
        this.alt = false;
    // @codingStandardsIgnoreLine
    } else if (ltr.match(/[ ةىلارؤءئزولاظيبلاتنمكطسشغعهخحجد\\فقثصضذ12ذ1234567890\-=ذ ]/)) {
        this.shift = false;
        this.alt = false;
    } else if (isLetter(ltr)) {
        this.shift = ltr.toUpperCase() === ltr;
    } else {
        this.shift = false;
    }

    this.turnOn = function() {
        if (isLetter(this.chr)) {
            document.getElementById(getKeyID(this.chr)).className = "next" + thenFinger(this.chr.toUpperCase());
        } else if (this.chr === ' ') {
            document.getElementById(getKeyID(this.chr)).className = "nextSpace";
        } else {
            document.getElementById(getKeyID(this.chr)).className = "next" + thenFinger(this.chr.toUpperCase());
        }
        if (this.chr === '\n' || this.chr === '\r\n' || this.chr === '\n\r' || this.chr === '\r') {
            document.getElementById('jkeyenter').className = "next4";
        }
        if (this.shift) {
            document.getElementById('jkeyshiftd').className = "next4";
            document.getElementById('jkeyshiftl').className = "next4";
        }
        if (this.alt) {
            document.getElementById('jkeyaltgr').className = "nextSpace";
        }
    };
    this.turnOff = function() {
        if (isLetter(this.chr)) {
        // @codingStandardsIgnoreLine
            if (this.chr.match(/[شسيبتنمك]/i)) {
                document.getElementById(getKeyID(this.chr)).className = "finger" + thenFinger(this.chr.toUpperCase());
            } else {
                document.getElementById(getKeyID(this.chr)).className = "normal";
            }
        } else {
            document.getElementById(getKeyID(this.chr)).className = "normal";
        }
        if (this.chr === '\n' || this.chr === '\r\n' || this.chr === '\n\r' || this.chr === '\r') {
            document.getElementById('jkeyenter').classname = "normal";
        }
        if (this.shift) {
            document.getElementById('jkeyshiftd').className = "normal";
            document.getElementById('jkeyshiftl').className = "normal";
        }
        if (this.alt) {
            document.getElementById('jkeyaltgr').className = "normal";
        }
    };
}

/**
 * Set color flag based on current character.
 * @param {string} tCrka The current character.
 * @returns {number}.
 */
function thenFinger(tCrka) {
    if (tCrka === ' ') {
        return 5; // Highlight the spacebar.
    // @codingStandardsIgnoreLine
    } else if (tCrka.match(/[َ (_+شذ1ضشئّ !َ ِ ~ِ ذ90\-=ضش!ئحكظجطد\\|><؛]/i)) {
        return 4; // Highlight the correct key above in red.
    // @codingStandardsIgnoreLine
    } else if (tCrka.match(/[)@2صسء9خمز×]/i)) {
        return 3; // Highlight the correct key above in green.
    // @codingStandardsIgnoreLine
    } else if (tCrka.match(/[*#3ثيؤ8هنو÷]/i)) {
        return 2; // Highlight the correct key above in yellow.
    // @codingStandardsIgnoreLine
    } else if (tCrka.match(/[$4قبرٌ[{%5فللالإلألآ^6غاىإأآ&7عتة‘ـ’]/i)) {
        return 1; // Highlight the correct key above in blue.
    } else {
        return 6; // Do not change any highlight.
    }
}

/**
 * Get ID of key to highlight based on current character.
 * @param {string} tCrka The current character.
 * @returns {string}.
 */
function getKeyID(tCrka) {
    if (tCrka === ' ') {
        return "jkeyspace";
    } else if (tCrka === 'ّ ' || tCrka === 'ذ') {
        return "jkeyr10";
    } else if (tCrka === '\n') {
        return "jkeyenter";
    } else if (tCrka === '!') {
        return "jkey1";
    } else if (tCrka === '@') {
        return "jkey2";
    } else if (tCrka === '#') {
        return "jkey3";
    } else if (tCrka === '$') {
        return "jkey4";
    } else if (tCrka === '%') {
        return "jkey5";
    } else if (tCrka === '^') {
        return "jkey6";
    } else if (tCrka === '&') {
        return "jkey7";
    } else if (tCrka === '*') {
        return "jkey8";
    } else if (tCrka === ')') {
        return "jkey9";
    } else if (tCrka === '(') {
        return "jkey0";
    } else if (tCrka === '-' || tCrka === '_') {
        return "jkeyminus";
    } else if (tCrka === '=' || tCrka === '+') {
        return "jkeyequals";
    } else if (tCrka === 'َ ' || tCrka === 'ض') {
        return "jkeyQ";
    } else if (tCrka === "ً " || tCrka === 'ص') {
        return "jkeyW";
    } else if (tCrka === 'ُ ' || tCrka === 'ث') {
        return "jkeyE";
    } else if (tCrka === 'ٌ ' || tCrka === 'ق') {
        return "jkeyR";
    } else if (tCrka === 'لإ' || tCrka === 'ف') {
        return "jkeyT";
    } else if (tCrka === 'إ' || tCrka === 'غ') {
        return "jkeyY";
    } else if (tCrka === '‘' || tCrka === 'ع') {
        return "jkeyU";
    } else if (tCrka === '÷' || tCrka === 'ه') {
        return "jkeyI";
    } else if (tCrka === '×' || tCrka === 'خ') {
        return "jkeyO";
    } else if (tCrka === '؛' || tCrka === 'ح') {
        return "jkeyP";
    } else if (tCrka === '<' || tCrka === 'ج') {
        return "jkeyج";
    } else if (tCrka === '>' || tCrka === 'د') {
        return "jkeyد";
    } else if (tCrka === "\\" || tCrka === '|') {
        return "jkeybackslash";
    } else if (tCrka === 'ِ ' || tCrka === 'ش') {
        return "jkeyA";
    } else if (tCrka === 'ٍ ' || tCrka === 'س') {
        return "jkeyS";
    } else if (tCrka === ']' || tCrka === 'ي') {
        return "jkeyD";
    } else if (tCrka === '[' || tCrka === 'ب') {
        return "jkeyF";
    } else if (tCrka === 'لأ' || tCrka === 'ل') {
        return "jkeyG";
    } else if (tCrka === 'أ' || tCrka === 'ا') {
        return "jkeyH";
    } else if (tCrka === 'ـ' || tCrka === 'ت') {
        return "jkeyJ";
    } else if (tCrka === '،' || tCrka === 'ن') {
        return "jkeyK";
    } else if (tCrka === '/' || tCrka === 'م') {
        return "jkeyL";
    } else if (tCrka === ':' || tCrka === 'ك') {
        return "jkeyك";
    } else if (tCrka === '"' || tCrka === 'ط') {
        return "jkeyط";
    } else if (tCrka === '~' || tCrka === 'ئ') {
        return "jkeyZ";
    } else if (tCrka === 'ْ ' || tCrka === 'ء') {
        return "jkeyX";
    } else if (tCrka === '}' || tCrka === 'ؤ') {
        return "jkeyC";
    } else if (tCrka === '{' || tCrka === 'ر') {
        return "jkeyV";
    } else if (tCrka === 'لآ' || tCrka === 'لا') {
        return "jkeyB";
    } else if (tCrka === 'آ' || tCrka === 'ى') {
        return "jkeyN";
    } else if (tCrka === '’' || tCrka === 'ة') {
        return "jkeyM";
    } else if (tCrka === ',' || tCrka === 'و') {
        return "jkeyو";
    } else if (tCrka === '.' || tCrka === 'ز') {
        return "jkeyز";
    } else if (tCrka === '؟' || tCrka === 'ظ') {
        return "jkeyظ";
    } else {
        return "jkey" + tCrka;
    }
}

/**
 * Is the typed letter part of the current alphabet.
 * @param {string} str The current letter.
 * @returns {(number|Array)}.
 */
function isLetter(str) {
    return str.length === 1 && str.match(/[!-ﻼ]/i);
}
