<?php

class usuarioControlador{
    public function mostrarUsuario($request, $response, $arg){
        $ObjetoProvenienteDelFront =  json_decode( $request -> getBody() );
        $MiUsuario = new Usuario();
        foreach ($ObjetoProvenienteDelFront as $atr => $valueAtr) {
                $MiUsuario -> {$atr} = $valueAtr;
        }
        $response-> getBody()->write($MiUsuario->mostrar());

        return $response;
        //binaria, json, binaria.
        
    }
}

?>