<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-12 mb-5">
            <h4 class="text-center">Image Upload with CKEditor</h4>
        </div>
        <div class="col-mg-8">
            <form action="{{ route('images.store') }}" method="post">@csrf
                <div class="row">
                    <div class="col-md-12">
                        <label>Title</label>
                        <input type="text" name="title"
                               class="form-control @error('title') is-invalid @enderror mt-1 rounded-md"
                               placeholder="" value="{{old('title')}}"/>
                        <div class="text-danger">{{ $errors->first('title') }}</div>
                    </div>

                    <div class="col-md-12">
                        <label class="block">Description</label>
                        <textarea id="editor" class="form-control" name="description"
                                  rows="3"></textarea>
                        <div class="text-danger">{{ $errors->first('description') }}</div>
                    </div>
                    <div class="col-lg-12 mt-3 text-center">
                        <button class="btn btn-success" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor.create( document.querySelector( '#editor' ),{
            ckfinder: {
                uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
            }
        })
        .catch( error => {
            console.error( error );
        } );
</script>
</body>
</html>
