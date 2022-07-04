<?php 
    require "../utils/autoload.php";

    Routes::AddView("/","index");
    Routes::AddView("/login","login");
    Routes::Add("/login","post","SesionControlador::IniciarSesion");
    
    Routes::Run();

       