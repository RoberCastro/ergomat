<div class="alert alert-danger info" style="display:none;">
    <ul></ul>
</div>
<div class="form-group">
    <label class="col-md-4 control-label">Reference du patient</label>
    <div class="col-md-8">
      {!! Form::text('user_id', $user->id, ['class' => 'form-control', 'id' => 'user_id']) !!}
      {!! Form::text('reference', null, array('class' => 'form-control', 'id' => 'reference','data-url'=> URL::route("store_patient")) ) !!}
    </div>
</div>


<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            {!! Form::button('Save', array('class' => 'btn-primary save')) !!}
            {!! Form::hidden('id', null, ['id' => 'id']) !!}
        </div>
    </div>
</div>
