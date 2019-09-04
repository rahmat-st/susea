<a href="/">&larr; Kembali</a><br><br>
<form action="{{ route('category.store') }}" method="post">
  @csrf
  <input type="text" name="category_name">
  <button type="submit">tambah</button>
</form>

@foreach ($category as $item)
    <p>{{$item['id'] . ' ' . $item['category_name']}}</p>
@endforeach