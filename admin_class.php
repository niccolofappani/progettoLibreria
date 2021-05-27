<?php
    session_start();
    Class Action {
        private $db;
    
        public function __construct() {
            ob_start();
           include 'db_connect.php';
        
        $this->db = $conn;
        }
        function __destruct() {
            $this->db->close();
            ob_end_flush();
        }

        function signup(){
            extract($_POST);
            $data = " CodFiscale = '$codFisc' ";
            $data .= ", Nome = '$nome' ";
            $data .= ", Cognome = '$cognome' ";
            $data .= ", Email = '$email' ";
            $data .= ", Psw = '$psw' "; //TODO: encryption
            $data .= ", Via = '$indirizzo' ";
            $data .= ", NumeroCivico = '$numeroCivico' ";
            $data .= ", CAP = '$CAP' ";
            $data .= ", Citta = '$citta' ";
            $chk = $this->db->query("SELECT * FROM utente where Email = '$email' ")->num_rows;
            if($chk > 0){
                return 2;
                $chk = 0;
                exit;
            }
            $save = $this->db->query("INSERT INTO utente set ".$data);
            if($save){
                return 1;
            }
        }
    }
?>