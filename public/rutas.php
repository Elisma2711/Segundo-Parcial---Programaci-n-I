<?php 
    require "../utils/autoload.php";

    Routes::AddView("/","index");
    Routes::AddView("/login","login");
    Routes::Add("/login","post","SesionControlador::IniciarSesion");
    Routes::AddView("/register","register");
    Routes::Add("/register","post","UsuarioControlador::Alta");
    Routes::AddView("/usuarios/alta","register");
    Routes::AddView("/sesion","sesion");
    
    Routes::Run();

       