@extends('admin.main')
@section('admin-content')
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Update Post</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form for show edit-->
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
                @endif
                <form id="postForm" class="custom-style" action="{{route('post.update',['id'=>$post->id])}}"
                    method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="hidden" name="post_id" class="form-control" value="1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{$post->title}}">
                    </div>
                    <div class="form-group">
                        <label for="body"> Description</label>
                        <textarea name="body" id="body" class="form-control" rows="5">{{$post->body}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option disabled> Select Category</option>
                            @foreach ($categories as $cat)
                            <option {{$cat->id==$post->category_id ? 'selected':''}} value="{{$cat->id}}">{{$cat->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Post image</label>
                        <br>
                        {{-- <img src="data:image/jpeg;base64,{{ base64_encode($post->post_image) }}" height="150px" />
                        --}}
                        {{-- <img src="{{ $post->post_image }}" class="img-thumbnail" height="150px" /> --}}
                        <input type="file" id="image_file">
                        <input type="hidden" name="post_image" id="post_image">
                    </div>
                    <div style="display:none" id="alertMsg" class="alert alert-danger">All fields are required!</div>
                    <input type="button" id="btnSubmit" class="btn btn-primary" value="Update" />
                </form>
                <!-- Form End -->
            </div>
        </div>
    </div>
</div>


<script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-storage.js"></script>
<script>
    var firebaseConfig = {
          apiKey: "AIzaSyB8uU_MAPsI5kZDtgbG7uIJt0h6oasYYQk",
          authDomain: "collaborative-blogging-site.firebaseapp.com",
          projectId: "collaborative-blogging-site",
          storageBucket: "collaborative-blogging-site.appspot.com",
          messagingSenderId: "84007786016",
          appId: "1:84007786016:web:faaa7f942562f6276f8e45",
          measurementId: "G-VRNW5NRY3B"
      };
      firebase.initializeApp(firebaseConfig);
</script>

<script>
    document.getElementById("image_file").addEventListener("change", function (e) {
        let image_file = document.getElementById("image_file").files[0];
        let image_name = Math.floor((new Date()).getTime() / 1000)+"_"+image_file.name;
        document.getElementById("post_image").value = image_name;
            // console.log(image_file,image_name);
    });

    document.getElementById("btnSubmit").addEventListener("click", function (e) {
            if (document.getElementById("title").value == '' || 
                document.getElementById("body").value == '' || 
                document.getElementById("category_id").value == '') {
                document.getElementById("alertMsg").style.display="block"
                return false;
            }else{
                document.getElementById("alertMsg").style.display="none"
            }


if (document.getElementById("post_image").value!=='') {
            let image_file = document.getElementById("image_file").files[0];
            let image_name = Math.floor((new Date()).getTime() / 1000)+"_"+image_file.name;
                // console.log(image_name);
            var storage = firebase.storage().ref(image_name);
            var upload = storage.put(image_file);
            document.getElementById("btnSubmit").disabled= true;
            upload.on(
                "state_changed",
                function progress(snapshot) {
                    // var percentage = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
                    document.getElementById("btnSubmit").value = "Submitting..";
                },
                
                function error() {
                    document.getElementById("btnSubmit").disabled= false;
                    alert("Error uploading file");
                },
                
                function complete() {
                    // document.getElementById(
                        //     "uploading"
                        // ).innerHTML += `${image_name} upoaded <br />`;
                        // getFileUrl(image_name)
                        document.getElementById("post_image").value = image_name;
                        // document.getElementById("btnSubmit").disabled= false;

                    document.getElementById("postForm").submit();
                }
            );
        }else{
                    document.getElementById("postForm").submit();
        }
    });

</script>
@endsection
