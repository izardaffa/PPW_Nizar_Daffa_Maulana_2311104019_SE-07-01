@csrf

<div>
	<label for="title">Judul</label>
	<input type="text" name="title" id="title" value="{{ old('title', $buku->title) }}">
	@error('title')
		<div>{{ $message }}</div>
	@enderror
</div>

<div>
	<label for="description">Deskripsi</label>
	<textarea name="description" id="description" rows="4">{{ old('description', $buku->description) }}</textarea>
	@error('description')
		<div>{{ $message }}</div>
	@enderror
</div>

<div>
	<label for="author">Penulis</label>
	<input type="text" name="author" id="author" value="{{ old('author', $buku->author) }}">
	@error('author')
		<div>{{ $message }}</div>
	@enderror
</div>

<div>
	<label for="year">Tahun</label>
	<input type="number" name="year" id="year" value="{{ old('year', $buku->year) }}">
	@error('year')
		<div>{{ $message }}</div>
	@enderror
</div>

<div>
	<button type="submit">Simpan</button>
	<a href="{{ route('buku.index') }}">Batal</a>
</div>
