<textarea @if($row->required == 1) required @endif class="form-control" name="{{ $row->field }}" rows="{{ isset($options->display->rows) ? $options->display->rows : 5 }}">@if(isset($dataTypeContent->{$row->field})){{ old($row->field, $dataTypeContent->{$row->field}) }}@elseif(isset($options->default)){{ old($row->field, $options->default) }}@else{{ old($row->field) }}@endif</textarea>
