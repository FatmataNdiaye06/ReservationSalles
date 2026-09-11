<?php
namespace App\Controller;

use App\Service\CreerSalleService;
use App\Service\ModifierSalleService;
use App\Service\Salle\ListerSalleService;
use App\Service\Salle\TrouverSalleService; 
use App\DTO\CreerSalleDTOBuilder;
use App\Validation\SalleValidator;
use App\Validator\ValidationResult;

class SalleController extends AbstractController
{
    public function __construct(
        private ListerSalleService $listerSalleService,
        private CreerSalleService $creerSalleService,
        private ModifierSalleService $modifierSalleService,
        private TrouverSalleService $trouverSalleService,
        private SalleValidator $salleValidator
    ){}
    
    public function index()
    {
        $salles = $this->listerSalleService->execute();
        return $this->renderView('salle/index.php', ['salles' => $salles]);
    }

    public function show(array $args)
    {
        $id = (int) ($args['id'] ?? 0);

        try {
            $salle = $this->trouverSalleService->executer($id);
        } catch (\Exception $e) {
            $this->renderView('error/404.php', ['message' => $e->getMessage()]);
            return;
        }

        $this->renderView('salle/show.php', [
            'salle' => $salle
        ]);
    }
    
    public function create()
    {
        $this->renderView('salle/form.php', [
            'errors' => [],
            'old' => []
        ]);
    }

    public function store(array $formData)
    {
        $validationResult = $this->salleValidator->validate($formData);
        if (!$validationResult->isValid()) {
            $this->renderView('salle/form.php', [
                'errors' => $validationResult->errors(),
                'old' => $formData
            ]);
            return;
        }

        try {
            $dto = CreerSalleDTOBuilder::fromArray($validationResult->data())->build();
            $this->creerSalleService->execute($dto);
        } catch (\Exception $e) {
            $this->renderView('salle/form.php', [
                'errors' => ['global' => $e->getMessage()],
                'old' => $formData
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