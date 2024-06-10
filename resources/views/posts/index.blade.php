@php
    /** @var \App\Models\BlogPost[] $posts */
@endphp

<x-guest-layout>

    <article class="mx-auto max-w-4xl px-6 pb-16 pt-24">
        <header>
            <h1 class="font-display mb-16 text-[5rem] font-medium leading-none lg:text-[8rem]">My Blog</h1>
        </header>

        <main class="">
            <section class="mx-auto my-16 max-w-2xl">
                <h2 class="mx-auto flex max-w-2xl items-center text-sm font-medium uppercase tracking-wider">
                    <span>Articles on PHP</span>
                    <span class="font-display mx-2 -mt-3 text-xl">.</span>
                    <span>Written by staff</span>
                </h2>
                <ul class="mt-8 space-y-2">
                    @foreach ($posts as $post)
                        <li>
                            <a href="{{ action([\App\Http\Controllers\PostsController::class, 'show'], $post->slug) }}"
                                class="toc-entry">
                                <h3 class="toc-chapter font-display text-xl font-medium">{{ $post->title }}</h3>
                                <span class="toc-page">{{ $post->created_at->format('Y-m-d') }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </section>

        </main>

    </article>
</x-guest-layout>
