@extends('layouts.main')

@section('content')
<div class="container">
    <div class="profile-page">
        <div class="cover">
            <div class="cover-img">
                <img src="{{asset('storage/logos/mailchimp-0qnRfgnZIsI-unsplash (1).jpg')}}" alt="" class="img-fluid w-100">
            </div>
            <div class="profile-pic">
                <img src="https://picsum.photos/200/300" alt="" class="img-fluid">
            </div>
            <div class="profile-pic-edit dropend">
                <i class="fa-sharp fa-solid fa-camera" data-bs-toggle="dropdown" aria-expanded="false"></i>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-eye"></i><span class="px-2">View Photo</span></a></li>
                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-pencil"></i><span class="px-2">Update Photo</span></a></li>
                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-trash-can"></i><span class="px-2">Remove Photo</span></a></li>
                </ul>
            </div>
            <div class="edit-cover dropup">
                <button class="btn btn-sm btn-light" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-camera px-1"></i>
                    <span class="px-1">Edit Cover</span>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-eye"></i><span class="px-2">View Photo</span></a></li>
                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-pencil"></i><span class="px-2">Update Photo</span></a></li>
                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-trash-can"></i><span class="px-2">Remove Photo</span></a></li>
                </ul>
            </div>
            <div class="edit-profile">
                <button class="btn btn-sm btn-post"><i class="fa-solid fa-circle-plus px-1"></i><span class="px-1">Add Story</span></button>
                <button class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-user-pen px-1"></i><span class="px-1">Edit Profile</span></button>
            </div>
            <div class="profile-data">
                <div class="user-name pb-4">
                    <h2>{{Auth::user()->name}}</h2>
                    <span>@</span><span>{{Auth::user()->username}}</span>
                </div>
                <p>{{Auth::user()->bio}}</p>
                <div class="row user-info">
                    <div class="col-4">
                        <div>
                            <span class="count">1000</span><span class="mx-2">Followers</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div>
                            <span class="count">500</span><span class="mx-2">Following</span>
                        </div>                                        
                    </div>
                    <div class="col-4">
                        <div>
                            <span class="count">75</span><span class="mx-2">Posts</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laborum maxime praesentium ea, laudantium at nostrum! Quod, dolorum. Possimus unde dolorum, doloribus aspernatur voluptas, beatae corrupti eos at suscipit magni modi.</div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST">
            @csrf
            <div class="form-group mb-5">
                <label for="name">Name</label>
                <input id="name" type="text" class="form-control form-control-lg">
            </div>
            <div class="form-group mb-5">
                <label for="bio">Bio</label>
                <textarea name="bio" id="bio" class="form-control form-control-lg" style="height: 100px"></textarea>
            </div>
            <div class="form-group mb-5">
                <label for="date_of_birth">Birthday</label>
                <input id="date_of_birth" type="date" class="form-control form-control-lg">
            </div>
            <div class="form-group mb-5">
                <label for="address">Location</label>
                <input id="address" type="text" class="form-control form-control-lg">
            </div>
            <div class="">
                <button type="submit" class="btn btn-secondary btn-lg fw-bold">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
