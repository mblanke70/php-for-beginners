<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PHP Grundlagen</title>

    <style>
        body {
            display: grid;
            place-items: center;
            height: 100vh;
            margin: 0;
            font-family: sans-serif;
        }
    </style>
</head>

<body>

    <!-- Kapitel 3: Your first PHP tag -->
    <h1>
        <?php echo "Hello, World"; ?>
    </h1>

    <hr>

    <!-- Kapitel 4: Variables -->
    <?php
        $greeting = "Hello";
        echo $greeting . " " . "Everybody!";

        echo "$greeting Everybody";
        echo '$greeting Everybody';
    ?>

    <hr>

    <!-- Kapitel 5: Conditionals and Booleans -->
    <?php 
        $name = "Dark Matter"; 
        $read = false;
    
        if($read) {
            $message = "You have read $name";
        } else {
            $message = "You have NOT read $name";
        }
    ?>

    <h1><?= $message ?></h1>

    <hr>

    <!-- Kapitel 6: Arrays -->
    <h1>Recommended Books</h1>

    <?php
        $books = [
            "Do Androids Dream of Electric Sheep",
            "The Langoliers",
            "Hail Mary"
        ];
    ?>
    
    <ul>
        <?php foreach($books as $book) : ?>
            <li> <?= $book ?> </li>
        <?php endforeach ?>
    </ul>

    <!-- Kapitel 7: Assoziative Arrays -->
    <p>
        <?= $books[1] ?>
    </p>

    <?php

        $books2 = [
            [
                'name'        => 'Do Androids Dream of Electric Sheep',
                'author'      => 'Philip K. Dick',
                'releaseYear' => 1968,
                'purchaseUrl' => 'http://example.com'
            ],
            [
                'name'        => 'Project Hail Mary',
                'author'      => 'Andy Weir',
                'releaseYear' => 2021,
                'purchaseUrl' => 'http://example.com'
            ],
            [
                'name'        => 'The Martian',
                'author'      => 'Andy Weir',
                'releaseYear' => 2011,
                'purchaseUrl' => 'http://example.com'
            ]
        ];
    
    ?>

    <ul>
        <?php foreach($books2 as $book) : ?>
            <li>
                <a href="<?= $book['purchaseUrl'] ?>"> 
                    <?= $book['name'] ?> (<?= $book['releaseYear'] ?>)
                </a> 
            </li>
        <?php endforeach ?>
    </ul>
   
    <!-- Kapitel 8: Functions -->

    <?php
        function filterByAuthor($books, $author) {
            $filteredBooks = [];

            foreach($books as $book) {
                if($book['author'] === $author) {
                    $filteredBooks[] = $book;
                }
            }
            return $filteredBooks;
        }

        $filteredBooks = filterByAuthor($books2, 'Andy Weir');
    ?>

    <ul>
        <?php foreach( $filteredBooks as $book ) : ?>
            <li>
                <a href="<?= $book['purchaseUrl'] ?>"> 
                    <?= $book['name'] ?> (<?= $book['releaseYear'] ?>) - By <?= $book['author'] ?>
                </a> 
            </li>
        <?php endforeach ?>
    </ul>

    <!-- Kapitel 9: Lambda Functions -->

    <?php
        function filter($items, $key, $value) {
            $filteredItems = [];

            foreach($items as $item) {
                if($item[$key] === $value) {
                    $filteredItems[] = $item;
                }
            }
            return $filteredItems;
        }

        $filteredBooks = filter($books2, 'releaseYear', 2011);
    ?>

    <ul>
        <?php foreach( $filteredBooks as $book ) : ?>
            <li>
                <a href="<?= $book['purchaseUrl'] ?>"> 
                    <?= $book['name'] ?> (<?= $book['releaseYear'] ?>) - By <?= $book['author'] ?>
                </a> 
            </li>
        <?php endforeach ?>
    </ul>

    <?php 
        function filter2($items, $fn) {
            $filteredItems = [];

            foreach($items as $item) {
                if( $fn($item) ) {
                    $filteredItems[] = $item;
                }
            }
            return $filteredItems;
        }

        $filteredBooks = filter2($books2, function($book) { // geht auch mit PHP-Funktion array_filter()
            return $book['releaseYear'] >= 2000;

        });
    ?>

    <?php foreach( $filteredBooks as $book ) : ?>
        <li>
            <a href="<?= $book['purchaseUrl'] ?>"> 
                <?= $book['name'] ?> (<?= $book['releaseYear'] ?>) - By <?= $book['author'] ?>
            </a> 
        </li>
    <?php endforeach ?>

    <!-- Kapitel 10: Separate Logic From the Template -->


    <!-- Kapitel 11: Technical Check-In #1 -->


</body>
</html>