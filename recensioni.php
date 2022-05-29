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
        <link rel="stylesheet" href="recensioni.css" />
        <script src="recensione.js" defer></script>
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

                <div class="hidden" id="nome"><?php echo $_SESSION["username"];?></div>

            </div>
        </header>

        <main>
            <div id="titolo">
                recensioni<strong>libri</strong>
            </div>

            <section>
               <div class="piccolo" id="form">
                    <form method="post" action="invioRecensioni.php">
                        <label>
                            Titolo del libro <input type="text" name="titolo">
                        </label>
                        
                        <label>
                            Autore del libro <input type="text" name="autore">
                        </label>

                        <p>Recensione</p>
                        <textarea name="commento" placeholder="Scrivi la tua recensione qui"></textarea>

                        <span>
                            <input id="bottone" type="submit" value="PUBBLICA">
                        </span>
                    </form>
               </div>

               <div class="grande" id="post">
                   <article>
                       TUTTE LE RECENSIONI
                   </article>
                   <p id="recensioni">

                   </p>
                </div>
            </section>
        </main>
    </body>
</html>