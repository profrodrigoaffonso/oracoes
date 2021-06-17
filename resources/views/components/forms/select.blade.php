<div class="form-group">
    <label>{{ $label }}</label> 
    <select class="form-control" id="{{ $id }}" name="{{ $name }}" {{ $required }}>
        <option></option>
        @foreach($values as $value)
            <option {{($value->id == $selected ? 'selected' : '')}} value="{{ $value->id }}">{{ $value->nome }}</option>
        @endforeach
    </select>
</div>