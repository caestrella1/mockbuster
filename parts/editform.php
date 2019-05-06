<form>
    <input class="form-control" type="text" id="input-name" placeholder="Movie title"><br>
    
    <textarea class="form-control" id="input-description" rows="8" placeholder="Movie description"></textarea><br>

    <input class="form-control" type="text" id="input-poster" placeholder="Poster image URL"><br>
    
    <input class="form-control" type="text" id="input-backdrop" placeholder="Backdrop image URL"><br>
    
    <!-- Rating Picker with hidden input for tracking numeric value -->
    <div class="d-flex flex-row align-items-center justify-content-center mb-3">
        <button id="rating-down" class="btn btn-theme rounded-lg" onclick="return false;">-</button>
        <h4 id="rating" class="d-inline text-theme align-middle px-1 px-md-4 mb-0"></h4>
        <input id="rating-count" type="hidden" value="0">
        <button id="rating-up" class="btn btn-theme rounded-lg" onclick="return false;">+</button>
    </div>
    
    <div class="row">
        <div class="col-12 col-md-6">
            <div id="price-group" class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                </div>
                <input type="number" step="0.01" class="form-control" id="input-price" placeholder="Price">
            </div>
        </div>
        <div class="col-12 col-md-6">
            <input class="form-control" type="date" id="input-date">
        </div>
    </div>

    <input type="submit" id="submit" class="btn btn-block btn-lg btn-success rounded-pill shadow-sm">
</form>