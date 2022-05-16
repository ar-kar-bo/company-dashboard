@extends('dashboard.layout.master')
@section('content')
<div class="card">
    <div class="card-body">
        <a href="{{route('employee.index')}}" class="btn btn-sm btn-primary">Employee List</a>
        <form action="{{route('employee.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <label for="name" class="">Enter Employee Name</label>
                </div>
                <div class="col-3">
                    <input type="text" name="name" class="form-control" id="name">
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <label for="department" class="">Department</label>
                </div>
                <div class="col-3">
                    <select name="department_id" class="form-select" id="department">
                        <option value="" hidden>Choose Department</option>
                        @foreach ($dep as $d)
                            <option value="{{$d->id}}">{{$d->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <label for="position" class="">Position</label>
                </div>
                <div class="col-3">
                    <select name="position_id" class="form-select" id="position">
                    </select>
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <label for="email" class="">Enter Employee Email</label>
                </div>
                <div class="col-3">
                    <input type="email" name="email" class="form-control" id="email">
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <label for="phone" class="">Enter Employee Ph.no</label>
                </div>
                <div class="col-3">
                    <input type="number" name="phone" class="form-control" id="phone">
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <label for="state" class="">State / Region</label>
                </div>
                <div class="col-3">
                    <select name="state" id="state" class="form-select">
                        <option value="" hidden>Choose State / Region</option>
                        <option value="Ayeyarwady Region">Ayeyarwady Region</option>
                        <option value="Bago Region(East)">Bago Region(East)</option>
                        <option value="Bago Region(West)">Bago Region(West)</option>
                        <option value="Chin State">Chin State</option>
                        <option value="Kachin State">Kachin State</option>
                        <option value="Kayah State">Kayah State</option>
                        <option value="Kayin State">Kayin State</option>
                        <option value="Magway Region">Magway Region</option>
                        <option value="Mandalay Region">Mandalay Region</option>
                        <option value="Mon State">Mon State</option>
                        <option value="Nay Pyi Taw">Nay Pyi Taw</option>
                        <option value="Rakhine State">Rakhine State</option>
                        <option value="Sagaing Region">Sagaing Region</option>
                        <option value="Shan State(South)">Shan State(South)</option>
                        <option value="Shan State(North)">Shan State(North)</option>
                        <option value="Shan State(East)">Shan State(East)</option>
                        <option value="Tanintharyi Region">Tanintharyi Region</option>
                        <option value="Yangon Region">Yangon Region</option>
                    </select>
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <label for="city" class="">City </label>
                </div>
                <div class="col-3">
                    <select name="ciry" id="city" class="form-select">

                    </select>
                </div>
            </div>

            <div class="row align-items-top mt-3">
                <div class="col-2">
                    <label for="address" class="">Enter Employee Address</label>
                </div>
                <div class="col-3">
                    <textarea name="address" id="" cols="30" rows="2" class="form-control"></textarea>
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <label for="image" class="">Enter Employee Photo</label>
                </div>
                <div class="col-3">
                    <input type="file" name="image" class="form-control" id="image">
                </div>
            </div>

            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <label for="dob" class="">Enter Date of Birth</label>
                </div>
                <div class="col-3">
                    <input type="date" value="2000-01-01" name="dob" class="form-control" id="dob" >
                </div>
            </div>

            <hr>
            <section class="workhistory">
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-danger mt-3 d-inline">Work History</h5>
                        <span class="btn btn-info float-end text-light" id="newWorkHistory">New Work History</span>
                    </div>
                </div>

                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">Position</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="work_history_position[]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">Company Name</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="work_history_company_name[]" class="form-control">
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">Start Date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="work_history_start_date[]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">End Date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="work_history_end_date[]" class="form-control">
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-10">
                        <textarea name="work_history_description[]" id="" cols="135" rows="2" class="form-control"></textarea>
                    </div>
                </div>
                <hr>
            </section>
            <section class="education">
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-danger mt-3 d-inline">Education</h5>
                        <span class="btn btn-info float-end text-light" id="addEducation">Add Education</span>
                    </div>
                </div>

                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <label for=""class="form-label">School</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="edu_school[]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">Degree</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="edu_degree[]" class="form-control">
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">Start Date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="edu_start_date[]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">End Date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="edu_end_date[]" class="form-control">
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-10">
                        <textarea name="edu_note[]" id="" cols="135" rows="2" class="form-control"></textarea>
                    </div>
                </div>
            <hr>
        </section>

            <div class="form-group mt-3">
                <input type="submit" value="Create" class="btn btn btn-dark">
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>

    $(document).ready(function() {
        $('#department').on('change', function() {
            let department_id = $(this).val();
            if(department_id) {
                $.ajax({
                    url: '/getPosition/'+department_id,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data)
                    {
                        if(data){
                            $('#position').empty();
                            $('#position').append('<option hidden>Choose Position</option>');
                            $.each(data, function(key , position){
                                $('#position').append('<option value="'+ position.id +'">' + position.name + '</option>');
                            });
                        }else{
                            $('#position').empty();
                        }
                    }
                });
            }else{
                $('#position').empty();
            }
        });
        $('#state').on('change', function() {
            let state = $(this).val();
            if(state) {
                let data = {
    "Ayeyarwady Region"=>[
        'Bogale',
        'Danubyu',
        'Dedaye',
        'Einme',
        'Hinthada',
    ],
    "Bago Region(East)"=>[
        'Bago',
        'Daik-U',
        'Htantabin',
        'Kawa',
        'Kyaukkyi',
    ],
    "Bago Region(West)"=>[
        'Gyobingauk',
        'Letpadan',
        'Minhla',
        'Monyo',
        'Nattalin',
    ],
    "Chin State"=>[
        'Falam',
        'Hakha',
        'Kanpetlet',
        'Matupi',
        'Mindat',
    ],
    "Kachin State"=>[
        'Bhamo',
        'Hpakant',
        'Mohnyin',
        'Mogaung',
        'Myitkyina',
    ],
    "Kayah State"=>[
        'Bawlake',
        'Hpasawng',
        'Loikaw',
        'Demoso',
        'Hpruso',
    ],
    "Kayin State"=>[
        'Hlaingbwe',
        'Hpa-An',
        'Hpapun',
        'Kawkareik',
        'Kyainseikgyi',
    ],
    "Magway Region"=>[
        'Aunglan',
        'Minbu',
        'Myaing',
        'Myothit',
        'Pakokku',
    ],
    "Mandalay Region"=>[
        'Amarapura',
        'Aungmyaythazan',
        'Chanayethazan',
        'Chanmyathazi',
        'Meiktila',
    ],
    "Mon State"=>[
        'Bilin',
        'Chaungzon',
        'Kyaikmaraw',
        'Kyaikto',
        'Mawlamyine',
    ],
    "Nay Pyi Taw"=>[
        'Lewe',
        'Det Khi Na Thi Ri',
        'Oke Ta Ra Thi Ri',
        'Poke Ba Thi Ri',
        'Pyinmana',
    ],
    "Rakhine State"=>[
        'Ann',
        'Buthidaung',
        'Gwa',
        'Kyaukpyu',
        'Kyauktaw',
    ],
    "Sagaing Region"=>[
        'Ayadaw',
        'Banmauk',
        'Budalin',
        'Chaung-U',
        'Hkamti',
    ],
    "Shan State(South)"=>[
        'Hopong',
        'Hsihseng',
        'Kalaw',
        'Kunhing',
        'Kyethi',
    ],
    "Shan State(North)"=>[
        'Hopang',
        'Hseni',
        'Hsipaw',
        'Konkyan',
        'Kunlong',
    ],
    "Shan State(East)"=>[
        'Kengtung',
        'Monghpyak',
        'Monghsat',
        'Mongkhet',
        'Mongla',
    ],
    "Tanintharyi Region"=>[
        'Bokpyin',
        'Dawei',
        'Kawthoung',
        'Kyunsu',
        'Launglon',
        'Myeik',
        'Palaw',
        'Tanintharyi',
        'Thayetchaung',
        'Yebyu',
    ],
    "Yangon Region"=>[
        'Ahlone',
        'Bahan',
        'Botahtaung',
        'Cocokyun',
        'Dagon',
        'Dagon Myothit (East)',
        'Dagon Myothit (North)',
        'Dagon Myothit (Seikkan)',
        'Dagon Myothit (South)',
        'Dala',
        'Dawbon',
        'Hlaing',
        'Hlaingtharya (East)',
        'Hlaingtharya (West)',
        'Hlegu',
        'Hmawbi',
        'Htantabin',
        'Insein',
        'Kamaryut',
        'Kawhmu',
        'Kayan',
        'Kungyangon',
    ],
                };

let city = data.state;
                if(city){
                    $('#city').empty();
                    $('#city').append('<option hidden>Choose City</option>');
                    $.each(city, function(key , name){
                        $('#city').append('<option value="'+ name +'">' + name + '</option>');
                    });
                }else{
                    $('#city').empty();
                }
            }else{
                $('#city').empty();
            }
        });
    });

    $("#newWorkHistory").click(function(){
        $(".workhistory").append(`
            <div id="anotherWorkHistory">
                <div class="row">
                    <div class="col-12">
                        <h6 class="text-info mt-3 d-inline">Another Work History</h6>
                        <span class="btn btn-info float-end text-light del-workhistory"><i class="fa-solid fa-trash-can"></i></span>
                    </div>
                </div>

                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">Position</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="work_history_position[]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">Company Name</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="work_history_company_name[]" class="form-control">
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">Start Date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="work_history_start_date[]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">End Date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="work_history_end_date[]" class="form-control">
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-10">
                        <textarea name="work_history_description[]" id="" cols="135" rows="2" class="form-control"></textarea>
                    </div>
                </div>
                <hr>
            </div>
        `);
    });
    $(".workhistory").delegate(".del-workhistory","click",function(){
            $(this).parentsUntil(".workhistory").remove();
    });

    $("#addEducation").click(function(){
        $(".education").append(`
                <div id="anotherEducation">
                    <div class="row">
                    <div class="col-12">
                        <h6 class="text-info mt-3 d-inline">Another Education</h6>
                        <span class="btn btn-info float-end text-light del-education"><i class="fa-solid fa-trash-can"></i></span>
                    </div>
                </div>

                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">School</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="edu_school[]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">Degree</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="edu_degree[]" class="form-control">
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">Start Date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="edu_start_date[]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">End Date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="edu_end_date[]" class="form-control">
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-10">
                        <textarea name="edu_note[]" id="" cols="135" rows="2" class="form-control"></textarea>
                    </div>
                </div>
            <hr>
                </div>
        `);
    })
    $(".education").delegate(".del-education","click",function(){
            $(this).parentsUntil(".education").remove();
    });



</script>
@endsection

