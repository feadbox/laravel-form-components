@props(['flat'])

<x:form-label
    :label="$label"
    :for="$attributes->get('id') ?: $id()"
    :required="$attributes->get('required')"
    class="form-label"
/>

{{ $hint ?? null }}

<div class="input-group{{ $attributes->get('group-flat') ? ' input-group-flat' : '' }}">
    @isset($prepend)
        <div class="input-group-text">{!! $prepend !!}</div>
    @endisset

    <input
        {!! $attributes->except('group-flat')->merge(['class' => 'form-control ' . ($hasError($name) ? 'is-invalid' : '')]) !!}

        type="{{ $type }}"

        @if($isWired())
            wire:model{!! $wireModifier() !!}="{{ $name }}"
        @else
            name="{{ $name }}"
            value="{{ $value }}"
        @endif

        @if($label && !$attributes->get('id'))
            id="{{ $id() }}"
        @endif
    />

    @isset($append)
        <div class="input-group-text">{!! $append !!}</div>
    @endisset
</div>

{!! $help ?? null !!}

@if($hasErrorAndShow($name))
    <x:form-errors :name="$name" />
@endif
