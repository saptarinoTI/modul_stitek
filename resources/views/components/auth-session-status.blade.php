@props(['status'])

@if ($status)
    <div
        {{ $attributes->merge(['class' => 'font-medium text-sm text-green-700 bg-green-100 px-6 py-3 rounded-lg shadow shadow-green-300/50']) }}>
        {{ $status }}
    </div>
@endif
