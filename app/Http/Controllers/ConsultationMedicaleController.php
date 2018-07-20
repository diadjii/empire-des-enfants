<?php

namespace App\Http\Controllers;

use Faker\Provider\DateTime;
use Illuminate\Http\Request;

use Doctrine\ORM\EntityManagerInterface;

use App\Entities\DossierMedicale;
use App\Entities\ConsultationMedicale;

class ConsultationMedicaleController extends Controller
{
    private $em;

  public function __construct(EntityManagerInterface $em){
    $this->em = $em;
  }

    public function index()
    {
        //
    }

    
    public function create()
    {
        //
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

        setlocale(LC_TIME, "fr_FR");
        $dateConsultation       = date('\L\e Y/m/d à  H\h:i\m\n');

        $dossierRep      = $this->em->getRepository(DossierMedicale::class);
        $dossierMedicale = $dossierRep->findByIdDossierMedicale($idDossierMedicale);


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
          ];
          
        EventStoreController::store($this->em,$info);

       return redirect()->back();
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
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

            $info = [
                "typeAction"    => "Modification Consltation",
                "userId"        => session("id"),
              ];
              
            EventStoreController::store($this->em,$info);

            return redirect()->back()->with('ok',['Modification enregistrée avec succés']);
        }
    }

    public function destroy($id)
    {
        //
    }
}
