<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entities\DossierMedicale;
use App\Entities\DossierEnfant;

class DossierMedicaleController extends Controller
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
        $consul  = $request->get("consultation");
        $presc   = $request->get("prescription");
        $analyse = $request->get("analyseComplementaire");
        $groupe  = $request->get("groupeSanguin");
        $diag    = $request->get("diagnostique");
        $lastVisit = $request->get("derniereVisite");
        $id     = $request->get("idEnfant");

        $u = $this->em->getRepository(DossierMedicale::class);
        $dossierRep = $this->em->getRepository(DossierEnfant::class);
        $dossierEnfant = $dossierRep->findByIdDossierEnfant($id);
        
        $dossierMedicale = new DossierMedicale();
        $dossierMedicale->setDossierEnfant($dossierEnfant[0]);

        $dossierMedicale->setTypeConsultation($consul);
        $dossierMedicale->setPrescription($presc);
        $dossierMedicale->setAnalyseComplementaire($analyse);
        $dossierMedicale->setGroupeSanguin($groupe);
        $dossierMedicale->setDiagnostique($diag);

        $this->em->persist($dossierMedicale);
        $this->em->flush();
        $login = session('login');

        // return view("back.infirmier",compact("login"));
    }

    
    public function show($id)
    {
        $dossierRep = $this->em->getRepository(DossierMedicale::class);
        $dossierMedicale = $dossierRep->findByIdDossierEnfant($id);

        try{
            $d=$dossierMedicale[0];
        }catch(\ErrorException $e){
            $d = null;
        }
        $login = session('login');

        return view("back.dossier-medical-enfant",compact("login","d"));

    }

    
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
