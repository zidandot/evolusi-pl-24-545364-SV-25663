<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 text-slate-800">
    <div class="max-w-3xl mx-auto px-4 py-10">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Detail Post</h1>
            </div>
            <a href="{{ route('posts.index') }}" class="text-slate-600 hover:text-slate-900 underline">Kembali</a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 space-y-5">
            <div>
                <p class="text-sm font-medium text-slate-500 uppercase">Judul</p>
                <h2 class="text-2xl font-bold text-slate-900">{{ $post->title }}</h2>
            </div>

            <div>
                <p class="text-sm font-medium text-slate-500 uppercase">Status</p>
                <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-semibold {{ $post->status === 'published' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                    {{ $post->status }}
                </span>
            </div>

            <div>
                <p class="text-sm font-medium text-slate-500 uppercase">Konten</p>
                <div class="mt-2 prose max-w-none text-slate-700 whitespace-pre-line">{{ $post->content }}</div>
            </div>

            <div class="flex gap-3 pt-4">
                <a href="{{ route('posts.edit', $post->id) }}" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg font-medium">
                    Edit
                </a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-medium">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
