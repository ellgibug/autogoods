$(document).ready(function () {

    /*------------------Начало Гараж-----------------------------*/

    ////----- Open the modal to CREATE a car -----////
    $('#btn-add').click(function () {
        $('#manufacturer').show();
        $('#model').show().prop( "disabled", true );
        $('#modification').show().prop( "disabled", true );
        $('#manufacturer_db').toggleClass('hide');
        $('#model_db').toggleClass('hide');
        $('#modification_db').toggleClass('hide');
        $('#btn-save').val("add");
        $('#modalFormData').trigger("reset");
        $('#carEditorModal').modal('show');
    });

    ////----- Open the modal to UPDATE a car -----////
    $('body').on('click', '.open-modal', function () {
        var car_id = $(this).val();
        $.get('cars/' + car_id, function (data) {
            console.log(data);
            $('#car_id').val(data.id);
            // $('#manufacturer').append('<option value="'+data.manufacturer_id+'">'+data.manufacturer_name+'</option>');
            // $('#model').append('<option value="'+data.model_id+'">'+data.model_name+'</option>');
            // $('#modification').append('<option value="'+data.modification_id+'">'+data.modification_name+'</option>');
            $('#manufacturer').hide();
            $('#model').hide();
            $('#modification').hide();
            $('#manufacturer_db').removeClass('hide').text(data.manufacturer_name);
            $('#model_db').removeClass('hide').text(data.model_name);
            $('#modification_db').removeClass('hide').text(data.modification_name);
            data.filter ? $('#filter').prop( "checked", true ) : $('#filter').prop( "checked", false );
            $('#btn-save').val("update");
            $('#carEditorModal').modal('show');
        })
    });

    // загружаю модели по брэнду
    $("#manufacturer").click(function () {

        $('#model').removeAttr("disabled").children().remove();

        var attr = $('#modification').attr('disabled');
        if (typeof attr !== typeof undefined && attr !== false){
            $('#modification').children().remove();
        }

        $.ajax({
            type: "GET",
            url: "/home",
            data:{
                'manufacturer_id':$(this).val()
            },
            success: function(data)
            {
                console.log(data);
                data.forEach(function(item) {
                    $('#model').append('<option value="'+item.id+'">'+item.name+'</option>');
                });
            }
        });
    });

    // также должно быть и для модификации, но пока этого нет. просто убираю атрибут disabled
    $("#model").click(function () {

        $('#modification').removeAttr("disabled").children().remove();

        $.ajax({
            type: "GET",
            url: "/home",
            data:{
                'manufacturer_id':$('#manufacturer').val(),
                'model_id':$(this).val()
            },
            success: function(data)
            {
                console.log(data);
                data.forEach(function(item) {
                    $('#modification').append('<option value="'+item.id+'">'+item.name+'</option>');
                });
            },
        });
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
            manufacturer_id: $('#manufacturer').val(),
            manufacturer_name: $('#manufacturer option:selected').text(),
            model_id: $('#model').val(),
            model_name: $('#model option:selected').text(),
            modification_id: $('#modification').val(),
            modification_name: $('#modification option:selected').text(),
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
                console.log(data);
                var car = '<tr id="car' + data.id + '"><td>' + data.filter + '</td><td>' + data.manufacturer_name + '</td><td>' + data.model_name + '</td><td>' + data.modification_name + '</td>';
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