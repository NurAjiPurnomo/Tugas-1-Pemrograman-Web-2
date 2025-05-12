<x-layouts.app.sidebar :title="$title ?? null">
    <x-fluxui-main>
        {{ $slot }}
    </x-fluxui-main>
</x-layouts.app.sidebar>
