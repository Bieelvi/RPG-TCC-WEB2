<?php

	include("ConexaoDataBase.php");

	class Pilha {
		private $lista = [];
		private $topo = -1;

		public function empilha($valor) {
		    $this->topo++;
	     	$this->lista[$this->topo] = $valor;
		}

		public function remove() {
		    if($this->_isset())
		        unset($this->lista[$this->topo]);
		        $this->topo--;
		    }

		public function pegaTopo(){
		    return $this->lista[$this->topo];
		}

		public function _isset() {
	        $ret = true;

	        if($this->topo < 0)
	            $ret = false;
	        return $ret;
    	}

    	public function mostra($valor){
    		for ($i = ($this->topo); $i >= 0; $i--)
    			$this->lista[$i];
    	}

	}