{{ csrf_field() }}
<div class="form-group">
    <label for="nama" class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-10">
    <input type="text" name="nama" id="nama" class="form-control" value="{{ $nama ?? '' }}" >
    </div>
</div>
<div class="form-group">
    <label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
    <div class="col-sm-10">
        <input type="text" name="ket" id="ket" class="form-control" value="{{ $ket ?? '' }}" >
    </div>
</div>
<div class="form-group">
 <div class="col-sm-offset-2 col-sm-10">
 <input type="submit" class="btn btn-success btn-md ml-auto" name="simpan" value="Simpan">
 <a href="{{ route('kategori.index') }}" class="btn btn-primary ml-auto" role="button">Batal</a>
 </div>
</div>