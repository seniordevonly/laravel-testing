@if ($lastSeen)
    <span class="font-display mx-2 -mt-3 text-xl">.</span>
    <span>
        Last seen on {{ $lastSeen->format('Y-m-d') }}
    </span>
@endif
