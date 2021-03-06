<?php defined('SYSPATH') or die('No direct script access.');

class Model_Links extends Model {
  private $cercles = array(
				   "agro" => 
				   array("name" =>"AGRO - Cercle des BioIngénieurs",
						 "web" => "http://www.cercle-agro.be/",
						 "logo" => "public/images/logos/agro.png"),
				   "care" => 
				   array("name" =>"CARé - Cercle des Architectes Réunis",
						 "web" => "http://www.facebook.com/groups/400216605564/",
						 "logo" => "public/images/logos/care.jpg"),
				   "cd" => 
				   array("name" =>"CD - Cercle de Droit",
						 "web" => "http://www.cerclededroit.be/",
						 "logo" => "public/images/logos/cd.png"),
				   "cdh" => 
				   array("name" =>"CdH - Cercle d'Histoire",
						 "web" => "http://www.cerclehistoire.be",
						 "logo" => "public/images/logos/cdh.png"),
				   "cds" => 
				   array("name" =>"CdS - Cercle des Sciences",
						 "web" => "http://www.cercledessciences.be",
						 "logo" => "public/images/logos/cds.jpg"),
				   "cebulb" => 
				   array("name" =>"CEBULB - Cercle des Étudiants Borains de l'ULB",
						 "web" => "http://www.cebulb.be",
						 "logo" => "public/images/logos/cebulb.png"),
				   "cecs" => 
				   array("name" =>"CECS - Cercle des Étudiants du Centre et ses Sympathisants",
						 "web" => "https://sites.google.com/site/cecsulb/",
						 "logo" => "public/images/logos/cecs.jpg"),
				   "celb" => 
				   array("name" =>"CELB - Cercle des Étudiants Luxembourgeois à Bruxelles",
						 "web" => "http://www.celb.lu",
						 "logo" => "public/images/logos/celb.jpg"),
				   "cepha" => 
				   array("name" =>"CePHA - Cercle des Étudiants en Pharmacie",
						 "web" => "http://dev.ulb.ac.be/student/cepha/",
						 "logo" => "public/images/logos/cepha.jpg"),
				   "cgeo" => 
				   array("name" =>"CGEO - Cercle de Géographie et de Géologie",
						 "web" => "http://www.cgeo.be",
						 "logo" => "public/images/logos/cgeo.jpg"),
				   "chaa" => 
				   array("name" =>"CHAA - Cercle d'Histoire de l'Art et Archéologie",
						 "web" => "http://www.chaa.be",
						 "logo" => "public/images/logos/chaa.png"),
				   "chimacienne" => 
				   array("name" =>"Chimacienne - Cercle de la Chimacienne de Bruxelles",
						 "web" => "http://chimacienne-bxl.e-monsite.com/",
						 "logo" => "public/images/logos/chimacienne.png"),
				   "ci" => 
				   array("name" =>"CI - Cercle Informatique",
						 "web" => "http://www.cerkinfo.be",
						 "logo" => "public/images/logos/ci.jpg"),
				   "ciga" => 
				   array("name" =>"CIGA - Cercle des Infirmiers Gradués et Accoucheuses",
						 "web" => "http://www.ulb.ac.be/students/ciga/",
						 "logo" => "public/images/logos/ciga.png"),
				   "cjc" => 
				   array("name" =>"CJC - Cercle de Journalisme et Communication",
						 "web" => "http://www.cjculb.be",
						 "logo" => "public/images/logos/cjc.jpg"),
				   "ck" => 
				   array("name" =>"CK - Cercle de Kinésithérapie",
						 "web" => "http://www.cerclekine.be",
						 "logo" => "public/images/logos/ck.png"),
				   "cm" => 
				   array("name" =>"CM - Cercle de Médecine",
						 "web" => "http://www.cercle-medecine.be",
						 "logo" => "public/images/logos/cm.png"),
				   "cp" => 
				   array("name" =>"CP - Cercle Polytechnique",
						 "web" => "http://www.cerclepolytechnique.be",
						 "logo" => "public/images/logos/cp.png"),
				   "cpl" => 
				   array("name" =>"CPL - Cercle de Philosophie et Lettres",
						 "web" => "http://www.cercle-philo.be",
						 "logo" => "public/images/logos/cpl.jpg"),
				   "cps" => 
				   array("name" =>"CPS - Cercle des Étudiants en Sciences Politiques et Sociales",
						 "web" => "http://www.cpsulb.be",
						 "logo" => "public/images/logos/cps.png"),
				   "cpsy" => 
				   array("name" =>"CPSY - Cercle de Psychologie",
						 "web" => "http://www.students-psycho.site.ulb.ac.be/CPSY/",
						 "logo" => "public/images/logos/cpsy.png"),
				   "crom" => 
				   array("name" =>"CROM - Cercle de Romanes",
						 "web" => "http://www.romanes.be",
						 "logo" => "public/images/logos/crom.png"),
				   "cs" => 
				   array("name" =>"CS - Cercle Solvay",
						 "web" => "http://www.cercle-solvay.be",
						 "logo" => "public/images/logos/cs.png"),
				   "fronta" => 
				   array("name" =>"FRONTA - Cercle La Frontalière",
						 "web" => "http://www.lafronta.be",
						 "logo" => "public/images/logos/fronta.png"),
				   "isep" => 
				   array("name" =>"ISEP - Cercle d'Éducation Physique",
						 "web" => "http://sites.google.com/site/cercleisep/",
						 "logo" => "public/images/logos/isep.png"),
				   "lux" => 
				   array("name" =>"La LUX - Cercle des Étudiants de la Province du Luxembourg",
						 "web" => "http://www.luxbxl.be",
						 "logo" => "public/images/logos/lux.jpg"),
				   "librex" => 
				   array("name" =>"Librex - Cercle du Libre Examen",
						 "web" => "http://www.librex.be",
						 "logo" => "public/images/logos/librex.png"),
				   "nam" => 
				   array("name" =>"Namuroise - Cercle de la Namuroise de Bruxelles",
						 "web" => "http://www.namuroise-bxl.be",
						 "logo" => "public/images/logos/nam.jpg"),
				   "semeur" => 
				   array("name" =>"Semeur - Cercle des étudiants du pays de Charleroi et de Thudinie",
						 "web" => "http://www.lesemeur.be",
						 "logo" => "public/images/logos/semeur.png")
				   );

  public function get_informations() {
	return $this->cercles;
  }
}