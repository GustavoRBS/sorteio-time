$(document).ready(function () {
    var formCounter = 0;

    $('#addFormButton').click(function () {
        formCounter++;
        var newForm = $('#formTemplate').clone().removeAttr('id').show();

        newForm.find('input, select, textarea', 'label').each(function () {
            if ($(this).attr('type') !== 'radio') {
                $(this).val('');
            } else {
                var originalName = $(this).attr('name');
                var newName = originalName.replace('_0', '_' + formCounter);
                $(this).attr('name', newName);

                var originalNameId = $(this).attr('id');
                var newNameId = originalNameId + '_' + formCounter;
                $(this).attr('id', newNameId);

                newForm.find('label[for="' + originalNameId + '"]').attr('for', newNameId);
            }
        });

        $('#count_activities').val(formCounter);

        newForm.append('<button class="removeFormButton btn btn-danger text-white">Remover</button><div class="mb-3"></div><div class="col-12 col-md-12 col-lg-12"><hr></div>');
        $('#formContainer').append(newForm);
    });

    $('#formContainer').on('click', '.removeFormButton', function () {
        $(this).parent().remove();
        formCounter--;
        $('#count_activities').val(formCounter);
    });
});