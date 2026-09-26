<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 text-slate-800">
    <div class="max-w-6xl mx-auto px-4 py-10">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Manajemen Post</h1>
                <p class="text-slate-600">Kelola data artikel dan konten website.</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('posts.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg font-semibold shadow">
                    + Tambah Post
                </a>
                <a href="{{ url('/') }}" class="bg-white hover:bg-slate-200 text-slate-700 px-5 py-2 rounded-lg border border-slate-300">
                    Kembali ke Landing
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="mb-6 rounded-lg bg-emerald-100 border border-emerald-300 text-emerald-800 px-4 py-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Judul</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Status</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Dibuat</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-slate-700">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @forelse ($posts as $post)
                        <tr class="hover:bg-slate-50">
                            <td class="px-6 py-4">
                                <div class="font-semibold text-slate-900">{{ $post->title }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-semibold {{ $post->status === 'published' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    {{ $post->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-slate-600">
                                {{ $post->created_at->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('posts.show', $post->id) }}" class="bg-blue-100 text-blue-700 px-3 py-2 rounded-lg text-sm font-medium">Lihat</a>
                                    <a href="{{ route('posts.edit', $post->id) }}" class="bg-orange-100 text-orange-700 px-3 py-2 rounded-lg text-sm font-medium">Edit</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-100 text-red-700 px-3 py-2 rounded-lg text-sm font-medium">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-slate-500">
                                Belum ada data post. Silakan tambah yang baru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
