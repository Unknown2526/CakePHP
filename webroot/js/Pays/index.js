function getPays() {
    $.ajax({
        type: 'GET',
        url: urlToRestApi,
        dataType: "json",
        success:
                function (pays) {
                    var paysTable = $('#paysData');
                    paysTable.empty();
                    var count = 1;
                    $.each(pays.data, function (key, value)
                    {
                        var editDeleteButtons = '</td><td>' +
                                '<a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editPays(' + value.pays_code + ')"></a>' +
                                '<a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete data?\') ? paysAction(\'delete\', ' + value.pays_code + ') : false;"></a>' +
                                '</td></tr>';
                        paysTable.append('<tr><td>' + count + '</td><td>' + value.pays_nom + '</td><td>' + value.pays_devise + editDeleteButtons);
                        count++;
                    });

                }
    });
}

/* Function takes a jquery form
 and converts it to a JSON dictionary */
function convertFormToJSON(form) {
    var array = $(form).serializeArray();
    var json = {};

    $.each(array, function () {
        json[this.name] = this.value || '';
    });

    return json;
}

/*
 $('#paysAddForm').submit(function (e) {
 e.preventDefault();
 var data = convertFormToJSON($(this));
 alert(data);
 console.log(data);
 });
 */

function paysAction(type, id) {
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = {add: "added", edit: "updated", delete: "deleted"};
    var requestType = '';
    var paysData = '';
    var ajaxUrl = urlToRestApi;
    if (type == 'add') {
        requestType = 'POST';
        paysData = convertFormToJSON($("#addForm").find('.form'));
    } else if (type == 'edit') {
        ajaxUrl = ajaxUrl + "/" + pays_codeEdit.value;
        requestType = 'PUT';
        paysData = convertFormToJSON($("#editForm").find('.form'));
    } else {
        requestType = 'DELETE';
        ajaxUrl = ajaxUrl + "/" + id;
    }
    $.ajax({
        type: requestType,
        headers: {
            'X-CSRF-Token': token
        },
        url: ajaxUrl,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(paysData),
        success: function (msg) {
            if (msg) {
                alert('Pays data has been ' + statusArr[type] + ' successfully.');
                getPays();
                $('.form')[0].reset();
                $('.formData').slideUp();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}

/*** à déboguer ... ***/
function editPays(id) {
    $.ajax({
        type: 'GET',
        dataType: 'JSON',
        url: urlToRestApi+ "/" + id,
        success: function (data) {
            $('#pays_codeEdit').val(data.data.pays_code);
            $('#pays_nomEdit').val(data.data.pays_nom);
            $('#pays_deviseEdit').val(data.data.pays_devise);
            $('#editForm').slideDown();
        }
    });
}