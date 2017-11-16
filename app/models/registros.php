<?php if(! defined('BASEPATH')) exit('No tienes permiso para acceder a este archivo');
  class registros extends CI_Model{    
    private $key_hash;
    private $timezone;

    function __construct(){
      parent::__construct();
      $this->load->database("default");
      $this->key_hash    = $_SERVER['HASH_ENCRYPT'];
      $this->timezone    = 'UM1';

        //usuarios
          $this->usuarios             = $this->db->dbprefix('usuarios');
          $this->perfiles             = $this->db->dbprefix('perfiles');

          $this->configuraciones      = $this->db->dbprefix('catalogo_configuraciones');
          
          $this->proveedores          = $this->db->dbprefix('catalogo_empresas');
          $this->historico_acceso     = $this->db->dbprefix('historico_acceso');

          $this->catalogo_estados      = $this->db->dbprefix('catalogo_estados');
          $this->catalogo_litraje      = $this->db->dbprefix('catalogo_litraje');

          $this->participantes      = $this->db->dbprefix('participantes');
          $this->bitacora_participante     = $this->db->dbprefix('bitacora_participante');
          $this->catalogo_imagenes         = $this->db->dbprefix('catalogo_imagenes');
          $this->catalogo_preguntas         = $this->db->dbprefix('catalogo_preguntas');
          $this->registro_participantes         = $this->db->dbprefix('registro_participantes');
          

    }

          public function listado_segmentos(){

            $this->db->select('c.id, c.nombre, c.valor, c.activo, c.puntos, c.ganar, c.color, c.texto');
            
            $this->db->from($this->catalogo_imagenes.' as c');
            $this->db->where('c.activo',0);
            $result = $this->db->get();
            
            if ( $result->num_rows() > 0 )
               return $result->result();
            else
               return False;
            $result->free_result();
        }  


         public function actualizar_redes_compartir($data){
             $this->db->set( 'redes', $data['redes'] );

            $this->db->where("id", '"'.$this->session->userdata('id_participante').'"',false);   
            $this->db->update($this->participantes );
  
              if ($this->db->affected_rows() > 0){
                    return TRUE;
                } else {
                    return FALSE;
                }
                $result->free_result();
        }        

            /*
            $this->db->set( 'tarjeta', "AES_ENCRYPT('{$data['formato']}','{$this->key_hash}')", FALSE );
            
            $this->db->where('ticket',"AES_ENCRYPT('{$this->session->userdata('num_ticket_participante')}','{$this->key_hash}')",FALSE);*/
            





        public function listado_preguntas(){
            $this->db->select( 'id' );
            $preguntas = $this->db->get($this->catalogo_preguntas );
            if ($preguntas->num_rows() > 0 )
                 

               return $preguntas->result();
            else
               return FALSE;
            $estados->free_result();
        }   



        public function get_preguntas(){
            $this->db->select( 'id, pregunta, a, b, respuesta' );
            $this->db->from($this->catalogo_preguntas);
            $this->db->where('id', $this->session->userdata( 'pregunta'));
            $preg = $this->db->get();
            if ($preg->num_rows() > 0)
              return $preg->row();
            else
              return TRUE;
            $login->free_result();
        }



        //checar si el correo ya fue registrado
    public function check_correo_existente($data){
      $this->db->select("AES_DECRYPT(email,'{$this->key_hash}') AS email", FALSE);      
      $this->db->from($this->participantes);
      $this->db->where('email',"AES_ENCRYPT('{$data['email']}','{$this->key_hash}')",FALSE);
      $login = $this->db->get();
      if ($login->num_rows() > 0)
        return FALSE;
      else
        return TRUE;
      $login->free_result();
    }

       //agregar participante
    public function anadir_registro( $data ){
            $timestamp = time();

            
            $this->db->set( 'total', "AES_ENCRYPT(0,'{$this->key_hash}')", FALSE );  //total comienza en 0
            //$this->db->set( 'tarjeta', "AES_ENCRYPT('','{$this->key_hash}')", FALSE );  //total comienza en 0
            //$this->db->set( 'juego', "AES_ENCRYPT('','{$this->key_hash}')", FALSE );  //total comienza en 0

            $this->db->set( 'id_perfil', $data['id_perfil']);
            $this->db->set( 'creacion',  gmt_to_local( $timestamp, $this->timezone, TRUE) );
            $this->db->set( 'fecha_pc',  gmt_to_local( $timestamp, $this->timezone, TRUE) );  //fecha cdo se registro
            $this->db->set( 'id', "UUID()", FALSE); //id

            $this->db->set( 'nombre', "AES_ENCRYPT('{$data['nombre']}','{$this->key_hash}')", FALSE );
            $this->db->set( 'apellidos', "AES_ENCRYPT('{$data['apellidos']}','{$this->key_hash}')", FALSE );
            $this->db->set( 'email', "AES_ENCRYPT('{$data['email']}','{$this->key_hash}')", FALSE );
            $this->db->set( 'fecha_nac', strtotime(date( "d-m-Y", strtotime($data['fecha_nac']) )) ,false);
            $this->db->set( 'calle', "AES_ENCRYPT('{$data['calle']}','{$this->key_hash}')", FALSE );
            $this->db->set( 'numero', $data['numero']);
            $this->db->set( 'colonia', "AES_ENCRYPT('{$data['colonia']}','{$this->key_hash}')", FALSE );
            $this->db->set( 'municipio', "AES_ENCRYPT('{$data['municipio']}','{$this->key_hash}')", FALSE );


            $this->db->set( 'cp', "AES_ENCRYPT('{$data['cp']}','{$this->key_hash}')", FALSE );
            $this->db->set( 'id_estado', $data['id_estado']);
            $this->db->set( 'celular', "AES_ENCRYPT('{$data['celular']}','{$this->key_hash}')", FALSE );
            $this->db->set( 'telefono', "AES_ENCRYPT('{$data['telefono']}','{$this->key_hash}')", FALSE );

            $this->db->set( 'contrasena', "AES_ENCRYPT('{$data['contrasena']}','{$this->key_hash}')", FALSE );
            //$this->db->set( 'ciudad', "AES_ENCRYPT('{$data['id_estado_compra']}','{$this->key_hash}')", FALSE );
            $this->db->set( 'ciudad', "AES_ENCRYPT('{$data['ciudad']}','{$this->key_hash}')", FALSE );
            $this->db->set( 'nick', "AES_ENCRYPT('{$data['nick']}','{$this->key_hash}')", FALSE );


            $this->db->insert($this->participantes );

            if ($this->db->affected_rows() > 0){
                  return TRUE;
                } else {
                    return FALSE;
                }
                $result->free_result();
            
        }


     //checar el login del participante
        public function check_login($data){
          $this->db->select("id", FALSE);           
          $this->db->select("AES_DECRYPT(p.email,'{$this->key_hash}') AS email", FALSE);      
          $this->db->select("AES_DECRYPT(p.nombre,'{$this->key_hash}') AS nombre", FALSE);      
          $this->db->select("AES_DECRYPT(p.apellidos,'{$this->key_hash}') AS apellidos", FALSE);      
          $this->db->select("AES_DECRYPT(p.celular,'{$this->key_hash}') AS celular", FALSE);      
          $this->db->select("AES_DECRYPT(p.contrasena,'{$this->key_hash}') AS contrasena", FALSE);

          //$this->db->select("AES_DECRYPT(p.tarjeta,'{$this->key_hash}') AS tarjeta", FALSE);
          //$this->db->select("AES_DECRYPT(p.juego,'{$this->key_hash}') AS juego", FALSE);

          $this->db->from($this->participantes.' as p');
            
          $this->db->where('p.email', "AES_ENCRYPT('{$data['email']}','{$this->key_hash}')", FALSE); 
          $this->db->where('p.contrasena', "AES_ENCRYPT('{$data['contrasena']}','{$this->key_hash}')", FALSE);
          $login = $this->db->get();

          if ($login->num_rows() > 0)
            return $login->result();
          else 
            return FALSE;
          $login->free_result();
        }        



      //agregar a la bitacora de participante sus accesos  
       public function anadir_historico_acceso($data){
            $timestamp = time();
            $ip_address = $this->input->ip_address();
            $user_agent= $this->input->user_agent();

            $this->db->set( 'id_usuario', $data->id); // luego esta se compara con la tabla participante
            $this->db->set( 'email', "AES_ENCRYPT('{$data->email}','{$this->key_hash}')", FALSE );
            $this->db->set( 'fecha_pc',  gmt_to_local( $timestamp, $this->timezone, TRUE) );  //fecha cdo se registro
            $this->db->set( 'ip_address',  $ip_address, TRUE );
            $this->db->set( 'user_agent',  $user_agent, TRUE );
            $this->db->insert($this->bitacora_participante );
            if ($this->db->affected_rows() > 0){
                    return TRUE;
                } else {
                    return FALSE;
                }
                $result->free_result();

        }




 //----------------**************catalogos-------------------************------------------
        public function listado_estados(){
            $this->db->select( 'id, nombre' );
            $estados = $this->db->get($this->catalogo_estados );
            if ($estados->num_rows() > 0 )
               return $estados->result();
            else
               return FALSE;
            $estados->free_result();
        }   



        /////////////////////ticket//////////////////////////


        //checar si el tickets ya fue registrado
        public function check_tickets_existente($data){
            $this->db->select("AES_DECRYPT(tarjeta,'{$this->key_hash}') AS tarjeta", FALSE);
            $this->db->select("AES_DECRYPT(juego,'{$this->key_hash}') AS juego", FALSE);
            $this->db->from($this->registro_participantes);
            $this->db->where('ticket',"AES_ENCRYPT('{$data['ticket']}','{$this->key_hash}')",FALSE);
            $login = $this->db->get();
            if ($login->num_rows() > 0)
                return false; // $login->row();
            else
                return TRUE;
            $login->free_result();
        }





            //agregar participante
        public function anadir_tickets( $data ){
            $timestamp = time();

            $this->db->set( 'fecha_pc',  gmt_to_local( $timestamp, $this->timezone, TRUE) );  //fecha cdo se registro
            
            $id_participante = $this->session->userdata('id_participante');
            $this->db->set( 'id_participante', '"'.$id_participante.'"',false); // id del usuario que se registro
            $this->db->set( 'ticket', "AES_ENCRYPT('{$data['ticket']}','{$this->key_hash}')", FALSE );
            $this->db->set( 'monto', "AES_ENCRYPT('{$data['monto']}','{$this->key_hash}')", FALSE );
            
            $this->db->set( 'compra', strtotime(date( "d-m-Y", strtotime($data['compra']) )) ,false);
            //el orden de las cartas
            $this->db->set( 'puntos', "AES_ENCRYPT('{$data['puntos']}','{$this->key_hash}')", FALSE );
            //tarjeta vacia inicialmente
            $this->db->set( 'tarjeta', "AES_ENCRYPT('','{$this->key_hash}')", FALSE );  //total comienza en 0
            $this->db->set( 'juego', "AES_ENCRYPT('','{$this->key_hash}')", FALSE );  //total comienza en 0
            $this->db->insert($this->registro_participantes );
            if ($this->db->affected_rows() > 0){
                    return TRUE;
                } else {
                    return FALSE;
                }
                $result->free_result();
        }   


         public function actualizar_respuesta_tarjeta($data){
            $this->db->set( 'tarjeta', "AES_ENCRYPT('{$data['formato']}','{$this->key_hash}')", FALSE );
            $this->db->set( 'posicion', "AES_ENCRYPT('{$data['posicion']}','{$this->key_hash}')", FALSE );
            $this->db->set( 'valor', "AES_ENCRYPT('{$data['valor']}','{$this->key_hash}')", FALSE );

            $this->db->where("id_participante", '"'.$this->session->userdata('id_participante').'"',false);  
            $this->db->where('ticket',"AES_ENCRYPT('{$this->session->userdata('num_ticket_participante')}','{$this->key_hash}')",FALSE);
             $this->db->update($this->registro_participantes );
  
              if ($this->db->affected_rows() > 0){
                    return TRUE;
                } else {
                    return FALSE;
                }
                $result->free_result();

        }

        /*
                   SELECT AES_DECRYPT( juego,  'gtg5igLZasUC3xNfDlvTGBxxkoMuR6FaCYw5' ) AS juego, 
AES_DECRYPT( tarjeta, 'gtg5igLZasUC3xNfDlvTGBxxkoMuR6FaCYw5' ) AS tarjeta, 
id_pregunta, AES_DECRYPT( responder, 'gtg5igLZasUC3xNfDlvTGBxxkoMuR6FaCYw5' ) AS responder,
AES_DECRYPT( posicion, 'gtg5igLZasUC3xNfDlvTGBxxkoMuR6FaCYw5' ) AS posicion, 
AES_DECRYPT( valor, 'gtg5igLZasUC3xNfDlvTGBxxkoMuR6FaCYw5' ) AS valor 

FROM calimax_registro_participantes



        */

        public function actualizar_respuesta_juego($data){

            //$this->db->set( 'responder', "AES_ENCRYPT('{$data['responder']}','{$this->key_hash}')", FALSE );
            $this->db->set( 'responder', $data['responder'] );
            $this->db->set("id_pregunta", (int)$this->session->userdata( 'pregunta'));  
            $this->db->set( 'juego', "AES_ENCRYPT('{$data['formato']}','{$this->key_hash}')", FALSE );
            $this->db->where("id_participante", '"'.$this->session->userdata('id_participante').'"',false);  
            $this->db->where('ticket',"AES_ENCRYPT('{$this->session->userdata('num_ticket_participante')}','{$this->key_hash}')",FALSE);
             $this->db->update($this->registro_participantes );
  
              if ($this->db->affected_rows() > 0){
                    return TRUE;
                } else {
                    return FALSE;
                }
                $result->free_result();

        }


 

        public function record_personal($data){
             $this->db->select("COUNT(r.id_participante) as 'cantidad'");

             $this->db->select("
             sum(


                  (
                  (r.responder=1)* (  SUBSTRING_INDEX
                    (             SUBSTRING_INDEX(AES_DECRYPT( r.tarjeta,  '{$this->key_hash}'),'-;',1),'+',-1

                    ) + 

                    SUBSTRING_INDEX
                     (
                    SUBSTRING_INDEX(AES_DECRYPT( r.tarjeta,  '{$this->key_hash}'),'+',-1)
                    ,'-;',1

                    )) 
                )    +


                (
                  (r.responder<>1)* 25
                ) 
               

               )+
                (
                  (p.redes=1)* 100
                ) AS total_iguales

              ",false );

                         
          $this->db->select("AES_DECRYPT(r.tarjeta,'{$this->key_hash}') AS tarjeta", FALSE);
          $this->db->select("AES_DECRYPT(r.juego,'{$this->key_hash}') AS juego", FALSE);
          $this->db->from($this->participantes.' as p');
          $this->db->join($this->registro_participantes.' as r', 'p.id = r.id_participante','left');
          $where = "( (p.id='".$data['id_participante']."') ) ";      
          $this->db->where($where);
          //$this->db->group_by("p.id");

            $result = $this->db->get();
            
            if ( $result->num_rows() > 0 )
               return $result->row();
            else
               return False;
            $result->free_result();
         } 


         public function felicidades(){

             $this->db->select("
             sum(
                  (
                  (r.responder=1)* (  SUBSTRING_INDEX
                    (             SUBSTRING_INDEX(AES_DECRYPT( r.tarjeta,  '{$this->key_hash}'),'-;',1),'+',-1

                    ) + 

                    SUBSTRING_INDEX
                     (
                    SUBSTRING_INDEX(AES_DECRYPT( r.tarjeta,  '{$this->key_hash}'),'+',-1)
                    ,'-;',1

                    )) 
                )    +


                (
                  (r.responder<>1)* 25
                )
               ) AS total_iguales
              ",false );
          $this->db->from($this->registro_participantes.' as r');
          $this->db->where("r.id_participante", '"'.$this->session->userdata('id_participante').'"',false);  
          $this->db->where('r.ticket',"AES_ENCRYPT('{$this->session->userdata('num_ticket_participante')}','{$this->key_hash}')",FALSE);

          $result = $this->db->get();
            
            if ( $result->num_rows() > 0 )
               return $result->row();
            else
               return False;
            $result->free_result();


         } 

      
}    