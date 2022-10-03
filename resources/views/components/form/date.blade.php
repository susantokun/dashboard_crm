<div class="col-span-6 md:col-span-3">
    {{ Form::label(__($label), null, ['class' => 'form-label']) }}
    {{ Form::date($name, $value, array_merge(['class' => ''], $attributes)) }}
    @error($name)
        <p class="mt-1 text-xs font-medium text-danger">{{ $message }}</p>
    @enderror
</div>
