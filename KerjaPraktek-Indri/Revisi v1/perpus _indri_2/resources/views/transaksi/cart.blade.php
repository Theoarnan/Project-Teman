@foreach($datas as $d)
<tr data-id="{{$d->id_cart}}">
    <td >{{$d->isbn}}</td>
    <td class="fbarcode">{{$d->judul}}</td>
    <td>{{$d->nama_kategori_buku}}</td>
    <td id="qty" style="text-align:center;"><?= $d->qty ?></td>
    <td >
        <button id="hapus-item-cart" data-bukuid="{{$d->id_buku}}" data-cartid="{{$d->id_cart}}" data-url="{{ route('cart.destroy', $d->id_cart)}}" data-token="{{@csrf_token()}}" class="btn btn-sm btn-danger">Hapus</button>
    </td>
</tr>
@endforeach