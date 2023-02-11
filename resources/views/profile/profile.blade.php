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
            <div class="profile-pic-edit">
                <i class="fa-sharp fa-solid fa-camera"></i>
            </div>
            <div class="edit-cover">
                <button class="btn btn-sm btn-light"><i class="fa-solid fa-camera px-1"></i><span class="px-1">Edit Cover</span></button>
            </div>
            <div class="edit-profile">
                <button class="btn btn-sm btn-post"><i class="fa-solid fa-circle-plus px-1"></i><span class="px-1">Add Story</span></button>
                <button class="btn btn-sm btn-secondary"><i class="fa-solid fa-user-pen px-1"></i><span class="px-1">Edit Profile</span></button>
            </div>
            <div class="profile-data">
                <div class="user-name pb-4">
                    <h2>JimmyTheMad</h2>
                    <span>@</span><span>jimmy</span>
                </div>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum debitis repellat, nobis maxime delectus qui similique pariatur tenetur officiis unde laboriosam rem soluta! Perferendis qui hic iure porro delectus placeat?</p>
                <div class="row user-info g-0">
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
        <hr>
    </div>
    <div>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laborum maxime praesentium ea, laudantium at nostrum! Quod, dolorum. Possimus unde dolorum, doloribus aspernatur voluptas, beatae corrupti eos at suscipit magni modi.</div>
</div>
@endsection
