<div class="rating-wrapper-hl my-2">
    
    @php
        $rating = $rating ?? 0;
    @endphp


    @for( $i = 1; $i <= 5; $i++ )
        <label for="{{ $i }}-star-rating" class="star-rating star">
            <i class="fas fa-star d-inline-block fa-2xs"></i>
        </label>

        @if( $i == $rating )
            <input type="radio" disabled checked>
        @endif
    @endfor
    
</div>