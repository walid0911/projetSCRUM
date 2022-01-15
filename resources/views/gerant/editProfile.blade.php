@extends("layouts.app")

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container pb-5">
        <h1 class="pt-3 pb-2 px-3">Edit Profile</h1>
        <hr>
        <div class="row">
            <form action="/gerant/profile" class="form-horizontal" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
                <!-- left column -->
                <div class="col-md-3 mt-4 float-start" >
                    <div class="text-center">
                        @if($gerant->IMG_USER == null)
                            <img style="width:600px;" class="img-circle img-thumbnail isTooltip" src="{{asset('storage/uploads/default.jpg')}}">
                        @else
                            <img style="width:600px;" class="img-circle img-thumbnail isTooltip" src="{{asset('storage/uploads/' . $gerant->IMG_USER)}}">
                        @endif
                        <h6>Upload a different photo...</h6>
                        <input type="file" class="form-control" name="IMG_USER" accept="image/*">
                    </div>
                </div>

                <div class="col-md-8  float-end">
                    <h3>Personal info</h3>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Full Name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="<?= $gerant->NOM; ?>" name="NOM">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">username:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="<?= $gerant->USERNAME; ?>" name="USERNAME">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Telephone:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="<?= $gerant->TEL; ?>" name="TEL">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Pays:</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="<?= $gerant->PAYS;?>" name="PAYS">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Ville:</label>
                        <div class="input-group" style="width: 565px;">
                            <input class="form-control" type="text" value="<?= $gerant->VILLE;?>" name="VILLE">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-primary" value="Save Changes">
                            <span></span>
                            <input type="reset" class="btn btn-default" value="Cancel">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
