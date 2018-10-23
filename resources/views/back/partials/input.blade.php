<div class="form-group {{ $errors->has($input['name']) ? 'has-error' : '' }}">
    @isset($input['title'])
        <label for="{{ $input['name'] }}">{{ $input['title'] }}</label>
    @endisset
    
    
    {{-- CATEGORIES SELECT2 --}}
    @if ($input['input'] === 'categories')
        <select required class="form-control select2" name="{{ $input['name'] }}[]" id="{{ $input['name'] }}">
            @foreach($input['options'] as $id => $title)
                <option value="{{ $id }}" {{ old($input['name']) ? (in_array($id, old($input['name'])) ? 'selected' : '') : ($input['values']->contains('id', $id) ? 'selected' : '') }}>{{ $title }}</option>
            @endforeach
        </select>
    {{-- TAGS SELECT2 --}}
    @elseif ($input['input'] === 'tags')
        <select required class="form-control select2" multiple name="{{ $input['name'] }}[]" id="{{ $input['name'] }}">
            @foreach($input['options'] as $id => $title)
                <option value="{{ $id }}" {{ old($input['name']) ? (in_array($id, old($input['name'])) ? 'selected' : '') : ($input['values']->contains('id', $id) ? 'selected' : '') }}>{{ $title }}</option>
            @endforeach
        </select>
  
    {{-- AUTHORS SELECT2 --}}
    @elseif ($input['input'] === 'authors')
        <select required class="form-control select2" multiple name="{{ $input['name'] }}[]" id="{{ $input['name'] }}">
            @if(old($input['name']))
              @foreach( old($input['name']) as $id )
                <option value="{{ $id }}" selected>{{ $input['options'][$id] }}</option>
              @endforeach
            @endif
          
            @foreach($input['options'] as $id => $title)
                @if(old($input['name']) && in_array($id, old($input['name'])) )
                  @continue
                @endif
                <option value="{{ $id }}">{{ $title }}</option>
            @endforeach
        </select>
  
     {{-- DATE PICKER --}}
    @elseif ($input['input'] === 'datepicker')
      <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="text" class="form-control pull-right datepicker" id="{{ $input['name'] }}" name="{{ $input['name'] }}" value="{{ old($input['name'], $input['value']) }}" @if ($input['required']) required @endif>
        </div>

    @elseif ($input['input'] === 'textarea')
        <textarea class="form-control {{ isset($input['class']) ? $input['class'] : ''}}" rows="{{ $input['rows'] }}" id="{{ $input['name'] }}" name="{{ $input['name'] }}" @if ($input['required']) required @endif>{{ old($input['name'], $input['value']) }}</textarea>
    @elseif ($input['input'] === 'checkbox')
        <div class="checkbox">
            <label>
                <input id="{{ $input['name'] }}" class="{{ isset($input['class']) ? $input['class'] : ''}}" name="{{ $input['name'] }}" type="checkbox" {{ $input['value'] ? 'checked' : '' }}>{{ $input['label'] }}
            </label>
        </div>
    @elseif ($input['input'] === 'select')
        <select required class="form-control {{ isset($input['class']) ? $input['class'] : ''}}" name="{{ $input['name'] }}" id="{{ $input['name'] }}">
            @foreach($input['options'] as $id => $title)
                <option value="{{ $id }}" {{ old($input['name']) && $id == old($input['name']) ? 'selected' : '' }}>{{ $title }}</option>
            @endforeach
        </select>
    @elseif ($input['input'] === 'slider')
        <input class="slider" id="{{ $input['name'] }}" name="{{ $input['name'] }}" type="text" data-slider-min="{{ $input['min'] }}" data-slider-max="{{ $input['max'] }}" data-slider-step="1" data-slider-value="{{ old($input['name'], $input['value']) }}"/>
    @else
        <input type="text" class="form-control {{ isset($input['class']) ? $input['class'] : ''}}" id="{{ $input['name'] }}" name="{{ $input['name'] }}" value="{{ old($input['name'], $input['value']) }}" @if ($input['required']) required @endif>
    @endif
    {!! $errors->first($input['name'], '<span class="help-block">:message</span>') !!}
</div>

