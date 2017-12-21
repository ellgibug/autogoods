$(document).ready(function () {

    /*------------------Начало Гараж-----------------------------*/

    ////----- Open the modal to CREATE a car -----////
    $('#btn-add').click(function () {
        $('#model').prop( "disabled", true );
        $('#modification').prop( "disabled", true );
        $('#btn-save').val("add");
        $('#modalFormData').trigger("reset");
        $('#carEditorModal').modal('show');
    });

    ////----- Open the modal to UPDATE a car -----////
    $('body').on('click', '.open-modal', function () {
        var car_id = $(this).val();
        $.get('cars/' + car_id, function (data) {
            $('#car_id').val(data.id);
            $('#brand').val(data.brand);
            $('#model').append('<option value="'+data.model+'">'+data.model+'</option>');
            $('#modification').val(data.modification);
            data.filter ? $('#filter').prop( "checked", true ) : $('#filter').prop( "checked", false );
            $('#btn-save').val("update");
            $('#carEditorModal').modal('show');
        })
    });

    // загружаю модели по брэнду
    $("#brand").click(function () {

        $('#model').removeAttr("disabled");
        $('#model').children().remove();

        $.ajax({
            type: "GET",
            url: 'home',
            data:{
                'brand':$(this).val(),
            },
            success: function(data)
            {
                data.forEach(function(item) {
                    $('#model').append('<option value="'+item+'">'+item+'</option>');
                });
            }
        });
    });

    // также должно быть и для модификации, но пока этого нет. просто убираю атрибут disabled
    $("#brand").click(function () {
        if($(this).val()) {
            $('#modification').removeAttr("disabled");
        }
    });

    // Clicking the save button on the open modal for both CREATE and UPDATE
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            brand: $('#brand').val(),
            model: $('#model').val(),
            modification: $('#modification').val(),
            filter: $('#filter').is(':checked') ? $('#filter').val() : 0
        };
        var state = $('#btn-save').val();
        var type = "POST";
        var car_id = $('#car_id').val();
        var ajaxurl = 'cars';
        if (state == "update") {
            type = "PUT";
            ajaxurl = 'cars/' + car_id;
        }
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var car = '<tr id="car' + data.id + '"><td>' + data.filter + '</td><td>' + data.brand + '</td><td>' + data.model + '</td><td>' + data.modification + '</td>';
                car += '<td><button class="btn btn-info open-modal" value="' + data.id + '">Изменить</button> ';
                car += '<button class="btn btn-danger delete-car" value="' + data.id + '">Удалить</button></td></tr>';
                if (state == "add") {
                    $('#cars-list').append(car);
                } else {
                    $("#car" + car_id).replaceWith(car);
                }
                $('#modalFormData').trigger("reset");
                $('#carEditorModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    ////----- DELETE a car and remove from the page -----////
    $('.delete-car').click(function () {
        var car_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: 'cars/' + car_id,
            success: function (data) {
                console.log(data);
                $("#car" + car_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


    /*------------------Конец Гараж-----------------------------*/
});