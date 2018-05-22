<?php

namespace SV\EleveBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SV\EleveBundle\Entity\Eleves;
use SV\EleveBundle\Form\ElevesType;
use SV\EleveBundle\Form\ParentsType;
/**
* 
*/
class PupilController extends Controller
{
    public function homeAction()
    {
        return $this->redirectToRoute('sv_eleve_homepage');
    }

    public function indexAction()
    {
        // On récupère le service
        $security = $this->container->get('security.token_storage');
        // On récupère le parent
        $parent = $security->getToken()->getUser();

        $eleveRepository = $this->getDoctrine()->getManager()->getRepository("SVEleveBundle:Eleves");
        $eleves = $eleveRepository->findBy(array(
            'parent' => $parent
        ));

        foreach ($eleves as $eleve)
        {
            $eleveclasse = $this->getDoctrine()->getManager()->getRepository("SVEleveBundle:ElevesClasses")->findOneBy(array(
                'eleve' => $eleve
            )) ;

            $classe = $this->getDoctrine()->getManager()->getRepository("SVEleveBundle:Classes")->findOneBy(array(
                'id' => $eleveclasse->getClasse()->getId()
            ));
            $college = $this->getDoctrine()->getManager()->getRepository("SVEleveBundle:Colleges")->findOneBy(array(
                'id' => $eleveclasse->getCollege()->getId()
            ));

            $eleve->setClasse($classe);
            $eleve->setCollege($college);
        }

        return $this->render('SVEleveBundle::index.html.twig', array(
            "enfants" => $eleves
        ));
    }

    public function addPupilAction(Request $request)
	{
		$eleve = new Eleves();
		$form = $this->createForm(ElevesType::class, $eleve);
		if($request->isMethod('POST') && $form->handleRequest($request)->isValid())
		{
			$em = $this->getDoctrine()->getManager();
			$em->persist($eleve);
			$em->flush();
			
			$this->addFlash('notice', 'Pupil saved');

			return $this->redirectToRoute('sv_eleve_overview', array(
				'slug' => $eleve->getSlug()
			));
		}

		return $this->render('SVEleveBundle::addPupil.html.twig', array(
			'form' => $form->createView()
		));
	}

	public function overviewAction($slug)
	{
        $eleveRepository = $this->getDoctrine()->getManager()->getRepository("SVEleveBundle:Eleves");
        $eleve = $eleveRepository->findOneBy(array(
            'slug' => $slug
        ));

//        INFOS CLASSE ET COLLEGE
        $eleveclasse = $this->getDoctrine()->getManager()->getRepository("SVEleveBundle:ElevesClasses")->findOneBy(array(
            'eleve' => $eleve
        )) ;
        $classe = $this->getDoctrine()->getManager()->getRepository("SVEleveBundle:Classes")->findOneBy(array(
            'id' => $eleveclasse->getClasse()->getId()
        ));
        $college = $this->getDoctrine()->getManager()->getRepository("SVEleveBundle:Colleges")->findOneBy(array(
            'id' => $eleveclasse->getCollege()->getId()
        ));
        $eleve->setClasse($classe);
        $eleve->setCollege($college);
//        EMPLOI DE TEMPS (utile pour le nom du titulaire, l'effectif de la classe)
        $planning = $this->getDoctrine()->getManager()->getRepository("SVEleveBundle:Plannings")->findOneBy(array(
            'college' => $college,
            'classe' => $classe
        ));
//        DOSSIER DISCIPLINE
        $discipline = $this->getDoctrine()->getManager()->getRepository("SVEleveBundle:Disciplines")->findBy(array(
            'eleve' => $eleve
        ));
        $numDisc = count($discipline);
//        NOMBRES HEURES ABSCENCES
        $abscences = $this->getDoctrine()->getManager()->getRepository("SVEleveBundle:Abscences")->findBy(array(
            'eleve' => $eleve
        ));
        $numHeure = 0;
        $numRetard = 0;
        foreach ($abscences as $abscence)
        {
            $dd = $abscence->getDDebut();
            $df = $abscence->getDFin();
            $numHeure += ($df->diff($dd))->format("%h");
            if ((integer)($dd->format("h")) < 9) //si "l'heure" de la date de début est inférieure à 9h, il s'agit d'un retard
                $numRetard++;
        }
//        FINANCES (pour le recap de la situation)
        $finances = $this->getDoctrine()->getManager()->getRepository("SVEleveBundle:Finances")->findBy(array(
            'eleve' => $eleve
        ));
        $totalPaid = 0; //montant déjà payé
        foreach ($finances as $finance)
            $totalPaid += $finance->getAvance();
        //on compare au montant de la scolarité
        $totalPaid < $planning->getPrixScolarite() ? $financeOK = false : $financeOK = true;


        return $this->render('SVEleveBundle:overview:index.html.twig', array(
            "enfant" => $eleve,
            "planning" => $planning,
            "numDiscipline" => $numDisc,
            "numHeure" => $numHeure,
            "numRetard" => $numRetard,
            "financeOK" => $financeOK
        ));
	}

