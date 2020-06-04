<div class="pt-2 pb-3">
    <div class="btn-group">
        <button class="btn btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            По названию
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ route('products', ['sorting' => 'title']) }}">По возрастанию</a>
            <a class="dropdown-item" href="{{ route('products', ['sorting' => '-title']) }}">По убыванию</a>
        </div>
    </div>

    <div class="btn-group ml-2">
        <button class="btn btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            По цене
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ route('products', ['sorting' => 'price']) }}">По возрастанию</a>
            <a class="dropdown-item" href="{{ route('products', ['sorting' => '-price']) }}">По убыванию</a>
        </div>
    </div>
</div>
