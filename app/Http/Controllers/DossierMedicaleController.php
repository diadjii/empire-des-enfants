<?php

namespace App\Http\Controllers;

use App\Entities\ConsultationMedicale;
use App\Entities\DossierEnfant;
use App\Entities\DossierMedicale;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;
use PDF;
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
        $groupe = $request->get("groupeSanguin");
        $id     = $request->get("idEnfant");

      //  $u = $this->em->getRepository(DossierMedicale::class);
        $dossierRep     = $this->em->getRepository(DossierEnfant::class);
        $dossierEnfant  = $dossierRep->findByIdDossierEnfant($id);

        $dossierMedicale = new DossierMedicale();

        $dossierMedicale->setDossierEnfant($dossierEnfant[0]);
        $dossierMedicale->setGroupeSanguin($groupe);

        $this->em->persist($dossierMedicale);
        $this->em->flush();

        return redirect()->back();
    }


    public function show($id)
    {
        //recuperation du dossier de l'enfant concerne
        $dossierRep = $this->em->getRepository(DossierEnfant::class);
        $dossierEnfant = $dossierRep->findByIdDossierEnfant($id);

        //recuperation dossier medicale
        $dossierRep = $this->em->getRepository(DossierMedicale::class);
        $dossierMedicale = $dossierRep->findByIdDossierEnfant($dossierEnfant[0]);
        $d = null;

        try{
            $d = $dossierMedicale[0];
        }catch(\ErrorException $e){
            $d = null;
        }
        $login = session('login');

        return view("back.detail-dossier-medical", compact("login", "d", 'enfant'));

    }


    public function showDetails($id)
    {
        //recuperation du dossier de l'enfant
        $dossierRepEnfant     = $this->em->getRepository(DossierEnfant::class);
        $dossierEnfant  = $dossierRepEnfant->findByIdDossierEnfant($id);
        $enfant         = $dossierEnfant[0];

        //recuperation dossier medicale
        $dossierRepMedical      = $this->em->getRepository(DossierMedicale::class);
        $dossierMedicale = $dossierRepMedical->findByIdDossierEnfant($dossierEnfant[0]);

        $dossier                 = null;
        $infosConsultationEnfant = [];


        try {
            $dossier = $dossierMedicale[0];

        } catch (\ErrorException $e) {
            $dossier = null;
        }
        if ($dossier != null) {
            try {
                $consultationRep        = $this->em->getRepository(ConsultationMedicale::class);
                $consultationsEnfant    = $consultationRep->findByIdDossierMedicale($dossierMedicale[0]);

                foreach ($consultationsEnfant as $consul) {

                    $c = [
                        'id'                => $consul->getIdConsultation(),
                        'consultation'      => $consul->getTypeConsultation(),
                        'prescription'      => $consul->getPrescription(),
                        'analyse'           => $consul->getAnalyseComplementaire(),
                        'diagnostique'      => $consul->getDiagnostique(),
                        'dateConsultation'  => $consul->getDateVisite()
                    ];

                    array_push($infosConsultationEnfant, $c);
                }
            } catch (\ErrorException $e) {
                $consultationsEnfant = null;
            }
        }

        $login = session('login');

        $typeUser       = session('typeCurrentUser');
        
        $redirection    = '';

        switch ($typeUser){
            case("admin"):
                $redirection = 'dossier-medical-enfant';
                break;
            case ("infirmier"):
                $redirection = 'detail-dossier-medical';
        }

        return view("back.$redirection", compact("login", "dossier", "enfant", "infosConsultationEnfant"));

    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function consultationPDF($idDossier)
    {
        /*$dossierRepEnfant   = $this->em->getRepository(DossierEnfant::class);
        $dossierEnfant      = $dossierRepEnfant->findByIdDossierEnfant($idDossier);
        $enfant             = $dossierEnfant[0];*/

        //recuperation dossier medicale
        $dossierRepMedical  = $this->em->getRepository(DossierMedicale::class);
        $dossierMedical    = $dossierRepMedical->findByIdDossierMedicale($idDossier);

        $dossier        = null;
        $listeConsultations  = [];


        try {
            $dossier = $dossierMedical[0];
        } catch (\ErrorException $e) {
            $dossier = null;
        }

        if ($dossier != null) {

            try {
                $consultationRep        = $this->em->getRepository(ConsultationMedicale::class);
                $consultations    = $consultationRep->findByIdDossierMedicale($dossierMedical[0]);

                foreach ($consultations as $consul) {

                    $c = [
                        'id'                => $consul->getIdConsultation(),
                        'consultation'      => $consul->getTypeConsultation(),
                        'prescription'      => $consul->getPrescription(),
                        'analyse'           => $consul->getAnalyseComplementaire(),
                        'diagnostique'      => $consul->getDiagnostique(),
                        'dateConsultation'  => $consul->getDateVisite()
                    ];

                    array_push($listeConsultations, $c);
                }
            } catch (\ErrorException $e) {
                $consultations = null;
            }
        }

        $login = session('login');

        $pdf = PDF::loadView('back.consultation-template-pdf', compact("login", "dossier", "enfant", "listeConsultations"));

        return $pdf->download('consultation.pdf');

        //return view("back.consultation-template-pdf", compact("login", "dossier", "enfant", "listeConsultations"));
    }
}
