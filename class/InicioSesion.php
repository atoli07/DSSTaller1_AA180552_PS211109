<?php

        class usuario{

             function __construct()
            {
                
            }

            public function VerificarUsuario()
            {
                          //Matriz de usuarios y contraseñas
          $nombres_usuarios = ['admin', 'usuario1', 'usuario2'];
          $contrasenas      = ['12345', 'abcde', '123abc'];

          //Recontruimos la matriz para comparar 
          $usuarios = array_combine( $nombres_usuarios, $contrasenas );

            // Obtenemos el usuario y la contraseña del objeto POST.
              $usuario    = $_POST['user'];
              $contrasena = $_POST['password'];


            
            // Comprobamos que el usuario existe en la matriz.
            if( ! empty( $usuarios[$usuario] ) ) {

                //Comprobamos que el usuario coincide con la contraseña.
                if( $usuarios[$usuario] === $contrasena ) {
                
                    // Comprobar el tipo de usuario.
                    if( $usuario === 'admin') {
                        return 'admin';
                        //linea de codigo de enlace para enviar al usuario 1 a su pagina de eventos 
                    } elseif ( $usuario === 'usuario1') {
                        return 'usuario1';
                        //linea de codigo de enlace para enviar al usuario 2 a su pagina de eventos 
                    } else {
                        return 'usuario2';
                        //linea de codigo de enlace para enviar al usuario 3 a su pagina de eventos 
                    }
                   
                } else {
                    print ('Contraseña inválida');
                }
                } else {
                    print ('Usuario inválido');
              } 
            }
   
            }
              
?>
