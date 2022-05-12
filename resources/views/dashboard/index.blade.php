@extends('dashboard.layout.master')
@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            <h4 class="css-box">Employee Lists</h4>
        </div>
    </div>
    <div class="row mt-3 justify-content-between">
        <div class="col-4">
            <label for="" class="form-label">Search</label>
            <input type="text" name="search" class="form-control" placeholder="Search">
        </div>

        <div class="col-4">
            <label for="Department" class="form-label">Department</label>
            <select name="" id="" class="form-select">
                <option value="">Choose Department</option>
            </select>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-2">
            <div class="card" >
                <figure class="imghvr-zoom-in bg-light">
                    <img src="{{asset('images/16521596766279f4bc6c9a0tree.jpg')}}" class="card-img-top img-fluid imghvr-zoom-in bg-light text-black-50" style="height: 135px;" alt="empty image">
                    <figcaption class="pt-5 bg-opacity-50 bg-dark">
                        <div class="btn btn-info text-light"></div>
                    <div class="btn btn-info text-light">View</div>
                    </figcaption>
                </figure>
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
        </div>
        <div class="col-2">
            <div class="card">
                <img src="{{asset("images/1652243140627b3ac4ce0dfMapyaw Maphyit 2.jpg")}}" class="card-img-top img-fluid" style="height: 120px;" alt="">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
