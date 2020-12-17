@extends('layout.master')
@section('content')

<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Riwayat Pemesanan Anda</h2>
            </div>
        </div>
    </div>
</div>

<div class="cart-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-main table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                            {{-- @dd($item['id']) --}}
                            <tr>
                                <td class="name-pr">
                                    <a href="#">
                                        {{$item->nama_barang}}
                                    </a>
                                </td>
                                <td class="quantity-box">{{$item->Qty}}</td>
                                <td class="total-pr">
                                    <p>Rp {{number_format($item->subtotal)}}</p>
                                </td>
                                <td class="status-box">{{$item->status}}</td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" 
                                    onclick="batal({{$item->id}})" data-target="#modalBatal">Batalkan Pesanan</button>
                                </td>
                                <td></td>
                            </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        
    </div>
</div>

@endsection

@section('script')
<script>
    function batal(id){
        var action = "{{url('/batal')}}" + id
        $('#btnBatal').attr('href', action);
    }
</script>
@endsection

@section('modal')
<div class="modal fade" id="modalBatal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Status</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah anda ingin membatalkan pesanan ini?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <a id="btnBatal" type="button" class="btn btn-danger">Ya, Saya Yakin</a>
        </div>
      </div>
    </div>
  </div>

@endsection