@extends('layouts.main')

@section('content')
<div class="container">
    <div class="profile">
        <div class="cover" style="position: relative;">
            <div>
                <img src="{{asset('storage/logos/mailchimp-0qnRfgnZIsI-unsplash (1).jpg')}}" alt="" class="img-fluid w-100" style="height: 300px; object-fit:cover">
            </div>
            <div class="profile-pic" style="position: absolute; left:10%; bottom:-50%; border: 5px solid white; background: white; border-radius:50%">
                <img src="https://picsum.photos/200/300" alt="" class="img-fluid" style="border-radius: 50%; height:200px; width:200px;">
            </div>
            <div style="position: absolute; left:32%; top:110%; right:15%">
                <div class="pb-4" style="line-height: 1px">
                    <h2 style="font-weight: 900">JimmyTheMad</h2>
                    <span>@</span><span>jimmy</span>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur explicabo natus voluptatem, numquam vero quam cumque, provident veritatis quasi asperiores illo? Impedit distinctio fuga, doloremque optio cum esse eligendi totam.</p>
                <div class="row profile-info g-0">
                    <div class="col-4">
                        <div>
                            <span>1000</span><span class="mx-2">Followers</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div>
                            <span>500</span><span class="mx-2">Following</span>
                        </div>                                        
                    </div>
                    <div class="col-4">
                        <div>
                            <span>75</span><span class="mx-2">Posts</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr style="margin-top:20%">
    </div>
</div>
@endsection
