<h1>Edit Buku</h1>

<form action="{{ route('buku.update', $buku) }}" method="POST">
    @method('PUT')
    @include('buku.form', ['buku' => $buku])
</form>
