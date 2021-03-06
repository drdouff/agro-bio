

@extends('layouts.appadmin')

@section('title')
   liste des produits
@endsection
{{Form::hidden('', $increment=1)}}
@section('contenu')
<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Liste des produits</h3>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="QA_section">
                            <div class="white_box_tittle list_header">
                                <h4>Produit</h4>
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
                                                    <input type="text" placeholder="Search content here...">
                                                </div>
                                                <button type="submit"> <i class="ti-search"></i> </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="QA_table mb_30">
                                <!-- table-responsive -->
                                <table class="table lms_table_active ">
                                    <thead>
                                    <tr>
                                        <th>order</th>
                                        <th>Image</th>
                                        <th scope="col">nom du produit</th>
                                        <th scope="col">Cat??gorie</th>
                                        <th scope="col">Prix</th>
                                        <th scope="col">Statut</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($produits as $produit)
                                        <tr>
                                            <td>{{$increment}}</td>
                                            <td> <img src="/storage/product_image/{{$produit->product_image}}" height="52" class="radius_50"></td>
                                            <td>{{$produit->product_name}}</td>
                                            <td>{{$produit->product_category}}</td>
                                            <td>{{$produit->product_price}}</td>
                                            <td>
                                                @if($produit->status == 1)
                                                    <label class="badge badge-success">Activer</label>
                                                @else
                                                    <label class="badge badge-danger">Desactive</label>
                                                @endif
                                            </td>
                                            <td class="action_btns d-flex">
                                                <a href="#" class="action_btn mr_10" onclick="window.location ='{{url('/edit_produit/'.$produit->id)}}'"><i class="fa fa-edit"></i></a>
                                                <a href="{{url('/suprimerproduit/'.$produit->id)}}" class="action_btn" id="delete" > <i class="fas fa-trash"></i></a>
                                                @if($produit->status == 1)
                                                    <button  class="btn btn-outline-warning" onclick="window.location ='{{url('/desactiver_produit/'.$produit->id)}}'">Desactive</button>
                                                @else
                                                    <button  class="btn btn-outline-success" onclick="window.location ='{{url('/active_produit/'.$produit->id)}}'">Active</button>
                                                @endif
                                            </td>
                                        </tr>
                                        {{Form::hidden('', $increment=$increment + 1)}}
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