    public function abscenceAction($slug)
    {
        $eleveRepository = $this->getDoctrine()->getManager()->getRepository("SVEleveBundle:Eleves");
        $eleve = $eleveRepository->findOneBy(array(
            'slug' => $slug
        ));

        $content = $this->get('templating')->render('SVEleveBundle:abscence:index.html.twig', array(
            "enfant" => $eleve
        ));
        return new Response($content);
    }

    public function abscenceEventsAction($slug)
    {
        $eleveRepository = $this->getDoctrine()->getManager()->getRepository("SVEleveBundle:Eleves");
        $eleve = $eleveRepository->findOneBy(array(
            'slug' => $slug
        ));

        $abscenceRepository = $this->getDoctrine()->getManager()->getRepository("SVEleveBundle:Abscences");
        $abscences = $abscenceRepository->findBy(array(
            'eleve' => $eleve
        ));

        $allEvents = array();
        foreach ($abscences as $abscence) {
            $anEvent = array();
            $anEvent['start'] = $abscence->getDDebut()->format("Y-m-d H:i:s");
            $anEvent['end'] = $abscence->getDFin()->format("Y-m-d H:i:s");
            $anEvent['title'] = $abscence->getMatiere()->getMatiere();
            $allEvents[] = $anEvent;
        }

        return new JsonResponse($allEvents);
    }

    public function disciplineAction($slug)
	{
        $eleveRepository = $this->getDoctrine()->getManager()->getRepository("SVEleveBundle:Eleves");
        $eleve = $eleveRepository->findOneBy(array(
            'slug' => $slug
        ));

        $disciplineRepository = $this->getDoctrine()->getManager()->getRepository("SVEleveBundle:Disciplines");
        $disciples = $disciplineRepository->findBy(array(
            'eleve' => $eleve
        ));

		return $this->render('SVEleveBundle:discipline:index.html.twig', array(
		    "enfant" => $eleve,
            "disciplines" => $disciples
        ));
	}

	public function financeAction($slug)
	{
        $eleveRepository = $this->getDoctrine()->getManager()->getRepository("SVEleveBundle:Eleves");
        $eleve = $eleveRepository->findOneBy(array(
            'slug' => $slug
        ));

        $eleveclasse = $this->getDoctrine()->getManager()->getRepository("SVEleveBundle:ElevesClasses")->findOneBy(array(
            'eleve' => $eleve
        )) ;
        $classe = $this->getDoctrine()->getManager()->getRepository("SVEleveBundle:Classes")->findOneBy(array(
            'id' => $eleveclasse->getClasse()->getId()
        ));
        $college = $this->getDoctrine()->getManager()->getRepository("SVEleveBundle:Colleges")->findOneBy(array(
            'id' => $eleveclasse->getCollege()->getId()
        ));
        $eleve->setClasse($classe);
        $eleve->setCollege($college);
//        EMPLOI DE TEMPS (utile pour le montant total de la pension scolaire)
        $planning = $this->getDoctrine()->getManager()->getRepository("SVEleveBundle:Plannings")->findOneBy(array(
            'college' => $college,
            'classe' => $classe
        ));

        $finances = $this->getDoctrine()->getManager()->getRepository("SVEleveBundle:Finances")->findBy(array(
            'eleve' => $eleve
        ));
        $totalPaid = 0; //montant déjà payé
        foreach ($finances as $finance)
            $totalPaid += $finance->getAvance();
        //on compare au montant de la scolarité

		return $this->render('SVEleveBundle:finance:index.html.twig', array(
            "enfant" => $eleve,
            "finances" => $finances,
            "total" => $planning->getPrixScolarite(),
            "avance" => $totalPaid, //ça évite de faire des calculs dans la vue
        ));
	}

	public function markAction($slug)
	{
        $eleveRepository = $this->getDoctrine()->getManager()->getRepository("SVEleveBundle:Eleves");
        $eleve = $eleveRepository->findOneBy(array(
            'slug' => $slug
        ));

        $disciplineRepository = $this->getDoctrine()->getManager()->getRepository("SVEleveBundle:Disciplines");
        $disciples = $disciplineRepository->findBy(array(
            'eleve' => $eleve
        ));

        return $this->render('SVEleveBundle:mark:index.html.twig', array(
            "enfant" => $eleve,
            "disciplines" => $disciples
        ));
	}

    public function drawermenuAction($slug)
    {
        $eleveRepository = $this->getDoctrine()->getManager()->getRepository("SVEleveBundle:Eleves");
        $eleveActif = $eleveRepository->findOneBy(array(
            'slug' => $slug
        ));

        return $this->render('SVEleveBundle::drawermenu.html.twig', array(
            "enfantActif" => $eleveActif
        ));
    }

    public function topmenuAction($slug)
    {
        $eleveRepository = $this->getDoctrine()->getManager()->getRepository("SVEleveBundle:Eleves");
        $eleveActif = $eleveRepository->findOneBy(array(
            'slug' => $slug
        ));

        return $this->render('SVEleveBundle::topmenu.html.twig', array(
            "enfantActif" => $eleveActif
        ));
    }
}
