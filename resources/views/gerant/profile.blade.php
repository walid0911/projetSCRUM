@extends("layouts.app")

@section('content')

    <div class="container bootstrap snippets bootdey mt-5 mb-5 ">
        <div class="panel-body inf-content">
            <div class="row">
                <div class="col-md-4">
                    @if($gerant->IMG_USER == null)
                        <img style="width:600px;" class="img-circle img-thumbnail isTooltip" src="{{asset('img')}}default.jpg">
                    @else
                        <img style="width:600px;" class="img-circle img-thumbnail isTooltip" src=" {{asset('img')}}/profiles/{{$gerant->IMG_USER}}">
                    @endif
                </div>
                <div class="col-md-6 p-3">
                    <div class="table-responsive">
                        <table class="table table-user-information">
                            <tbody>
                            <tr>
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                        Identificacion
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    {{$gerant->id}}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                        Role
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    {{"Gerant du restaurant"}}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-user  text-primary"></span>
                                        Nom
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    <?= $gerant->NOM;?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-cloud text-primary"></span>
                                        username
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    <?= $gerant->USERNAME;?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-bookmark text-primary"></span>
                                        Email
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    <?= $gerant->email;?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-eye-open text-primary"></span>
                                        Restaurant
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    @if($gerant->ID_REST == null)
                                        {{"not set yet! "}} <a href="#">Ajouter restaurant</a>
                                    @else
                                        Restaurent infos....
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-eye-open text-primary"></span>
                                        Telephone
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    <?= $gerant->TEL;?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-envelope text-primary"></span>
                                        Pays - Ville
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    <?= $gerant->PAYS . " " . $gerant->VILLE;?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-calendar text-primary"></span>
                                        Created At
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    <?= $gerant->created_at ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <a href="profile/edit"><button type="button" class="btn btn-outline-danger float-lg-end noBtnTransition">Edit Profile</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
