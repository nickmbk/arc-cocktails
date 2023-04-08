<?php

    include('config/db_connect.php');
    // include('config/get_ingredients.php');
    
    function getIngredients() {
        include('config/db_connect.php');

        // get ingredient
        $sql = "SELECT * FROM ingredients ORDER BY category, subcategory, ingredient";

        // get results
        return mysqli_query($conn, $sql);
    }

    function getGarnish() {
        include('config/db_connect.php');

        // get ingredient
        $sql = "SELECT * FROM garnish ORDER BY ingredient";

        // get results
        return mysqli_query($conn, $sql);
    }

    $title = '';
    $mix_method = '';
    $glass = '';
    $ingredients = '';
    $garnish = '';
    $step1 = '';
    $errors = ['title' => '', 'mix_method' => '', 'glass' => '', 'ingredients' => '', 'instructions' => ''];

    if(isset($_POST['submit'])){
        print_r($_POST);

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
        // if(empty($_POST['ingredients'])){
        //     $errors['ingredients'] = 'Please choose at least 2 ingredients <br />';
        //     //need to check if 2 have been selected, minimum
        // } else {
        //     $ingredient1 = $_POST['ingredient1'] ?? '';
        //     $ingredient2 = $_POST['ingredient2'] ?? '';
        //     $ingredient3 = $_POST['ingredient3'] ?? '';
        // }

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
        //     $ingredient1 = mysqli_real_escape_string($conn, $_POST['ingredient1'] ?? '');
        //     $ingredient2 = mysqli_real_escape_string($conn, $_POST['ingredient2'] ?? '');
        //     $ingredient3 = mysqli_real_escape_string($conn, $_POST['ingredient3'] ?? '');
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
        <h3>Ingredients</h3>

        <section class="show-ingredients">
            <button class="add-ingredients">Add</button>
        </section>

        <section class="choose-ingredients">
                <!-- php function to grab the ingredients list from the db -->
                <?php $result = getIngredients(); ?>

                <!-- these are to check if the previous rows category or subcategory are the same to help determine whether to create new divs and headings or not -->
                <?php $previousCategory = ''; ?>
                <?php $previousSubcategory = ''; ?>

                <!-- create a while loop to check each row of the table -->
                <?php while($row = mysqli_fetch_assoc($result)): ?>

                        <!-- create a div and h4 heading for each category -->
                        <?php if($row['category'] !== $previousCategory): ?>
                            <?php if($previousCategory !== ''): ?>
                                </div>
                            <?php endif; ?>
                            <div class="category">
                                <h4><?php echo $row['category'] ?></h4>
                        <?php endif; ?>

                        <!-- create a div and h5 heading for each sub-category -->
                        <?php if($row['subcategory'] !== $previousSubcategory): ?>
                            <?php if($previousSubcategory !== ''): ?>
                                </div>
                            <?php endif; ?>
                            <div class="subcategory">
                                <h5><?php echo $row['subcategory'] ?></h5>
                        <?php endif; ?>

                        <!-- create a checkbox and label for each ingredient -->
                        <input type="checkbox" name=<?php echo 'ingredient' . $row['id']; ?> id=<?php echo str_replace(' ', '-', strtolower($row['ingredient'])); ?> value=<?php echo str_replace(' ', '-', $row['ingredient']); ?>>
                        <label for=<?php echo str_replace(' ', '-', strtolower($row['ingredient'])); ?>><?php echo $row['ingredient']; ?></label>
                        <br />

                        <!-- copy the current category / subcategory to help determine at the beginning of the loop whether to create new divs and headings -->
                        <?php $previousCategory = $row['category']; ?>
                        <?php $previousSubcategory = $row['subcategory']; ?>

                <?php endwhile; ?>
                        
            <!-- show errors -->
            <div><?php echo $errors['ingredients'] ?></div>

        </section>

        <!-- garnish -->
        <h3>Garnish</h3>

        <section class="choose-garnish">
                <?php $result = getGarnish(); ?>

                <?php while($row = mysqli_fetch_assoc($result)): ?>

                    <!-- create a checkbox and label for each ingredient -->
                    <input type="checkbox" name=<?php echo 'garnish' . $row['id']; ?> id=<?php echo str_replace(' ', '-', strtolower($row['ingredient'])); ?> value=<?php echo str_replace(' ', '-', $row['ingredient']); ?>>
                    <label for=<?php echo str_replace(' ', '-', strtolower($row['ingredient'])); ?>><?php echo $row['ingredient']; ?></label>
                    <br />

                <?php endwhile; ?>

        </section>

        <section class="show-garnish">
            <button class="add-garnish">Add</button>
        </section>

        <!-- steps -->
        <label for="step">Step</label>
        <br />
        <input type="text" name="step1" id="step" value="<?php echo htmlspecialchars($step1); ?>">
        <br />
        <!-- show errors -->
        <div><?php echo $errors['instructions'] ?></div>

        <!-- submit button -->
        <input type="submit" name="submit" value="Submit">

    </form>




    <?php include('templates/footer.php') ?>
    
</html>