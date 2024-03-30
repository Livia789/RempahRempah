<div class="rating mt-3 mb-3">
    @for ($i = 1; $i <= 5; $i++)
        @if ($i <= $rating_avg)
            <img src="/assets/icons/full_star.png" class="starIcon" alt="star_icon">
        @elseif ($i - $rating_avg >= 0.5 && $i - $rating_avg < 1)
            <img src="/assets/icons/half_star.png" class="starIcon" alt="star_icon">
        @else
            <img src="/assets/icons/empty_star.png" class="starIcon" alt="star_icon">
        @endif
    @endfor
    <b>{{ number_format($rating_avg, 2) }}</b>
</div>
