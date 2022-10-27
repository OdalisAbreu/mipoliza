<?php
    function consult($query){
      //  $db = new mysqli('127.0.0.1','root','','multiseguros', 3306);
      $db = new mysqli('multiseg.cyyrfieqmu0s.us-east-1.rds.amazonaws.com','multiseguroscom','Hayunpaisenelmundo','multiseg_2', 3306);
    
        if($db->connect_errno){
            echo 'Fallo en la conexión de la bas de Datos, Error: ('.$db->connect_error.')';
        }
        return $db->query($query);
    }

    function select($table, $value){
        if($value == ''){
            echo 'Entro aqui';
            $query = consult('SELECT * FROM '. $table);
         }else{
            $query = consult('SELECT * FROM '. $table .' WHERE '. $value) ;
        }

        return $query;

    }
    function getSeguroByCedula($cedula){
        $query = consult("SELECT cs.id AS 'idUser', cs.user_id AS 'idAseguradora', cs.asegurado_nombres AS 'nombre', cs.asegurado_apellidos AS 'apellido', 
                        cs.asegurado_cedula AS 'cedula', st.id_poliza AS 'noPoliza', st.vigencia_poliza AS 'vigencia', st.fecha_inicio AS 'polizaIncio',
                        st.fecha_fin AS 'polizaFin', sv.veh_ano AS 'ano', sv.veh_chassis AS 'chasis', sv.veh_matricula AS 'matricula', sta.nombre AS 'modelo',
                        sm.DESCRIPCION AS 'marca', smo.descripcion AS 'modelo', s.nombre AS 'aseguradora', s.prefijo AS 'aseguradoraPrefijo', st.id AS 'noTransaction'
                        FROM seguro_clientes AS cs
                        JOIN seguro_transacciones AS st ON cs.id = st.id_cliente
                        JOIN seguro_vehiculo AS sv ON st.id_vehiculo = sv.id
                        JOIN seguro_tarifas AS sta ON sta.veh_tipo = sv.veh_tipo
                        JOIN seguro_marcas AS sm ON sm.ID = sv.veh_marca
                        JOIN seguro_modelos AS smo ON smo.ID = sv.veh_modelo
                        JOIN seguros AS s ON s.id = st.id_aseg
                        WHERE cs.asegurado_cedula = '".$cedula."'  and st.fecha_fin > '2022-10-26 00:00:00';");

        return $query;
    }
?>