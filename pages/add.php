<?php

    if(isset($_POST['submit'])){
        // echo htmlspecialchars($_POST['name']);
        // echo htmlspecialchars($_POST['mixing']);
        // echo htmlspecialchars($_POST['glass']);
        print_r($_POST);
    }


?>


<!DOCTYPE html>
<html>
    <?php include('../templates/header.php') ?>

    <h2>Add a Cocktail</h2>
    <form action="add.php" method="POST">
         <!-- cocktail name -->
        <label for="name">Cocktail Name:</label>
        <br />
        <input type="text" name="name" id="name" value="">
        <br />

        <!-- Mixing method -->
        <label for="">Mixing method:</label>
        <br />
        <input type="radio" id="shaker" name="mixing" value="Shaker">
        <label for="shaker">Shaker</label>
        <br />
        <input type="radio" id="build" name="mixing" value="Build">
        <label for="build">Build</label>
        <br />
        <input type="radio" id="blender" name="mixing" value="Blender">
        <label for="blender">Blender</label>
        <br />
        <input type="radio" id="mixing-glass" name="mixing" value="Mixing Glass">
        <label for="mixing-glass">Mixing Glass</label>
        <br />

        <!-- glass -->
        <label for="">Glass</label>
        <br />
        <input type="radio" id="low-ball" name="glass" value="Low-Ball">
        <label for="low-ball">Low-Ball</label>
        <br />
        <input type="radio" id="high-ball" name="glass" value="High-Ball">
        <label for="high-ball">High-Ball</label>
        <br />
        <input type="radio" id="martini" name="glass" value="Martini">
        <label for="martini">Martini</label>
        <br />

        <!-- ingredients -->
        <label for="">Ingredients</label> <button id="ingredients">+</button>
        <br />

        <section class="ingredients">
                <input type="checkbox" name="vodka" id="vodka" value="Vodka">
                <label for="vodka">Vodka</label>
                <br />
                <input type="checkbox" name="lemon" id="lemon" value="Lemon Juice">
                <label for="lemon">Lemon Juice</label>
                <br />
                <input type="checkbox" name="soda" id="soda" value="Soda Water">
                <label for="soda">Soda Water</label>
                <br />
        </section>

        <!-- garnish -->
        <label for="">Garnish</label> <button id="garnish">+</button>
        <br />

        <section class="garnish">
                <input type="checkbox" name="lemon-wheel" id="lemon-wheel" value="Lemon Wheel">
                <label for="lemon-wheel">Lemon Wheel</label>
                <br />
                <input type="checkbox" name="cherry" id="cherry" value="Glace Cherry">
                <label for="cherry">Glace Cherry</label>
                <br />
        </section>

        <!-- steps -->
        <label for="step">Step</label>
        <br />
        <input type="text" name="step" id="step" value="">
        <br />

        <!-- submit button -->
        <input type="submit" name="submit" value="Submit">

    </form>




    <?php include('../templates/footer.php') ?>
    
</html>