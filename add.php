<?php

    include('config/db_connect.php');
    // include('config/get_ingredients.php');

    $title = '';
    $mix_method = '';
    $glass = '';
    $ingredient1 = '';
    $ingredient2 = '';
    $ingredient3 = '';
    $ingredient4 = '';
    $ingredient5 = '';
    $ingredient6 = '';
    $ingredient7 = '';
    $ingredient8 = '';
    $ingredient9 = '';
    $ingredient10 = '';
    $garnish1 = '';
    $garnish2 = '';
    $garnish3 = '';
    $instruction1 = '';
    $instruction2 = '';
    $instruction3 = '';
    $instruction4 = '';
    $instruction5 = '';
    $errors = ['title' => '', 'mix_method' => '', 'glass' => '', 'ingredients' => '', 'instructions' => ''];

    if(isset($_POST['submit'])){
        // check title
        if(empty($_POST['title'])){
            $errors['title'] = 'A title is required <br />';
        } else {
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $_POST['title'])){
                $errors['title'] = 'Title must be letters and spaces only <br />';
            }
        }

        // check mixing method
        if(empty($_POST['mix_method'])){
            $errors['mix_method'] = 'Please choose a mixing method <br />';
        } else {
            $mix_method = $_POST['mix_method'];
        }

        // check glass
        if(empty($_POST['glass'])){
            $errors['glass'] = 'Please choose a glass <br />';
        } else {
            $glass = $_POST['glass'];
        }

        // // check ingredients
        if($ingredientsCount < 2) {
            $errors['ingredients'] = 'Please choose at least two ingredients';
        } elseif($ingredientsCount > 10) {
            $errors['ingredients'] = 'You can only add a maximum of 10 ingredients';
        } else {
            // show added ingredients in showIngredients div
            
        }

        // if(!empty($_POST['garnish1']) || !empty($_POST['garnish2'])){
        //     $garnish1 = $_POST['garnish1'] ?? '';
        //     $garnish2 = $_POST['garnish2'] ?? '';
        // }

        // // check instructions
        // if(empty($_POST['step1'])){
        //     $errors['instructions'] = 'A least one instruction is required <br />';
        // } else {
        //     $step1 = $_POST['step1'];
        //     if(!preg_match('/^[a-zA-Z\s]+$/', $_POST['step1'])){
        //         // add numbers to regex
        //         $errors['instructions'] = 'Instructions must be letters and spaces only';
        //     }
        // }

        // if(!array_filter($errors)){
        //     $title = mysqli_real_escape_string($conn, $_POST['title']);
        //     $mix_method = mysqli_real_escape_string($conn, $_POST['mix_method']);
        //     $glass = mysqli_real_escape_string($conn, $_POST['glass']);
        //     $counter = 1
        //     foreach($ingredientsArray as $id -> $quantity){
            //        if ($quantity > 0 && $counter !== 10){
            //             $ingredient . $counter = intval($id);
            //             $ingredient_measurement . $counter = number_format ($quantity, 2);
            //             $counter++;
            //        }
        //         
        //     }
        //     $garnish1 = mysqli_real_escape_string($conn, $_POST['garnish1'] ?? '');
        //     $garnish2 = mysqli_real_escape_string($conn, $_POST['garnish2'] ?? '');
        //     $step1 = mysqli_real_escape_string($conn, $_POST['step1']);


        //     // create sql
        //     $sql = "INSERT INTO cocktails(title,mix_method,glass,step1) VALUES('$title', '$mix_method', '$glass', '$step1')";
        //     // $sql = "INSERT INTO cocktails(title) VALUES ('$title')";

        //     // save to db and check
        //     if(mysqli_query($conn, $sql)){
        //         //success
        //         header('Location: add.php');
        //     } else {
        //         // error
        //         echo 'query error: ' . mysqli_error($conn);
        //     }
        // }
    }
?>


