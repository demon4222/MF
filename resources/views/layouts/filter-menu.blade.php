@push('hidden')
<div class="filter">
    <div class="filter-head">
        <div class="filter-title text-uppercase">
            Фільтр
        </div>
        <div class="icon-close">
            <img src="{{asset('img/close-filter.png')}}">
        </div>

    </div>
        <!-- Меню -->
        
        <form class="filterbar__inner" id="filter_form" action="{{URL::current()}}" method="GET">
            <!-- <input type="hidden" name="page" value="{{request()->input('page')}}"> -->
            <div class="filter-block pl-4 pt-3">
                <div class="filter-block__title mb-2">
                    Ціна
                </div>
                <div class="filter-block__list">
                    <div class="filter-block__item">
                        <input id="id_price_1" name="price_filter" onclick="document.getElementById('filter_form').submit()" type="checkbox" value="1">
                        <label for="id_price_1">до 500</label>
                    </div>
                    <div class="filter-block__item">
                        <input id="id_price_2" name="price_filter" onclick="document.getElementById('filter_form').submit()" type="checkbox" value="2">
                        <label for="id_price_2">від 501 до 1000</label>
                    </div>
                    <div class="filter-block__item">
                        <input id="id_price_3" name="price_filter" onclick="document.getElementById('filter_form').submit()" type="checkbox" value="3">
                        <label for="id_price_3">від 1001 до 1500</label>
                    </div>
                    <div class="filter-block__item">
                        <input id="id_price_4" name="price_filter"  onclick="document.getElementById('filter_form').submit()" type="checkbox" value="4">
                        <label for="id_price_4">від 1501 до 2000</label>
                    </div>
                    <div class="filter-block__item">
                        <input id="id_price_5" name="price_filter"  onclick="document.getElementById('filter_form').submit()" type="checkbox" value="5">
                        <label for="id_price_5">від 2001 до 3000</label>
                    </div>
                    <div class="filter-block__item">
                        <input id="id_price_6" name="price_filter"  onclick="document.getElementById('filter_form').submit()" type="checkbox" value="6">
                        <label for="id_price_6">від 3001 до 4000</label>
                    </div>
                </div>
            </div>
        </form>

    
	<!-- <ul>
		<li><a href="#">About</a></li>
		<li><a href="#">Blog</a></li>
		<li><a href="#">Help</a></li>
		<li><a href="#">Contact</a></li>
	</ul> -->
</div>
@endpush
