    <div class="productFilters col-md-3 col-sm-2">
        <div class="col-md-12 col-sm-12">
            <div class="filters">
                <p class="text-center">Filters:</p>
                <p>Search product: </p>
                <div class="text-center">
                    <div class="">
                        <input class="form-control" type="text" ng-model="searchingPhraze" placeholder="Search" />
                    </div>
                </div>
                <p>Filter by category:
                </p>
                <select class="form-control" name="categorySelected" ng-model="categorySelected" ng-options="cat for cat in arrayCategories">
                    <option style="color: black"  value="" >Choose category</option>
                    <option style="color: black" value="{{cat}}">{{cat}}</option>
                </select>
                <p>Filter by price: </p>
                <div>
                    <div >
                        <label style="font-size: 20px;">Min price:</label>
                    </div>
                    <div >
                        <input type="number" class="form-control" ng-model="minimalPrice"/>
                    </div>
                </div>
                <div >
                    <div>
                        <label style="font-size: 20px;">Max price:</label>
                    </div>
                    <div >
                        <input type="number" class="form-control" ng-model="maximalPrice"/>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary btn-block" ng-click="showFilters()">FILTERS</button>
        </div>
    </div>

    <div class="productList col-md-9 col-sm-10">
        <div class="product col-md-3 col-sm-4" ng-repeat="item in products | byCategory:categorySelected | byPrice:minimalPrice :maximalPrice | filter:searchingPhraze | pagin:productsPerPage :page ">
            <div class="productDesc">
                <div class="text-center">
                    <h2>{{item[1]}}</h2>
                </div>
                <div class="text-center">
                    <img src="{{item[3]}}" alt="doesn't work" width="60%" height="60%"/>
                </div>
                <div class="descriptionProduct" style="position:absolute;bottom: 50px;">
                    <div>
                        <label>Category:</label>
                        {{item[4]}}
                    </div>
                    <div>
                        <label>Descritpion:</label>
                        {{item[2]}}
                    </div>
                </div>
                    <div  style="position:absolute; bottom: 1px; left: 12px;" >
                        <label class="label-primary" style="padding: 5px; font-size: 20px; color:white;"> {{item[5] | currency:""}} zł</label>
                    </div>
                    <div  style="position:absolute; bottom: 4px; right: 10px;">
                        <button class="btn btn-success" ng-click="addToBasket(item)">Add</button>
                        <button class="btn btn-info">More</button>
                    </div>
            </div>

        </div>
    </div>
    <div id="paginator" class="btn-group pull-right">
        <div class="buttonPagin" ng-repeat="i in paginationArray" style="float: left;">
            <button class="btn btn-default" style="width:40px; height: 40px;" ng-click="changePage(i)" >{{i}}</button>
        </div>
    </div>