<!DOCTYPE html>
<html>
    <?php include('templates/header.php') ?>

    <h2>Add a Cocktail</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <!-- cocktail title -->
        <section class="cockail-title">
            <h3>Cocktail Title:</h3>
            <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($title); ?>">
            <br />
            <!-- show errors -->
            <div><?php echo $errors['title'] ?></div>
        </section>

        <!-- mixing method -->
        <section class="mix-method">
            <h3>Mixing Method:</h3>
            <input type="radio" id="build" name="mix_method" value="Build" <?php if($mix_method === 'Build'){echo 'checked';} ?>>
            <label for="build">Build</label>
            <br />
            <input type="radio" id="blender" name="mix_method" value="Blender" <?php if($mix_method === 'Blender'){echo 'checked';} ?>>
            <label for="blender">Blender</label>
            <br />
            <input type="radio" id="mixing-glass" name="mix_method" value="Mixing Glass" <?php if($mix_method === 'Mixing Glass'){echo 'checked';} ?>>
            <label for="mixing-glass">Mixing Glass</label>
            <br />
            <input type="radio" id="shaker" name="mix_method" value="Shaker" <?php if($mix_method === 'Shaker'){echo 'checked';} ?>>
            <label for="shaker">Shaker</label>
            <br />
            <!-- show errors -->
            <div><?php echo $errors['mix_method'] ?></div>
        </section>

        <!-- glass -->
        <section class="glass">
            <h3>Glass</h3>
            <div class="low-ball">
                <input type="radio" id="low-ball" name="glass" value="Low-Ball" <?php if($glass === 'Low-Ball'){echo 'checked';} ?>>
                <label for="low-ball">Low-Ball</label>
            </div>
            <div class="high-ball">
                <input type="radio" id="high-ball" name="glass" value="High-Ball" <?php if($glass === 'High-Ball'){echo 'checked';} ?>>
                <label for="high-ball">High-Ball</label>
            </div>
            <div class="stem">
                <input type="radio" id="coupe" name="glass" value="Coupe" <?php if($glass === 'Coupe'){echo 'checked';} ?>>
                <label for="coupe">Coupe</label>
                <br />
                <input type="radio" id="flute" name="glass" value="Flute" <?php if($glass === 'Flute'){echo 'checked';} ?>>
                <label for="flute">Flute</label>
                <br />
                <input type="radio" id="gin" name="glass" value="Gin" <?php if($glass === 'Gin'){echo 'checked';} ?>>
                <label for="gin">Gin</label>
                <br />
                <input type="radio" id="martini" name="glass" value="Martini" <?php if($glass === 'Martini'){echo 'checked';} ?>>
                <label for="martini">Martini</label>
                <br />
                <input type="radio" id="nickandnora" name="glass" value="Nick & Nora" <?php if($glass === 'Nick & Nora'){echo 'checked';} ?>>
                <label for="nickandnora">Nick & Nora</label>
                <br />
                <input type="radio" id="wine" name="glass" value="Wine" <?php if($glass === 'Wine'){echo 'checked';} ?>>
                <label for="wine">Wine</label>
                <br />
            </div>
            
            <!-- show errors -->
            <div><?php echo $errors['glass'] ?></div>
        </section>

        <!-- ingredients -->
        <section class="ingredients">
            <h3>Ingredients</h3>

            <div class="ingredients-list">
                <input type="text" id="ingredient1" name="ingredient1" value="">
                <input type="text" id="ingredient2" name="ingredient2" value="">
                <button class="add-ingredient">+ Add Ingredient</button>
            </div>
        </section>
        
        <!-- garnish -->
        <section class="garnishes">
            <h3>Garnish</h3>

            <div class="garnish-list">
                <button class="add-garnish">+ Add Garnish</button>
            </div>
        </section>

        <!-- ingredients -->
        <section class="instructions">
            <h3>Instructions</h3>

            <div class="instructions-list">
                <input type="text" id="instruction1" name="instruction1" value="">
                <button class="add-instruction">+ Add Instruction</button>
            </div>

            <!-- show errors -->
            <div><?php echo $errors['instructions'] ?></div>
        </section>

        <!-- submit button -->
        <input type="submit" name="submit" value="Submit">

    </form>

    

    <?php include('templates/footer.php') ?>
    
</html>