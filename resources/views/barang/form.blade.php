{{ csrf_field() }}
<div class="form-group">
    <label for="foto" class="col-sm-2 control-label">Foto</label>
    <div class="col-sm-10">
    <input type="file" class="form-control" name="foto" id="foto" value="{{ $foto ?? '' }}">
    </div>
</div>
<div class="form-group">
    <label for="nama" class="col-sm-2 control-label">Nama Barang</label>
    <div class="col-sm-10">
    <input type="text" name="nama" id="nama" class="form-control" value="{{ $nama ?? '' }}" >
    </div>
</div>
<div class="form-group">
    <label for="kategori" class="col-sm-2 control-label">Kategori</label>
    <div class="col-sm-10">
        <select name="kategoris_id" class="form-control">
            @foreach($kategori as $item)
                <option value="{{ $item->id }}" {{ ( ($kategoris_id??'')==$item->id) ? 'selected' : '' }}>
                {{ $item->nama}}
            </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
 <label for="merk" class="col-sm-2 control-label">merk</label>
 <div class="col-sm-10">
        <select name="merks_id" class="form-control">
            @foreach($merk as $item)
                <option value="{{ $item->id }}" {{ ( ($merks_id??'')==$item->id) ? 'selected' : '' }}>
                {{ $item->nama}}
            </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="harga" class="col-sm-2 control-label">Harga</label>
    <div class="col-sm-10">
        <input type="number" name="harga" id="harga" class="form-control" value="{{ $harga ?? '' }}" >
    </div>
</div>
<div class="form-group">
    <label for="jumlah" class="col-sm-2 control-label">Jumlah</label>
    <div class="col-sm-10">
        <input type="number" name="qty" id="qty" class="form-control" value="{{ $qty ?? '' }}" >
    </div>
</div>
<div class="form-group">
 <div class="col-sm-offset-2 col-sm-10">
 <input type="submit" class="btn btn-success btn-md ml-auto" name="simpan" value="Simpan">
 <a href="{{ route('barang.index') }}" class="btn btn-primary ml-auto" role="button">Batal</a>
 </div>
</div>