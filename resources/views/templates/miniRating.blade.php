<div class="d-flex rating" style="align-items: center;">
    @if($rating_avg >= 4)
        <img src="/assets/icons/full_star.png" class="starIcon" alt="star_icon">
    @elseif($rating_avg >= 2)
        <img src="/assets/icons/half_star.png" class="starIcon" alt="star_icon">
    @else
        <img src="/assets/icons/empty_star.png" class="starIcon" alt="star_icon">
    @endif

    <b style="margin-left:5px">{{ number_format($rating_avg, 2) }}</b>
</div>