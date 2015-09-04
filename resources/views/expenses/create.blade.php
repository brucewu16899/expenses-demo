@extends('app')

@section('content')

    <h1>Create an expense</h1>

    {!! Form::open(array('route' => ['expenses.store'], 'class' => 'form-horizontal')) !!}

    <div class="form-group">
        {!! Form::label('base_amount', 'Base Amount', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('base_amount', null, array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::textarea('description', null, array('class' => 'form-control')) !!}
        </div>
    </div>


    <h3>Supplements <a class='btn btn-xs btn-default' href="#" id="add_supplement">Add one</a></h3>

    <div id="nosupplements">No supplements (yet)</div>
    <div id="supplements"></div>
    <hr>

    {!! Form::submit('Create expense', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}

    @include('expenses.supplement_template')

@endsection

@section('bottomscripts')
    <script>
        $(document).ready(function() {
            // functionality for the 'Add one' button
            var template = $('#hidden-template').html();
            $('#add_supplement').click(function() {
                if( $("#nosupplements").length) {
                    $("#nosupplements").remove();
                }
                var index = $('.js-new-supplement').length;

                $('#supplements').append(template.replace(/\{index\}/g, index));

            });

        });
    </script>
@endsection