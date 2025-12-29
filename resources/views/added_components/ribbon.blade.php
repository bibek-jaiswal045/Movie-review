


@if ($avg_rating >= 4)
                            
                            <div class="ribbon">  <span> Highly Rated</span></div>
                                
                            @elseif($avg_rating >= 3)
                            <div class="ribbon">  <span> Growing</span></div>
                            
                            @elseif($movie->released_date > $current_time)
                            <div class="ribbon" >  <span>To Be Released</span></div>

                            @elseif($avg_rating == 0)
                            <div class="ribbon" >  <span> Not Rated</span></div>


                            @else
                            
                            <div class="ribbon">  <span> Under Rated</span></div>

                            @endif