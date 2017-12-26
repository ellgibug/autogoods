@extends('admin.layouts.master-s')


@section('csrf-token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

{{--
* {{ route('products.list', $level1->id) }}
*
*
 --}}
@section('content')
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <button class="btn btn-success" data-toggle="modal"
            data-target="#Modal">New lvl
    </button>

    <div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
        @foreach($parent_levels as $level1)
            <div class="panel panel-default">

                <div class="pull-right">
                    <button class="btn btn-success btn-sm" id="{{ $level1->id }}" data-toggle="modal"
                            data-target="#Modal" data-whatever="{{ $level1->id }}">New lvl
                    </button>
                    <button class="btn btn-info btn-sm" id="{{ $level1->id }}" data-toggle="modal"
                            data-target="#Modal" data-whatever="{{ $level1->id }}">Edit
                    </button>
                </div>

                {{-- HEADING LVL1 --}}
                <div class="panel-heading clearfix" role="tab" id="heading{{ $level1->id }}">
                    <h4 class="panel-title pull-left">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parrent="#accordion"
                           href="#collapse{{ $level1->id }}"
                           aria-expanded="false"
                           aria-controls="{{ $level1->id }}">{{ $level1->name }}</a>
                    </h4>
                </div>
                {{-- HEADING END --}}

                {{-- BODY LVL1 --}}
                <div id="collapse{{ $level1->id }}" class="panel-collapse collapse" role="tabpanel"
                     aria-labelledby="heading{{ $level1->id }}">
                    <div class="panel-body">
                        <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
                            {{-- CYCLE --}}
                            @foreach($level1->levels as $level2)
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading{{ $level2->id }}">
                                        {{-- HEADING LVL2 --}}
                                        <div class="pull-right">
                                            {{-- BUTTONS FOR LVL2 --}}
                                            <button class="btn btn-success btn-sm" id="{{ $level2->id }}" data-toggle="modal"
                                                    data-target="#Modal" data-whatever="{{ $level2->id }}">New
                                                lvl
                                            </button>
                                            <button class="btn btn-info btn-sm" id="{{ $level2->id }}" data-toggle="modal"
                                                    data-target="#Modal" data-whatever="{{ $level2->id }}">Edit
                                            </button>
                                        </div>
                                        {{-- BUTTONS END --}}

                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse"
                                               data-parrent="#accordion"
                                               href="#collapse{{ $level2->id }}"
                                               aria-expanded="false"
                                               aria-controls="{{ $level2->id }}">{{ $level2->name }}</a>
                                        </h4>
                                        {{-- HEADING END --}}
                                    </div>

                                    <div id="collapse{{ $level2->id }}" class="panel-collapse collapse"
                                         role="tabpanel"
                                         aria-labelledby="heading{{ $level2->id }}">
                                        <div class="panel-body">

                                            @if(count($level2->levels))
                                                <div class="panel-group" id="accordion2" role="tablist"
                                                     aria-multiselectable="true">
                                                    <div class="panel-body">
                                                        {{-- CYCLE 2 --}}
                                                        @foreach($level2->levels as $level3)
                                                            <a href="{{ route('products.list', $level3->id) }}">{{ $level3->name }}</a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- BODY END --}}
                @endforeach
            </div>
    </div>

    <!-- Modal Window -->
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">New message</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="level" class="control-label">Level:</label>
                            <input type="text" class="form-control" id="level">
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Name:</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script type="text/javascript" src="{{ asset('smarty_admin/js/custom/categories.js') }}"></script>
@endsection
