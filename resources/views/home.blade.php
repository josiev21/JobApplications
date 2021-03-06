@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color:rgba(255, 255, 255, 0.788);">
                <div class="card-header">ERA CAREER</div>
                <div class="card-body">
                    
                    <h2>Hi {{Auth::user()->name}},</h2>
                    @if(Auth::user()->image !== NULL)
                    <p>Anda telah mengupload foto dan CV anda. Silahkan klik 'next' untuk ke halaman selanjutnya, atau anda bisa mengupdate foto dan CV anda dengan klik 'choose file'.</p>
                    @else 
                    <p>Anda belum memiliki foto dan CV. Silahkan mengunduh foto dan CV anda untuk melanjutkan ke halaman selanjutnya.</p>
                    @endif
                </div>
                <div class="card-body">
                    <form action="{{route('home')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for=""><b>Unduh Gambar Profile</b></label><br>
                        <input type="file" name="image" class="mb-3" onchange="loadPreview(this);" id="profile_image">
                        <img id="preview_img" src="{{asset('/storage/images/'.Auth::user()->image)}}" class="img-thumbnail" style="max-width: 250px;" />

                        <br>
                        <label for=""><b>Unduh CV</b></label><br>
                        <input type="file" name="file" class="mb-3" >
                        <label for="">{{Auth::user()->file ?? 'No File Upload'}}</label>
                        <br>

                        
                            <label for="inputEmail4">Select Job Category</label>
                            <select id="inputState" name="category" class="form-control">
                                <option value="{{Auth::user()->category}}" selected>{{Auth::user()->category}}</option>
                                <option value="IT">IT</option>
                                <option value="HRD">HRD</option>
                                <option value="Finance">Finance</option>
                                <option value="Product">Product</option>
                                <option value="Sales">Sales</option>
                                <option value="Legal">Legal</option>
                                <option value="Social Media">Social Media</option>

                                <option value="Others">Others</option>
                  
                              </select>          
                        <input type="submit" value="Submit" class="btn btn-primary mt-3" >
                        <a class=" btn btn-primary mt-3" href="/user-detail " role="button" style="float:right;">Next</a>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function loadPreview(input, id) {
      id = id || '#preview_img';
      if (input.files && input.files[0]) {
          var reader = new FileReader();
   
          reader.onload = function (e) {
              $(id)
                      .attr('src', e.target.result, '.img-thumbnail')
                      .width(200)
                      .height(150);
          };
   
          reader.readAsDataURL(input.files[0]);
      }
   }
  </script>
@endsection