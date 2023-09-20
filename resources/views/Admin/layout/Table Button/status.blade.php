<p>
    @forelse($data -> penyewaan as $reklame)
        @if($loop->last)
            @if($reklame -> status() == 0)
                Tersedia
            @else
                Tidak Tersedia
            @endif
        @endif
    @empty
        Tersedia
    @endforelse
</p>