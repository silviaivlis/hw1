<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("Location: registrazione.php");
        exit;
    }
?>

<html>
    <head>
        <title>goodreads</title>
        <link rel="stylesheet" href="mybooks.css" />
        <script src="mybooks.js" defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <header> 
            <div id="sfondo">
                <nav>
                    <div id="links">
                        <a href="logout.php" class="button">Logout</a>
                    </div>
                </nav>

                <a href="homepage.php" id="saluto">
                    ciao<strong><?php echo $_SESSION["username"];?></strong>
                </a>
            </div>
        </header>

        <main>
            <div id="titolo">
                my<strong>books</strong>
            </div>

            <section>
               <div id="libreria">
                    <h3>
                       LA MIA LIBRERIA
                    </h3>

                    <p id="personal-library-view">
                    </p>
               </div>

               <div id="libri">
                    <form>
                        Cerca il titolo di un libro
                        <span>
                            <input type='text' id='author'>
                            <input type='submit' id='submit' value='CERCA'>
                        </span>
                    </form>

                    <p id="library-view">
                    </p>
                </div>
            </section>
        </main>
    </body>
</html>