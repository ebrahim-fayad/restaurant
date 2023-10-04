            <div class="col-md-3">
                <div class="list-group text-capitalize">
                    <a href="{{ route('categories.index') }}" class="list-group-item list-group-item-action active" >
                        All Categories
                    </a>
                    <a href="{{ route('categories.create')}}" class="list-group-item list-group-item-action">Add New Category</a>
                    <a href="{{ route('meals.index') }}" class="list-group-item list-group-item-action">all meals</a>
                    <a href="{{ route('meals.create') }}" class="list-group-item list-group-item-action">add new meal</a>
                    <a href="{{ route('meals.trashed') }}" class="list-group-item list-group-item-action">trashed meals</a>
                </div>
            </div><!-- col-md-3 -->