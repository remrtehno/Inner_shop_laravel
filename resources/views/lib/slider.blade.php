
                <section class="home-slider">
                    <div class="slick-slider">
                         @foreach($slider as $item)
                         <div> <img src="{{ $item->getImage()}}" alt="" />
                             </div>
        

                        @endforeach

                        

                        
                    </div>
                </section>








