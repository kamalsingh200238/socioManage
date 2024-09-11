@props(['for', 'class' => ''])

@error($for)
<div {{ $attributes->merge(['class' => 'text-red-500 text-sm ' . $class]) }}>
    {{ $message }}
</div>
@enderror
