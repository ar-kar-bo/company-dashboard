<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("css/imagehover.min.css")}}">
    <style>
        [class^='imghvr-'],
        [class*=' imghvr-'] {
        background-color: #D14233;
        }
        a{
            text-decoration: none;
        }
        ul li{
            list-style-type: none;
        }
        .card-box:hover{
			transform: scale(1.005);
			box-shadow: 0 0 40px 0px rgba(0,0,0,0.25)
		}
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-3 col-xl-2 aside p-0">

                <div class="bg-secondary vh-100">
                    <ul class="text m-0 p-0">
                        <a href="{{url('/')}}">
                            <li class="p-3 bg-primary text-white">
                                <i class="fa-solid fa-house"></i>
                                Admin Management
                            </li>
                        </a>
                        <a href="{{route('department.index')}}">
                            <li class="p-3 text-white">
                                <i class="fa-solid fa-building-user"></i>
                                Department
                            </li>
                        </a>
                        <a href="{{route('position.index')}}">
                            <li class="p-3  text-white">
                                <i class="fa-solid fa-id-card-clip"></i>
                                Position
                            </li>
                        </a>
                        <a href="{{route('employee.index')}}">
                            <li class="p-3 text-white">
                                <i class="fa-solid fa-users-gear"></i>
                                Employee
                            </li>
                        </a>
                        <a href="{{route('employee.create')}}">
                            <li class="p-3 text-white">
                                <i class="fa-solid fa-user-plus"></i>
                                Create Employee
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-9 col-xl-10 content">
                @include('dashboard.inc.error')
                @yield('content')
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="{{asset('assets/dashboard.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @yield('script')
</body>

</html>
