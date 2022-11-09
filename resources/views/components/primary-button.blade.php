<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'block px-5 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-300 bg-blue-500 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue']) }}>
    {{ $slot }}
</button>
