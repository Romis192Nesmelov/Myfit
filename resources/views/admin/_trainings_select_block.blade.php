<div class="form-group has-feedback {{ $errors && $errors->has('training_id') ? 'has-error' : '' }}">
    <label class="control-label col-md-12 text-semibold">{{ trans('content.training') }}</label>
    <select name="training_id" class="form-control">
        @foreach ($programs as $program)
            <optgroup label="{{ $program->title }}">
                @foreach ($program->trainings as $training)
                    <option value="{{ $training->id }}" {{ (!count($errors) ? $training->id == $selected : $training->id == old('training_id')) ? 'selected' : '' }}>{{ $training->duration.' '.trans('content.weeks').'/'.$training->periodicity }}</option>
                @endforeach
            </optgroup>
        @endforeach
    </select>
    @if ($errors && $errors->has('training_id'))
        <div class="form-control-feedback">
            <i class="icon-cancel-circle2"></i>
        </div>
        <span class="help-block">{{ $errors->first('training_id') }}</span>
    @endif
</div>