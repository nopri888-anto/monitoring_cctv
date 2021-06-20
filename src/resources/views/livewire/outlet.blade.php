<div>
    <div class="form-group row">
        <label for="KodeWilayah" class="col-sm-3 col-form-label">{{__('Wilayah')}}</label>
        <div class="col-sm-9">
            <select class="form-control" wire:model="wilayah" name="wilayah" id="wilayah">
                <option value="" selected>--Pilih Wilayah--</option>
                @foreach($wilayahs as $wilayah)
                <option value="{{$wilayah->id}}">{{$wilayah->nama_wilayah}}</option>
                @endforeach
            </select>
        </div>
    </div>

    @if(count($cabangs)>0)
    <div class="form-group row">
        <label for="KodeWilayah" class="col-sm-3 col-form-label">{{__('Cabang')}}</label>
        <div class="col-sm-9">
            <select class="form-control" wire:model="cabang" name="cabang" id="cabang">
                <option value="" selected>--Pilih Cabang--</option>
                @foreach($cabangs as $cabang)
                <option value="{{$cabang->id}}">{{$cabang->nama_cabang}}</option>
                @endforeach
            </select>
        </div>
    </div>
    @endif

</div>
