<div class="d-flex rating mt-3 mb-3">
    @for ($i = 1; $i <= 5; $i++)
        @if($i <= $rating_avg || $rating_avg>=$i-0.1)
            <img src="/assets/icons/full_star.png" class="starIcon" alt="star_icon">
        @elseif($i-0.75 <= $rating_avg && $rating_avg < $i-0.1)
            <img src="/assets/icons/half_star.png" class="starIcon" alt="star_icon">
        @else
            <img src="/assets/icons/empty_star.png" class="starIcon" alt="star_icon">
        @endif
    @endfor
    <b style="margin-left:5px">{{ number_format($rating_avg, 2) }}</b>
</div>