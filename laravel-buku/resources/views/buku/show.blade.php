<h1>Detail Buku</h1>

<ul>
    <li><strong>Judul:</strong> {{ $buku->title }}</li>
    <li><strong>Deskripsi:</strong> {{ $buku->description }}</li>
    <li><strong>Penulis:</strong> {{ $buku->author }}</li>
    <li><strong>Tahun:</strong> {{ $buku->year }}</li>
</ul>

<p>
    <a href="{{ route('buku.edit', $buku) }}">Edit</a> |
    <a href="{{ route('buku.index') }}">Kembali</a>
</p>
