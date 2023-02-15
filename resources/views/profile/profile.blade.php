@extends('layouts.main')

@section('content')
<div class="container">
    <div class="profile-page" id="profile">
        <div class="top-profile">
            <div class="cover">
                <img src="{{asset('storage/logos/mailchimp-0qnRfgnZIsI-unsplash (1).jpg')}}" alt="" class="img-fluid w-100">
            </div>
            <div class="profile-pic">
                <img src="https://picsum.photos/200/300" alt="" class="img-fluid">
            </div>
            <div class="edit-cover dropup">
                <button class="btn btn-sm btn-light" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-camera px-1"></i>
                    <span class="px-1">Edit Cover</span>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fa-solid fa-eye"></i>
                            <span class="px-2">View Photo</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fa-solid fa-pencil"></i>
                            <span class="px-2">Update Photo</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fa-solid fa-trash-can"></i>
                            <span class="px-2">Remove Photo</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="edit-profile">
                <button class="btn btn-sm btn-warning"><i class="fa-solid fa-circle-plus px-1"></i><span class="px-1">Add Story</span></button>
                <button class="btn btn-sm btn-secondary" onclick="edit_profile({{Auth::user()->id}})"><i class="fa-solid fa-user-pen px-1"></i><span class="px-1">Edit Profile</span></button>
            </div>
        </div>
        <div class="profile-data">
            <div class="container">
                <div class="user-name pb-4">
                    <h2>{{Auth::user()->name}}</h2>
                    <span>@</span><span>{{Auth::user()->username}}</span>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <p>{{Auth::user()->bio}}</p>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
                <div class="row user-data mb-3">
                    <div class="col-4">
                        <span class="count">1000</span><span class="mx-2">Followers</span>
                    </div>
                    <div class="col-4">
                        <span class="count">500</span><span class="mx-2">Following</span>
                    </div>
                    <div class="col-4">
                        <span class="count">75</span><span class="mx-2">Posts</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" value="" id="id" name="id"/>
            <input type="hidden" value="{{ Auth::user()->id }}" id="id" name="id"/>
            <div class="form-pic">
                <div class="modal-cover">
                    <img id="preview-one" src="{{asset('storage/logos/mailchimp-0qnRfgnZIsI-unsplash (1).jpg')}}" alt="" class="img-fluid w-100">
                </div>
                <div class="modal-profile-pic">
                    <img id="preview" src="https://picsum.photos/200/300" alt="" class="img-fluid">
                </div>
            </div>
            <div class="form-group mb-5">
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control form-control-lg">
            </div>
            <div class="form-group mb-5">
                <label for="bio">Bio</label>
                <textarea name="bio" class="form-control form-control-lg" style="height: 100px"></textarea>
            </div>
            <div class="form-group mb-5">
                <label for="date_of_birth">Birthday</label>
                <input name="date_of_birth" type="date" class="form-control form-control-lg">
            </div>
            <div class="form-group mb-5">
                <label for="address">Location</label>
                <input name="address" type="text" class="form-control form-control-lg">
            </div>
          </form>
        </div>
        <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-secondary btn-lg fw-bold">Save</button>
        </div>
      </div>
    </div>
</div>

<!-- View Profile Modal -->

@endsection

<script type="text/javascript">
    var save_method; //for save method string
    function edit_profile(id)
    {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        //Ajax Load data from ajax
        $.ajax({
            url : "profile/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id"]').val(data[0].id);
                $('[name="name"]').val(data[0].name);
                $('[name="bio"]').val(data[0].bio);
                $('[name="address"]').val(data[0].address);
                $('[name="date_of_birth"]').val(data[0].date_of_birth);
                //$('#preview').attr('src', "/storage/posts/" + img);
                //$('#preview-one').attr('src', "/storage/posts/" + img_one);
                $('#staticBackdrop').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Profile'); // Set title to Bootstrap modal title
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                // alert('Error get data from ajax');
                new swal({   title: "Error",
                    text: "Error getting data from ajax.",
                    timer: 2500,
                    type: "error",
                    showConfirmButton: false
                });
            }
        });
    }
    
    function save()
    {
        $('#progress').show();
        var url;
        var id = document.getElementById('id').value;
            url = "profile/" + id;
            t = "PUT";
        // ajax adding data to database
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : url,
            type: t,
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data) {
                //if success close modal and reload
                $('#progress').hide();
                $('#staticBackdrop').modal('hide');
                new swal({   
                    icon: 'success',
                    text: "Profile Updated successfully.",
                    timer: 2500,
                    type: "success",
                    showConfirmButton: false
                });
                $('#profile').load(document.URL +  ' #profile');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                // alert('Error adding / update data');
                new swal({   title: "Error",
                    text: "Error adding / updating data.",
                    // timer: 1000,
                    type: "error",
                    showConfirmButton: true
                });
            }
        });
    }
   
</script>