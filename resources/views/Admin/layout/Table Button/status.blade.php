<p>
    @forelse($data -> penyewaan as $reklame)
        @if($loop->last)
            @if($reklame -> status() == 0)
                Masih Tersedia
            @else
                Tidak Tersedia
            @endif
        @endif
    @empty
        Masih Tersedia
    @endforelse
</p>