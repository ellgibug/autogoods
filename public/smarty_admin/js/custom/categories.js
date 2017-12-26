$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    console.log("ready!");
});

// function add_category(id, name) {
//     // Creating set of buttons
//     buttons_set = [
//     $('button.btn.btn-success.btn-sm#' + id)
//         .attr('data-toggle', 'collapse')
//         .attr('data-parrent', '#accordion')
//         .attr('data-target', '#Modal')
//         .attr('data-whatever', id)
//         .val('New lvl'),
//
//     $('button.btn.btn-success.btn-sm#' + id)
//         .attr('data-toggle', 'collapse')
//         .attr('data-parrent', '#accordion')
//         .attr('data-target', '#Modal')
//         .attr('data-whatever', id)
//         .val('Edit')
//     ];
//
//     var buttons = $('div.pull-right');
//
//     for (var i in buttons_set) {
//         $('div.pull-right').appendChild(i);
//     }
//
//
//     $('div.panel-group#accordion1[role="tablist"]')
//         .attr('aria-multiselectable', 'true')
//         .appendChild(
//         $('div.panel.panel-default').appendChild()


            // $('div.panel-heading.clearfix[role="tab"]#heading' + id).appendChild(
            //     // HEADER
            //     $('h4.panel-title.pull-left').appendChild(
            //         // LINK
            //         $('a.collapsed[role="button"][data-toggle~="collapse"][data-parrent~="#accordion"]')
            //             .attr('href', '#collapse' + id)
            //             .attr('aria-expanded', 'false')
            //             .attr('aria-controls', name)
            //             .val(name)
            //     )
            // )
        //)


    // <div class="panel panel-default">
    //
    //     <div class="pull-right">
    //     <button class="btn btn-success btn-sm" id="{{ $level1->id }}" data-toggle="modal"
    // data-target="#Modal" data-whatever="{{ $level1->id }}">New lvl
    // </button>
    // <button class="btn btn-info btn-sm" id="{{ $level1->id }}" data-toggle="modal"
    // data-target="#Modal" data-whatever="{{ $level1->id }}">Edit
    //     </button>
    //     </div>


    // <div class="panel-heading clearfix" role="tab" id="heading{{ $level1->id }}">
    //     <h4 class="panel-title pull-left">
    //     <a class="collapsed" role="button" data-toggle="collapse" data-parrent="#accordion"
    // href="#collapse{{ $level1->id }}"
    // aria-expanded="false"
    // aria-controls="{{ $level1->id }}">{{ $level1->name }}</a>
    // </h4>
    // </div>
// }


$('#Modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var level = button.data('whatever');
    var modal = $(this);
    modal.find('.modal-title').text('Creating lvl ' + level);
    modal.find('.modal-body input#level').val(level);
});

$(".modal-footer button").click(function (e) {
    e.preventDefault();

    var id = $('input#level').val();
    var name = $('input#name').val();
    //  var name = $("input[name=name]").val();
    //  var password = $("input[name=password]").val();
    //  var email = $("input[name=email]").val();

    console.log(id);
    console.log(name);

    $.ajax({
        type: 'POST',
        url: 'categories',
        data: {id: id, name: name},
        // data:{name:name, password:password, email:email},
        success: function (data) {
            alert('Everything is awesome!');
            $('div.panel#' + id).html(data);
        },
        error: function (data) {
            console.log(data);
            alert("Fail");
            // add_category(id, name);
        }
    });
});