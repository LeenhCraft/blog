<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <article class="w-full h-80 bg-cover bg-center @if ($loop->first) md:col-span-2 @endif"
                    style="background-image: url({{ Storage::url($post->image->img_url) }})">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <div>
                            @foreach ($post->tags as $tag)
                                <a class="inline-block px-3 h-6 bg-{{ $tag->tag_color }}-600 text-white rounded-full"
                                    href="{{ route('posts.tag', $tag->idtag) }}">{{ $tag->tag_name }}</a>
                            @endforeach
                        </div>
                        <h1 class="text-4xl text-white leading-8 font-bold mt-2">
                            <a href="{{ route('posts.show', $post->idpost) }}">
                                {{ $post->pos_name }}
                            </a>
                        </h1>
                    </div>
                    {{-- <img src="{{ Storage::url($post->image->img_url) }}" alt=""> --}}
                </article>
            @endforeach
        </div>
        <div class="mt-4">
            {{-- paginador --}}
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
