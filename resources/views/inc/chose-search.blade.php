<div class="list-group col-2" style="position: fixed;">
    <a href="#" class="list-group-item list-group-item-action active disabled" style="text-align: center">
        Thương Hiệu Laptop
    </a>
<div class="list-group" style=" max-height: 250px; overflow:auto;">
    @foreach ($firms as $firm)
        <a href="/{{$firm->name}}" class="list-group-item list-group-item-action">{{$firm->name}}</a>
    @endforeach
    
</div>
    
</div>
<div class="list-group col-2" style="position: fixed; top:400px;">
    <a href="#" class="list-group-item list-group-item-action active disabled" style="text-align: center">
        Giá Laptop
    </a>
    <div class= 'list-group' style=" max-height: 250px;overflow:auto;">
        <a href="/0&500" class="list-group-item list-group-item-action">500$<</a>
        <a href="/500&1000" class="list-group-item list-group-item-action">500$-1000$</a>
        <a href="/1000&1500" class="list-group-item list-group-item-action">1000$-1500$</a>
        <a href="/1500&2000" class="list-group-item list-group-item-action">1500$-2000$</a>
        <a href="/2000&2500" class="list-group-item list-group-item-action">2000$-2500$</a>
        <a href="/2500&3000" class="list-group-item list-group-item-action">2500$-3000$</a>
        <a href="/3000&3500" class="list-group-item list-group-item-action">3000$-3500$</a>
        <a href="/3500&4000" class="list-group-item list-group-item-action">3500$-4000$</a>
    </div>

</div>