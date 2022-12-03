@extends('../layouts.mainlayout')

@section('title', 'Users')

@section('aside')
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="/dashboard">
                <img src="../assets/images/icon.png" class="navbar-brand-img h-100" alt="main_logo" />
                <span class="ms-1 font-weight-bold">Suki Dashboard</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0" />
        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/order">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-cart text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Orders</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/product">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bag-17 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/custom">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-app text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Customs</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/user">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-circle-08 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Users</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                        Account pages
                    </h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/profile">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
@endsection

@section('action')
<div class="card shadow-lg mx-4 mt-3">
    <div class="card-body">
        <div class="row gx-4">
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                <div class="nav-wrapper position-relative end-0">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <form class="input-group" action="" method="get">
                        <div class="input-group">
                        <input type="text" class="form-control ms-4" name="keyword" placeholder="Type here..." aria-label="Type here..." aria-describedby="button-addon2">
                        <button class="btn bg-gradient-dark  mb-0" name="caridata" type="submit" id="button-addon2">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
            <div class="d-flex align-items-center">
                <h6>Users table</h6>
                <button class="btn btn-success btn-sm ms-auto " data-bs-toggle="modal" data-bs-target="#createModal">
                New User
                </button>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                @if(Session::has('status'))
                    <div class="alert alert-success ms-1 my-3 font-weight-bold" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                No
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Avatar
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                @sortablelink('name', 'Nama')
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                @sortablelink('phone', 'No. Telepon')
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                @sortablelink('username', 'Username')
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                @sortablelink('email', 'Email')
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userList as $data)
                        <tr>
                            <td class="align-middle text-center py-4">
                                <span class="text-secondary text-xs font-weight-bold">{{$loop->iteration + $userList->firstItem() - 1}}</span>
                            </td>
                            <td class="align-middle text-center">
                                <img src="" class="avatar avatar-sm me-2" alt="user1" />
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{$data->name}}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{$data->phone}}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{$data->username}}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{$data->email}}</span>
                            </td>
                            <td class="align-middle text-center">
                                <a data-bs-toggle="modal" data-bs-target="#detailModal{{$data->id}}">
                                    <i class="fas fa-eye text-green-300"></i>
                                </a>
                                <a data-bs-toggle="modal" data-bs-target="#updateModal{{$data->id}}">
                                    <i class="fas fa-edit text-green-300 px-2"></i>
                                </a>
                                <a data-bs-toggle="modal" data-bs-target="#deleteModal{{$data->id}}">
                                    <i class="fas fa-trash text-green-300"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div class="my-4 ms-2 me-2">
                    {!! $userList->appends(Request::except('page'))->render('pagination::bootstrap-5') !!}
                </div>
            </div>
            @foreach ($userList as $item)

                <!-- Detail Modal -->
                <div class="modal fade" id="detailModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Detail Pengguna</h4>
                        <a type="button" data-bs-dismiss="modal" aria-label="Close">
                            <b>X</b>
                        </a>
                        </div>
                        <div class="modal-body">
                            Nama pengguna : {{$item->name}} <br>
                            Role : {{$item->roles->name}} <br>
                            Alamat : {{$item->address}}
                        </div>
                    </div>
                    </div>
                </div>
                <!-- End Detail Modal -->

                <!-- Update Modal -->
                <div class="modal fade" id="updateModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit User</h4>
                                <a type="button" data-bs-dismiss="modal" aria-label="Close">
                                    <b>X</b>
                                </a>
                            </div>
                            <div class="modal-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li><b>{{$error}}</b></li>
                                            @endforeach
                                        </ul>
                                    </div>    
                                @endif
                                <form action="/user/{{$item->id}}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Nama User</label>
                                        <input class="form-control" type="text" name="name" id="name" value="{{$item->name}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input class="form-control" type="email" name="email" id="email" value="{{$item->email}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">No. Telepon</label>
                                        <input class="form-control" type="text" name="phone" id="phone" value="{{$item->phone}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Alamat</label>
                                        <textarea class="form-control" type="text" name="address" id="address" rows="3" required>{{$item->address}}</textarea>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Update Modal -->

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">Hapus Pengguna</h4>
                            <a type="button" data-bs-dismiss="modal" aria-label="Close">
                                <b>X</b>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger font-weight-bold" role="alert">Apakah anda yakin akan menghapus data pengguna {{$item->name}}?</div>
                        </div>
                        <div class="modal-footer">
                            <form action="/user-destroy/{{$item->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" >Delete</button>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- End Delete Modal -->
            @endforeach

            <!-- Create Modal -->
            <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <script type="text/javascript">
                            @if (count($errors) > 0)
                                $('#createModal').modal('show');
                            @endif
                        </script>
                        <div class="modal-header">
                            <h4 class="modal-title">Pengguna Baru</h4>
                            <a type="button" data-bs-dismiss="modal" aria-label="Close">
                                <b>X</b>
                            </a>
                        </div>
                        <div class="modal-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li><b>{{$error}}</b></li>
                                        @endforeach
                                    </ul>
                                </div>    
                            @endif
                            <form action="user" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama Pengguna</label>
                                    <input class="form-control" type="text" name="name" id="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="email" name="email" id="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="text" name="password" id="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">No. Telepon</label>
                                    <input class="form-control" type="text" name="phone" id="phone" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <textarea class="form-control" type="text" name="address" id="address" rows="3" required></textarea>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Create Modal -->
            </div>
        </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{asset('js/core/popper.min.js')}}"></script>
    <script src="{{asset('js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('js/plugins/smooth-scrollbar.min.js')}}"></script>
    <script>
    var win = navigator.platform.indexOf("Win") > -1;
    if (win && document.querySelector("#sidenav-scrollbar")) {
        var options = {
        damping: "0.5",
        };
        Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
    }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('js/argon-dashboard.min.js')}}"></script>
@endsection