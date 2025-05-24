<div
    id="{{ $record->getKey() }}"
    wire:click="recordClicked('{{ $record->getKey() }}', {{ @json_encode($record) }})"
    class="record bg-white dark:bg-gray-700 rounded-lg px-4 py-2 cursor-grab font-medium text-gray-600 dark:text-gray-200 flex justify-between items-center"
    @if($record->timestamps && now()->diffInSeconds($record->{$record::UPDATED_AT}, true) < 3)
        x-data
    x-init="
            $el.classList.add('animate-pulse-twice', 'bg-primary-100', 'dark:bg-primary-800')
            $el.classList.remove('bg-white', 'dark:bg-gray-700')
            setTimeout(() => {
                $el.classList.remove('bg-primary-100', 'dark:bg-primary-800')
                $el.classList.add('bg-white', 'dark:bg-gray-700')
            }, 3000)
        "
    @endif
>
    <div>
        {{ $record->{static::$recordTitleAttribute} }}

        @if($record->phone)
            <p class="text-md text-gray-500 dark:text-gray-400">{{ $record->phone }}</p>
        @endif

        @if($record->course_type)
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $record->course_type }}</p>
        @endif
    </div>

    {{-- Right-aligned status badge --}}
    @if($record->status)
        <span
            class="ml-4 text-xs font-semibold px-2 py-1 rounded-full
                @switch($record->status)
                    @case('new') bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100 @break
                    @case('called') bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100 @break
                    @case('cancelled') bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100 @break
                    @default bg-gray-200 text-gray-800 dark:bg-gray-600 dark:text-gray-100
                @endswitch"
        >
            {{ ucfirst($record->status) }}
        </span>
    @endif
</div>
