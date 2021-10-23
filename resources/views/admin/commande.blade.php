
@extends('layouts.appadmin')

@section('title')
    commande
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
                                <h3 class="m-0">slider</h3>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="QA_section">
                            <div class="white_box_tittle list_header">
                                <h4>Liste des sliders</h4>
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
                                <table class="table ">
                                    <thead>
                                    <tr>
                                        <th scope="col">order</th>
                                        <th scope="col">Nom du Client</th>
                                        <th scope="col">adresse</th>
                                        <th scope="col">panier</th>
                                        <th scope="col">payment id</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">000</a></th>
                                        <td>toto</td>
                                        <td>douala</td>
                                        <td>tomate</td>
                                        <td>pay</td>
                                        <td class="action_btns d-flex">
                                            <button class="btn btn-btn-outline-primary mb-0" type="button"><i class="fa fa-eye"></i></button>
                                            {{--<a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                            <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>--}}
                                        </td>
                                    </tr>
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