<div  class="products col-md-offset-2 col-md-8 col-sm-12 text-center">
    <div>
        <p id="textBanner">Recommended for You</p>
    </div>


    <div style="background-color: rgba(250,250,250,0.5); -webkit-border-radius: 20px;-moz-border-radius: 20px;border-radius: 20px;" class="productListHome col-md-4 col-sm-4" ng-repeat="product in productsToHome">
        <div class="text-center" style="color: black; font-weight: bold">
            <h2>{{product[1]}}</h2>
        </div>
        <div class="text-center">
            <img src="{{product[3]}}" alt="doesn't work" width="60%" height="60%"/>
        </div>
        <div style="position: absolute; bottom: 50px;">
            <div >
                <label>Category:</label>
                {{product[4]}}
            </div>
            <div>
                <label>Descritpion:</label>
                {{product[2]}}
            </div>
        </div>

        <div style="position:absolute;bottom: 0; margin: 0 auto;">
            <label class="label-primary" style=" border-radius: 20px;padding: 5px; font-size: 20px;"> {{product[5] | currency:""}} zł</label>
        </div>
    </div>

</div>