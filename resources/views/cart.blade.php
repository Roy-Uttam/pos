@include('main')
 <!-- Cart items details -->
 <div class="container">
  @if(session()->has('success'))
      <div class="alert alert-success">
          {{ session()->get('success') }}
      </div>
  @endif
  <div class="row">
      <h2>Report</h2>
  </div>

  
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">Report</div>
                  <div class="card-body">
                      
                      <br/>
                      <br/>
                      <div class="table-responsive">
                          <table class="table">
                              <thead>
                                  <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                    <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($carts as $cart)
                                  <tr>
                                      <td>{{$cart->name}}</td>
                                      <td>{{$cart->qty}}</td>
                                      <td>{{$cart->options['total']}}</td>
                                      <td><a href="{{url('/removeItem/' . $cart->rowId)}}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Remove</button></a></td>

                                  </tr>
                              @endforeach
                              </tbody>
                          </table>

                          <div class="total-price">
                            <table>
                                <tr>
                                    <td>Total</td>
                                    <td>{{$subTotal}}</td>
                                </tr>
                                <br>
                            </table>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
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
