<script id="hidden-template" type="text/x-custom-template">
    <div class="form-group js-new-supplement">
        {!! Form::label('name', 'Supplement name', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('name', null, array('class' => 'form-control', 'name' => 'supplement[new_{index}][name]' )) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('amount', 'Amount', ['class' => 'col-sm-2 control-label']) !!}
         <div class="col-sm-10">
             {!! Form::text('amount', null, array('class' => 'form-control', 'name' => 'supplement[new_{index}][amount]')) !!}
         </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label>
                    {!! Form::hidden('supplement[new_{index}][commissionable]', 0) !!}
                    {!! Form::checkbox('supplement[new_{index}][commissionable]', 1) !!} Commissionable
                </label>
            </div>
        </div>
    </div>
</script>