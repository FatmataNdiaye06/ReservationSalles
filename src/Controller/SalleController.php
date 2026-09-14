<?php
namespace App\Controller;

use App\Service\Salle\CreerSalleService;
use App\Service\Salle\ModifierSalleService;
use App\Service\Salle\ListerSalleService;
use App\Service\Salle\TrouverSalleService; 
use App\DTO\CreerSalleDTOBuilder;
use App\Validation\SalleValidator;
use App\Validation\ValidationResult;

class SalleController extends AbstractController
{
    public function __construct(
        private ListerSalleService $listerSalleService,
        private CreerSalleService $creerSalleService,
        private ModifierSalleService $modifierSalleService,
        private TrouverSalleService $trouverSalleService,
        private SalleValidator $salleValidator
    ){}
    
    public function home()
    {
        return $this->renderView('index.php', [
            'title' => 'Accueil',
            'currentPage' => 'home'
        ]);
    }

    public function index()
    {
        $salles = $this->listerSalleService->execute();
        return $this->renderView('salle/index.php', [
            'salles' => $salles,
            'title' => 'Les salles',
            'currentPage' => 'salles'
        ]);
    }

    public function show(array $args)
    {
        $id = (int) ($args['id'] ?? 0);

        try {
            $salle = $this->trouverSalleService->execute($id);
        } catch (\Exception $e) {
            $this->renderView('error/404.php', ['message' => $e->getMessage()]);
            return;
        }

        $this->renderView('salle/show.php', [
            'salle' => $salle,
            'title' => 'Salle - ' . ($salle->nom ?? 'Détail'),
            'currentPage' => 'salles'
        ]);
    }
    
    public function create()
    {
        $this->renderView('salle/form.php', [
            'errors' => [],
            'old' => [],
            'title' => 'Ajouter une salle',
            'currentPage' => 'salles'
        ]);
    }

    public function store(array $formData)
    {
        $validationResult = $this->salleValidator->validate($formData);
        if (!$validationResult->isValid()) {
            $this->renderView('salle/form.php', [
                'errors' => $validationResult->errors(),
                'old' => $formData,
                'title' => 'Ajouter une salle',
                'currentPage' => 'salles'
            ]);
            return;
        }

        try {
            $dto = CreerSalleDTOBuilder::fromArray($validationResult->data())->build();
            $this->creerSalleService->execute($dto);
        } catch (\Exception $e) {
            $this->renderView('salle/form.php', [
                'errors' => ['global' => $e->getMessage()],
                'old' => $formData,
                'title' => 'Ajouter une salle',
                'currentPage' => 'salles'
            ]);
            return;
        }

        header('Location: /salles');
        exit;
    }
    
    public function edit(array $args)
    {
        $id = (int) ($args['id'] ?? 0);

        try {
            $salle = $this->trouverSalleService->execute($id);
        } catch (\Exception $e) {
            $this->renderView('error/404.php', ['message' => $e->getMessage()]);
            return;
        }

        $this->renderView('salle/form.php', [
            'salle' => $salle,
            'errors' => [],
            'old' => (array) $salle
        ]);
    }

    public function update(array $args, array $formData)
    {
        $id = (int) ($args['id'] ?? 0);

        $validationResult = $this->salleValidator->validate($formData);
        if (!$validationResult->isValid()) {
            $this->renderView('salle/form.php', [
                'errors' => $validationResult->errors(),
                'old' => $formData,
                'salleId' => $id
            ]);
            return;
        }

        try {
            $dto = CreerSalleDTOBuilder::fromArray($validationResult->data())->build();
            $this->modifierSalleService->execute($id, $dto);
        } catch (\Exception $e) {
            $this->renderView('salle/form.php', [
                'errors' => ['global' => $e->getMessage()],
                'old' => $formData,
                'salleId' => $id
            ]);
            return;
        }

        header('Location: /salles');
        exit;
    }
}