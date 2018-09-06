<?php

namespace App\Http\Controllers;

use App\Entities\User;
use App\Entities\DossierMedicale;
use App\Entities\ConsultationMedicale;

use Faker\Provider\DateTime;

use Illuminate\Http\Request;

use Doctrine\ORM\EntityManagerInterface;
use App\Entities\DossierEnfant;

class ConsultationMedicaleController extends Controller
{
    private $em;
    
    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }
    
    public function store(Request $request)
    {
        /**
        *  recuperation des infos du formulaire pour la 
        *  creation d'une consultation
        */
        
        $typeConsultation       = $request->get("consultation");
        $prescription           = $request->get("prescription");
        $analyseComplemantaire  = $request->get("analyseComplementaire");
        $diagnostique           = $request->get("diagnostique");
        $idDossierMedicale      = $request->get("idDossierMedicale");
        
        // echo $idDossierMedicale;
        // die();
        setlocale(LC_TIME, "fr_FR");
        $dateConsultation       = date('\L\e Y/m/d à  H\h:i\m\n');
        
        $dossierRep             = $this->em->getRepository(DossierMedicale::class);
        $dossierMedicale        = $dossierRep->findByIdDossierMedicale($idDossierMedicale);
        
        $dossierEnfantRep       = $this->em->getRepository(DossierEnfant::class);
        $dossierEnfant          = $dossierEnfantRep->findByIdDossierEnfant($dossierMedicale[0]->getDossierEnfant());

        $consultation =  new ConsultationMedicale();
        
        $consultation->setIdDossierMedicale($dossierMedicale[0]);
        $consultation->setTypeConsultation($typeConsultation);
        $consultation->setPrescription($prescription);
        $consultation->setAnalyseComplementaire($analyseComplemantaire);
        $consultation->setDiagnostique($diagnostique);
        $consultation->setDateVisite($dateConsultation);
        
        $this->em->persist($consultation);
        $this->em->flush();
        
        $info = [
            "typeAction"    => "Creation Consultation ",
            "userId"        => session("id"),
            "typeUser"      => session('typeCurrentUser'),
            "description"   =>  "Ajout d'une consultation dans le dossier medical de ".$dossierEnfant[0]->getNomEnfant()." ".$dossierEnfant[0]->getPrenomEnfant()
        ];
        
        EventStoreController::store($this->em,$info);
        
        return redirect()->back();
    }
    
    public function update(Request $request)
    {
        $consultation   = $request->get("consultation");
        $analyse        = $request->get("analyseComplementaire");
        $prescription   = $request->get("prescription");
        $diagnostique   = $request->get("diagnostique");
        $idConsultation = $request->get("idConsultation");
        
        $consultationRep    = $this->em->getRepository(ConsultationMedicale::class);
        $consultationResult = $consultationRep->findByIdConsultation($idConsultation);
        
        if(isset($consultationResult)){
            $consultationResult[0]->setTypeConsultation($consultation);
            $consultationResult[0]->setAnalyseComplementaire($analyse);
            $consultationResult[0]->setDiagnostique($diagnostique);
            $consultationResult[0]->setPrescription($prescription);
            
            $this->em->flush();
            $idCurrentUser  = session('id');

            $userRep        = $this->em->getRepository(User::class);
            $currentUser    = $userRep->findById($idCurrentUser);
            
            $info = [
                "typeAction"    => "Modification Conslutation",
                "userId"        => session("id"),
                "typeUser"      => session('typeCurrentUser'),
                "description"   => "Modification consultation du ".$consultationResult[0]->getDateVisite()." par ".$currentUser[0]->getPrenom()." ".$currentUser[0]->getNom()
            ];
            
            EventStoreController::store($this->em,$info);
            
            return redirect()->back()->with('ok',['Modification enregistrée avec succés']);
        }
    }
    
}
