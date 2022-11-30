var surver_options = document.getElementById('survey_options');
var add_more_fields = document.getElementById('add_more_fields');
var remove_fields = document.getElementById('remove_fields');

add_more_fields.onclick = function () {
    var newField = document.createElement('input');
    newField.setAttribute('type', 'file');
    newField.setAttribute('name', 'foto');
    newField.setAttribute('class', 'custom-checkbox');
    newField.setAttribute('size', 50);

    newField.setAttribute('type', 'text');
    newField.setAttribute('name', 'desc');
    newField.setAttribute('class', 'custom-checkbox');
    newField.setAttribute('size', 50);

    custom - checkbox.appendChild(newField);
}

remove_fields.onclick = function () {
    var input_tags = custom - checkbox.getElementsByTagName('input');
    if (input_tags.length > 0) {
        custom - checkbox.removeChild(input_tags[(input_tags.length) - 1]);
    }
}