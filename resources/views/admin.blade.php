@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Ajouter un <strong>produit</strong>!



                        <!-- Formulaire pour le produit d'admin-->



                            <div class="card-body">
                                <form method="POST" action="{!! url('admin/AddProduits') !!}" accept-charset="UTF-8">
                                    @csrf

                                    <div class="form-group row">

                                        <div class="col-md-6">
                                            <input id="title" placeholder="Product Title" type="text"  name="title" value="{{ old('title') }}" required autofocus>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input id="desc"  placeholder="Description" type="text"  name="desc" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input id="stock"  placeholder="Stock Restant" type="number"  name="stock" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input id="prix"  placeholder="Prix" type="number"  name="prix" required>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input id="picture"  placeholder="Picture URL" type="url"  name="picture" required>
                                        </div>
                                    </div>



                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Add') }}
                                            </button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>

            </div>
        </div>





        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                   <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Supprimer Un <strong>Produit</strong> !


                            <!-- Formulaire pour le produit d'admin-->

                        <div class="card-body">
                            <form method="POST"  action="{{ action('ProduitController@delete') }}" accept-charset="UTF-8">
                                @csrf



                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input id="id"  placeholder="ID du produit" type="number"  name="id_produit_delete" required>
                                    </div>
                                </div>



                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('DELETE') }}
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Mettre à jour le  <strong>stock_restant</strong> !


                        <!-- Formulaire pour le produit d'admin-->

                        <div class="card-body">
                            <form method="POST" action="{!! url('admin/UPDATEStock') !!}" accept-charset="UTF-8">
                                @csrf


                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input id="stock_restant"  placeholder="nouveau Stock Restant" type="number"  name="stock_restant" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input id="id"  placeholder="ID du produit" type="number"  name="id" required>
                                    </div>
                                </div>



                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('UPDATE') }}
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
