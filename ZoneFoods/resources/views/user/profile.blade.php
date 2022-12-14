<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="{{asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{asset('assets/css/light-bootstrap-dashboard.css?v=2.0.0') }} " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('assets/css/demo.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <style>
    /**
 scroll css
 */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: transparent;
    }

    ::-webkit-scrollbar-thumb {
        background: hsl(135, 88%, 75%);
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: hsl(0, 0%, 70%);
    }

    @media(max-width: 500px) {
        #hide {
            display: none;
        }
    }

    body {
        background-color: #b3cde4;
        color: #69707a;
    }

    .img-account-profile {
        height: 10rem;
    }

    .rounded-circle {
        border-radius: 50% !important;
    }

    .card {
        box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
    }

    .card .card-header {
        font-weight: 500;
    }

    .card-header:first-child {
        border-radius: 0.35rem 0.35rem 0 0;
    }

    .card-header {
        padding: 1rem 1.35rem;
        margin-bottom: 0;
        background-color: rgba(33, 40, 50, 0.03);
        border-bottom: 1px solid rgba(33, 40, 50, 0.125);
    }

    .form-control,
    .dataTable-input {
        display: block;
        width: 100%;
        padding: 0.875rem 1.125rem;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1;
        color: #69707a;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #c5ccd6;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.35rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .nav-borders .nav-link.active {
        color: #0061f2;
        border-bottom-color: #0061f2;
    }

    .nav-borders .nav-link {
        color: #69707a;
        border-bottom-width: 0.125rem;
        border-bottom-style: solid;
        border-bottom-color: transparent;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        padding-left: 0;
        padding-right: 0;
        margin-left: 1rem;
        margin-right: 1rem;
    }
    </style>
</head>

<body>
    @include('header')
    <!-- End Navbar -->
    <div style="padding-top: 100px">
        <div class="container-xl px-4 mt-4">
            <!-- Account page navigation-->
            <div class="row">
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">???nh ?????i Di???n</div>
                        <div class="card-body text-center">
                            <!-- Profile picture image-->
                            <img class="img-account-profile rounded-circle mb-2"
                                src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">


                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">H??? s?? c?? nh??n</div>
                        <div class="card-body">

                            <form action="/updateProfile/{{$user->id}}" onsubmit="return question();" method="POST">
                                <!-- Form Group (username)-->
                                <div class="mb-3">
                                    <label class="small mb-1">H??? v?? t??n</label>
                                    <input class="form-control" name="name" type="text"
                                        placeholder="Nh???p h??? t??n c???a b???n..." value="{{$user->name}}" required>
                                </div>
                                <!-- Form Row-->
                                <div class=" mb-3">
                                    <!-- Form Group (first name)-->

                                    <label class="small mb-1">Email</label>
                                    <input class="form-control" type="Email" name="email" readonly
                                        placeholder="Nh???p v??o Email c???a b???n..." value="{{$user->email}}" required>

                                    <!-- Form Group (last name)-->

                                </div>
                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="small mb-1">?????a ch???</label>
                                    <input class="form-control" type="text" name="address"
                                        placeholder="Nh???p ?????a ch??? c???a b???n..." value="{{$user->adress}}" required>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (phone number)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1">S??? ??i???n tho???i</label>
                                        <input class="form-control" name="phoneNumber" type="tel"
                                            placeholder="Nh???p s??? ??i???n tho???i c???a b???n..." value="{{$user->phoneNumber}}"
                                            required>
                                    </div>
                                    <!-- Form Group (birthday)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1">Ng??y t???o t??i kho???n</label>
                                        <input class="form-control" type="text" name="dateCreate"
                                            value="{{$user->created_at}}" readonly>
                                    </div>
                                </div>

                                <!-- Save changes button-->
                                <div>
                                    <button class="btn btn-primary" type="submit">C???p nh???t th??ng tin</button>
                                    <a href="#" class="btn btn-primary">?????i m???t kh???u</a>
                                </div>

                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>