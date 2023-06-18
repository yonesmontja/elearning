// JavaScript Document.

// Parse Percentage.

// Delete all the stuff between two percentage values.
function deleteInbetweenPercentages(string) {
    return deleteTillChar(string, '~');
}

// Print percentage.
function percentOutput(string) {
    var temp = string;

    if (typeof(temp) != 'undefined') {
        if (temp.charAt(0) == '%') {
            // Percentage given.
            temp = deleteTillChar(temp, '%');
            temp = deleteAfterString(temp, '%');

            if (typeof(temp) != 'undefined') {
                 return temp;
            }
        } else if (temp.charAt(0) == '=') {
            // Comment flat 100.
            return '100';
        } else {
            // Percentage not given, so it's zero.
            return '0';
        }
    }
}

// This function will retrieve a percentage value.
function getPercentage(string, count) {
    var temp = string;

    temp = getAnswerCode(temp);

    for (var i = 1; i <= countAnswers(); i++) {
        if (i == count) {
            if (typeof(temp) == 'string') {
                return percentOutput(temp);
            } else {
                return '';
            }
        } else {
            temp = deleteInbetweenPercentages(temp);
        }
    }
}
