<?php

?>
<br>
<div class="container">
    <h2 class="titleForm d-flex justify-content-center">Votre Panier</h2>
    <br>
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Produits</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Final Fantasy 7 Remake</th>
                        <td>58,33</td>
                        <td>
                            <form action="panier.html" method="get">
                                <button class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-12 col-md-6">
            <table class="table">
                <thead class="thead thead-dark">
                    <tr>
                        <th>Total</th>
                        <th>Montant</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Total TTC</th>
                        <td>70,00€</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 offset-md-3 col-md-6">
            <div class="adresseLivraison border border-secondary rounded bg-white">
                <br>
                <p class="lead d-flex justify-content-center">Votre adresse de livraison</p>
                <div class="informations">
                    <p>Adresse : 3 rue Berlioz</p>
                    <p>Code Postal : 62000</p>
                    <p>Ville : ARRAS</p>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="modifierAdresseLivraison.html">modifier votre adresse de livraison</a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-12 offset-md-3 col-md-6">
            <div class="coordBanc border border-secondary rounded bg-white">
                <br>
                <p class="lead d-flex justify-content-center mt-10">Coordonnées bancaires</p>
                <div class="informationsBancaires">
                    <p>Titulaire de la carte : Tauveron Loïc</p>
                    <p>N° de la carte : 4*** **** **** **87</p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="button d-flex justify-content-center">
        <a href="recapitulatif.html"><button class="btn btn-secondary">Continuer</button></a>
    </div>
</div>
<?php
footer();
