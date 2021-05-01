@extends('adminlte::page')
@section('title', 'barang')
@section('content_header')
    <h1 class="m-0 text-dark">BARANG</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12"> 
            <div class="card">
                <div class="card-header">
                </div>
            <div class="card-body">
                <table class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width: 20px">NO</th>
                            <th>FOTO</th>
                            <th>NAMA</th>
                            <th>KATEGORI</th>
                            <th>MEREK</th>
                            <th>HARGA</th>
                            <th>JUMLAH</th>
                            <th style="width: 100px">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;?>
                        @forelse($data as $item)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>
                                @if($item->foto !== null)
                                        <img src="{{ asset('/storage/foto_barang/'.$item->foto) }}" width="80px"/>
                                    @else
                                        [Gambar tidak tersedia]
                                    @endif
                                </td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ !empty($item->kategori) ? $item->kategori->nama:'' }}</td>
                                <td>{{ optional($item->merks)->nama }}</td>
                                <td>{{ $item->harga }}</td> 
                                <td>{{ $item->qty }}</td>
                                <td>
                                    <div class="btn-group">
                                    </div>
                                </td>
                            </tr>
                        <?php $no++;?>
                        @empty
                            <tr>
                                <td colspan="8">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix text-right">
                {{ $data->links() }}
            </div>
        </div>
    </div>
</div>
@stop
    @section('plugins.Sweetalert2', true)
    @section('plugins.Pace', true)
    @section('js')
    @if (session('success'))
        <script type="text/javascript">
            Swal.fire(
                'Sukses!',
                '{{ session('success') }}', 'success'
            )
        </script>
    @endif
        <script type="text/javascript">
            function hapus(id){
                Swal.fire({
                    title: 'Konfirmasi',
                    text: "Yakin menghapus data ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#dd3333',
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "/barang/"+id,
                            type: 'DELETE',
                            data: {
                                '_token': $('meta[name=csrf-token]').attr("content"),
                            },
                            success: function(result) {
                                Swal.fire(
                                    'Sukses!',
                                    'Berhasil Hapus',
                                    'success'
                                );
                                location.reload();
                            }
                        });
                    }
                })
            }
        </script>
@stop