<?php
  require_once('./config/dbconfig.php'); 
  $db = new operations();
  $result=$db->storeRecord();
?>
<?php include('inc/header.php');?>
    <div class="container">
        <form id="product-form" method="POST">
            <button class="btn btn-primary" name="btn_save" style="margin-top: 25px; margin-bottom: 25px;"> Save </button>
            <button type="submit" class="btn btn-primary" formaction="list.php" style="margin-top: 25px; margin-bottom: 25px;">Cancel</button>
            <div class="form-group">
                <label>SKU</label>
                <input type="text" name="sku" class="form-control">
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="product" class="form-control">
            </div>
            <div class="form-group">
                <label>Price ($)</label>
                <input type="text" name="price" class="form-control">
            </div>
            <div class="form-group">
                <label>Type Switcher</label>
                <br>
                <select name="dropdown" onchange="setTemplate(document.Form, this.value);">
                    <option value="0"></option>
                    <option value="1">DVD-Disc</option>
                    <option value="2">Furniture</option>
                    <option value="3">Book</option>
                </select>                                    
              </div>
              <div class="form-group">
                <p id="demo"></p>
            </div>
        </form>
    </div>
        <script>
    var dvdTemplate =
        '<label>Size MB</label>' +
        '<input type="text" name="b1" class="form-control" required>';
    var bookTemplate =
        '<label>Weigth (KG)</label>' +
        '<input type="text" name="b1" class="form-control" required>';
    var furTemplte =
        '<label>Heigth (CM)</label>' +
        '<input type="text" name="b1" class="form-control" required>' +
        '<label>Width (CM)</label>' +
        '<input type="text" name="b2" class="form-control" required>' +
        '<label>Length (CM)</label>' +
        '<input type="text" name="b3" class="form-control" required>' +
        '<br>' +
        '<p>Please provide demensions</p>';

    var templates = {
        '0' : '',
        '1': dvdTemplate,
        '2': furTemplte,
        '3': bookTemplate
    };

    var form = document.getElementById('product-form');
    form.elements.dropdown.onchange = function() {
        var form = this.form;
        console.log(form);
        document.getElementById("demo").innerHTML = templates[this.value];
    };
    </script>
  <?php include('inc/footer.php');?>