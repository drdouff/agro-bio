@extends('layouts.appadmin')


@section('title')
    Modifier categorie
@endsection


@section('contenu')
<div class="main_content_iner ">
    <div class="container-fluid p-0">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="dashboard_header mb_50">
            <div class="row">
              <div class="col-lg-6">
                <div class="dashboard_header_title">
                  <h3> Tableau de Board</h3>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="dashboard_breadcam text-right">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="white_box mb_30">
            <div class="row justify-content-center">
              <div class="col-lg-6">
                <!-- sign_in  -->
                <div class="modal-content cs_modal">
                  <div class="modal-header theme_bg_1 justify-content-center">
                    <h5 class="modal-title text_white">Modifier Categories</h5>
                  </div>
                  <div class="modal-body">
                    @if (Session::has('status'))
                        <div class="alert alert-success">
                          {{Session::get('status')}}
                        </div>
                    @endif
                    @if (count($errors)> 0)
                        <ul>
                          <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                              <li>{{$error}}</li>
                          @endforeach
                          </div>
                        </ul>
                    @endif
                    {!!Form::open(['action' => 'CategoriesController@modifiercategorie', 'methode' => 'POST', 'id' => 'commentForm'])!!}
                        {{csrf_field()}}
                            <div class="form-group">
                                {{Form::hidden('id', $categorie->id)}}
                              {{Form::text('category_name', $categorie->category_name, ['class' => 'form-control', 'id' => 'cname'])}}
                            </div>
                        {{--Form::submit('Ajouter', ['class'=> 'btn btn-primary'])--}}
                        <button type="submit" class="btn_1 full_width text-center">Modifier</button>
                    {!!Form::close()!!}
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script src={{asset("backend/js/form-validation.js")}}></script>
<script src={{asset("backend/js/bt-maxlength.js")}}></script>
@endsection
