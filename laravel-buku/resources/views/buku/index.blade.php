<h1>Daftar Buku</h1>

@if(session('success'))
	<div>{{ session('success') }}</div>
@endif

<p>
	<a href="{{ route('buku.create') }}">Tambah Buku</a>
</p>

@if($bukus->isEmpty())
	<p>Belum ada data.</p>
@else
	<table border="1" cellspacing="0" cellpadding="6">
		<thead>
			<tr>
				<th>Judul</th>
				<th>Penulis</th>
				<th>Tahun</th>
				<th>Dibuat</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			@foreach($bukus as $buku)
				<tr>
					<td>{{ $buku->title }}</td>
					<td>{{ $buku->author }}</td>
					<td>{{ $buku->year }}</td>
					<td>{{ $buku->created_at?->format('Y-m-d') }}</td>
					<td>
						<a href="{{ route('buku.show', $buku) }}">Detail</a>
						<a href="{{ route('buku.edit', $buku) }}">Edit</a>
						<form action="{{ route('buku.destroy', $buku) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus buku ini?');">
							@csrf
							@method('DELETE')
							<button type="submit">Hapus</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif
