
@extends('layouts.appadmin')

@section('title')
    liste ses catégories
@endsection

@section('contenu')
<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Catégories</h3>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="QA_section">
                            <div class="white_box_tittle list_header">
                                <h4>Liste des catégories</h4>
                                @if (Session::has('status'))
                                    <div class="alert alert-success">
                                        {{Session::get('status')}}
                                    </div>
                                @endif
                                <div class="box_right d-flex lms_block">
                                    <div class="serach_field_2">
                                        <div class="search_inner">
                                            <form Active="#">
                                                <div class="search_field">
                                                    <input type="text" placeholder="Rechercher">
                                                </div>
                                                <button type="submit"> <i class="ti-search"></i> </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="QA_table mb_30">
                                <!-- table-responsive -->
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Order</th>
                                        <th scope="col">Categorie</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->category_name}}</td>
                                            <td class="action_btns d-flex">
                                                <a href="#" class="action_btn mr_10" onclick="window.location ='{{url('/edit_categorie/'.$category->id)}}'"><i class="fa fa-edit"></i></a>
                                                <a href="{{url('/supprimercategorie/'.$category->id)}}" class="action_btn" id="delete" > <i class="fas fa-trash"></i> </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
