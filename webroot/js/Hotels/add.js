$(document).ready(function () {
    // The path to action from CakePHP is in urlToLinkedListFilter 
    $('#pays-code').on('change', function () {
        var paysCode = $(this).val();
        if (paysCode) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'pays_code=' + paysCode,
                success: function (villes) {
                    $select = $('#hotel-ville');
                    $select.find('option').remove();
                    $.each(villes, function (key, value)
                    {
                        $.each(value, function (childKey, childValue) {
                            $select.append('<option value=' + childValue.id + '>' + childValue.nom + '</option>');
                        });
                    });
                }
            });
        } else {
            $('#hotel-ville').html('<option value="">Select Country first</option>');
        }
    });
});


