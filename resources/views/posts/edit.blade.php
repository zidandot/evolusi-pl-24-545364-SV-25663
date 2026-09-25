<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 text-slate-800">
    <div class="max-w-3xl mx-auto px-4 py-10">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Edit Post</h1>
                <p class="text-slate-600">Perbarui data post yang sudah ada.</p>
            </div>
            <a href="{{ route('posts.index') }}" class="text-slate-600 hover:text-slate-900 underline">Kembali</a>
        </div>

        <form action="{{ route('posts.update', $post->id) }}" method="POST" class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-slate-700 mb-1">Judul</label>
                <input id="title" name="title" type="text" value="{{ old('title', $post->title) }}" class="w-full border border-slate-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="content" class="block text-sm font-medium text-slate-700 mb-1">Konten</label>
                <textarea id="content" name="content" rows="6" class="w-full border border-slate-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-slate-700 mb-1">Status</label>
                <select id="status" name="status" class="w-full border border-slate-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="draft" {{ old('status', $post->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status', $post->status) === 'published' ? 'selected' : '' }}>Published</option>
                </select>
                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('posts.index') }}" class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-700 hover:bg-slate-100">Batal</a>
                <button type="submit" class="px-5 py-2.5 rounded-lg bg-indigo-600 text-white font-semibold hover:bg-indigo-700">
                    Update Post
                </button>
            </div>
        </form>
    </div>
</body>
</html>
