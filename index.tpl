<!DOCTYPE html>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="index.css" media="screen,projection"/>
        <meta charset="utf-8">
        <title>Feed Mii Tool</title>
        <meta name="description" content="Feed Mii Tool is developed for gamers who play Feed Mii in StreetPass on 3DS.">
        <meta name="keywords" content="3ds,feed,mii,streetpass,street,pass,4star">
        <meta name="author" content="Catscarlet">
    </head>
    <script type="text/javascript" src="jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
    <script type="text/javascript" src="cook.js"></script>
    <body>
        <nav>
            <div class="nav-wrapper green darken-2">
                <a href="" class="brand-logo center">Feed Mii Tool</a>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a href="#modal-about" target="_blank">About</a>
                    </li>
                    <li>
                        <a href="https://www.catscarlet.com" target="_blank">Mainpage</a>
                    </li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li>
                        <a href="#modal-about" target="_blank">About</a>
                    </li>
                    <li>
                        <a href="https://www.catscarlet.com" target="_blank">Mainpage</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <h4>
                Choose ingredients you have:
            </h4>

            <div class="row row-table">
                <hr>
                {foreach $ingredients as $ingredient}
                <div id="{(int) base_convert($ingredient['value'], 2, 10)}" class="col s2">
                    <img class="responsive-img circle ingredients" src="img/{$ingredient['img']}" alt="{$ingredient['name']}"/>
                    <p class="center-align">{$ingredient['name']}</p>
                </div>

                {/foreach}
                <hr>
                <p class="center-align">
                    <a class="waves-effect waves-light btn deep-orange accent-4" id="cook" name="button">Cook!</a>
                </p>

            </div>
            <hr>
            <div id="table"></div>

        </div>

        <div id="modal-about" class="modal">
            <div class="modal-content">
                <h4>About Feed Mii Tool</h4>
                <p>
                    Feed Mii Tool is developed for gamers who play Feed Mii in StreetPass on 3DS.
                </p>
                <p>
                    This tool will help you get 4 star recipes with the ingredients you have. Just choose the ingredients you have, and this tool will tell you which recipes you can get using the ingredients.
                </p>
                <p>
                    Do not waste ingredients.
                </p>
            </div>
            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">OK</a>
            </div>
        </div>
    </body>
</html>
