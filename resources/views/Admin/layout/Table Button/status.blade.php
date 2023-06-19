<p>
    
    @if(empty($data->penyewaan->attributes))
       Tersedia
    @else
        @foreach($data->penyewaan as $selvi => $gas)
            @if(isset($gas->tgl_jatuh_tempo))    
                {{ $gas -> tgl_jatuh_tempo }}
            @else
                Tersedia
            @endif
        @endforeach
    @endif
</p>