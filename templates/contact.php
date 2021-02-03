<head>
    <title><?= html($title) ?></title>
</head>
<body>
<div class="container">
    <h1><?= html($contact) ?></h1>
    <br>
    <form method="post">
        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="inputEmail4">Firstname</label>
                <input type="text" class="form-control" name="first_name" id="first_name" value="<?=$formdata['first_name']?>">
                <?php if ($validationErrors['first_name']):?>
                <div class="alert alert-warning" role="alert">
                    <?=$validationErrors['first_name']?>
                </div>
                <?php endif?>

            </div>
            <br>
            <div class="form-group col-md-5">
                <label for="inputPassword4">Lastname</label>
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Nachname" value="<?=$formdata['last_name']?>">
                <?php if ($validationErrors['last_name']):?>
                    <div class="alert alert-warning" role="alert">
                        <?=$validationErrors['last_name']?>
                    </div>
                <?php endif?>
            </div>

            <br>
        </div>
        <div class="form-group col-md-5">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" name="address" id="inputAddress" placeholder="1234 Main St" value="<?=$formdata['address']?>">
            <?php if ($validationErrors['address']):?>
                <div class="alert alert-warning" role="alert">
                    <?=$validationErrors['address']?>
                </div>
            <?php endif?>
        </div>
        <br>
        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" name="city" id="inputCity" value="<?=$formdata['city']?>">
            </div>
            <br>
            <div class="form-group col-md-5">
                <label for="inputState">State</label>
                <select id="inputState" class="form-control" name="country">
                    <option selected>Schweiz</option>
                    <option>Deutschland</option>
                    <option>Österreich</option>
                </select>
            </div>
            <br>
            <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" name="zip" id="inputZip" value="<?=$formdata['zip']?>">
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
</div>