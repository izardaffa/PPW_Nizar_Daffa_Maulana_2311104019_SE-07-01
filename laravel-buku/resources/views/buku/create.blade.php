<h1>Tambah Buku</h1>

<form action="{{ route('buku.store') }}" method="POST">
    @include('buku.form', ['buku' => $buku])
</form>
