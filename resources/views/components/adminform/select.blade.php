@props(['name', 'options', 'multiple' => false, 'class' => ''])

<div class="form-group">
    <label for="{{ $name }}">{{ ucwords($name) }}</label>
    <select
        required
        name="{{ $multiple ? $name.'[]' : $name }}"
        id="{{ $name }}"
        class="form-select border border-dark {{ $class }}"
        {{ $multiple ? 'multiple' : '' }}
    >
        <option value="">Select {{ ucwords($name) }}</option>

        @foreach ($options as $option)
        <option
        value="{{ $option->slug }}"
        {{ $multiple ? (in_array($option->slug, (array) old($name, [])) ? 'selected' : '') : (old($name) == $option->name ? 'selected' : '') }}
    >
        {{ ucwords($option->name) }}
    </option>
    
        @endforeach
    </select>
    <x-ccomponents.error :name="$name" />
</div>
