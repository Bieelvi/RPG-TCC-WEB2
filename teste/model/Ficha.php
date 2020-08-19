<?php 
	class Ficha{
		/* METODOS */
		public function modificadorAtributo($atributo){
			switch ($atributo) {
				case 1: return -5; break;
				case 2: case 3: return -4; break;
				case 4: case 5: return -3; break;
				case 6: case 7: return -2; break;
				case 8: case 9: return -1; break;
				case 10: case 11: return 0; break;
				case 12: case 13: return +1; break;
				case 14: case 15: return +2; break;
				case 16: case 17: return +3; break;
				case 18: case 19: return +4; break;
				case 20: case 21: return +5; break;
				case 22: case 23: return +6; break;
				case 24: case 25: return +7; break;
				case 26: case 27: return +8; break;
				case 28: case 29: return +9; break;
				case 30: return +10; break;															
				default: return 0; break;
			}
		}

		/* ATRIBUTOS E GET and SET */		
		private $forca;
		private $destreza;
		private $constituicao;
		private $inteligencia;
		private $sabedoria;
		private $carisma;

		public function getForca(){
			return $this->forca;
		}

		public function setForca($destreza){
			$this->destreza = $destreza;
		}

		public function getDestreza(){
			return $this->destreza;
		}

		public function setDestreza($destreza){
			$this->destreza = $destreza;
		}

		public function getConstituicao(){
			return $this->constituicao;
		}

		public function setConstituicao($constituicao){
			$this->constituicao = $constituicao;
		}

		public function getInteligencia(){
			return $this->inteligencia;
		}

		public function setInteligencia($inteligencia){
			$this->inteligencia = $inteligencia;
		}

		public function getSabedoria(){
			return $this->sabedoria;
		}

		public function setSabedoria($sabedoria){
			$this->sabedoria = $sabedoria;
		}

		public function getCarisma(){
			return $this->carisma;
		}

		public function setCarisma($carisma){
			$this->carisma = $carisma;
		}
	}
?>