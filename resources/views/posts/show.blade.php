<x-guest-layout>
    <article class="mx-auto max-w-4xl px-6 pb-16 pt-24">
        <header>
            <h1 class="font-display mb-8 max-w-2xl text-[2.5rem] font-medium leading-none lg:text-[5rem]">
                {{ $post->title }}</h1>
            <p class="mx-auto flex max-w-2xl items-center text-sm font-medium uppercase tracking-wider">
                <a class="font-semibold hover:underline"
                    href="{{ action([\App\Http\Controllers\PostsController::class, 'index']) }}">Back</a>
                <span class="font-display mx-2 -mt-3 text-xl">.</span>
                <span>{{ $post->created_at->format('Y-m-d') }}</span>
                <span class="font-display mx-2 -mt-3 text-xl">.</span>
                <span>Written by: Me </span>
                <x-last-seen :post="$post" />
            </p>
        </header>

        <main class="markup my-24">
            {!! $post->body !!}
        </main>

        <aside class="mx-auto flex max-w-2xl justify-between">
            <p class="flex items-center text-sm font-medium uppercase tracking-wider">
                <a class="font-semibold hover:underline"
                    href="{{ action([\App\Http\Controllers\PostsController::class, 'index']) }}">Back</a>
                <span class="font-display mx-2 -mt-3 text-xl">.</span>
                <span>{{ $post->created_at->format('Y-m-d') }}</span>
                <span class="font-display mx-2 -mt-3 text-xl">.</span>
                <span>Written by Me</span>
            </p>

        </aside>

    </article>
</x-guest-layout>
