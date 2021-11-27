@include('main')
  <div class="card">
    <div class="card-header">Create Page</div>
    <div class="card-body">
        
        <form action="{{ url('/product') }}" method="post" enctype="multipart/form-data">
          {!! csrf_field() !!}
          <label>Name</label></br>
          <input type="text" name="name" id="name" class="form-control"></br>
          <label>unit</label></br>
          <input type="text" name="unit" id="unit" class="form-control"></br>
          <label>price</label></br>
          <input type="text" name="price" id="price" class="form-control"></br>
          <label>Category</label></br>
          <select name="category" class="form-select" aria-label="Default select example">
            @foreach ($category as $item)
            <option id="category" value="{{$item->category_name}}">{{$item->category_name}}</option>
            @endforeach
          </select>
          <br>
          <input type="submit" value="Save" class="btn btn-success"></br>
      </form>
    
    </div>
  </div>



<!-- MDB -->
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.0/mdb.min.js"
    ></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
