<?php
namespace App\Controller;

use App\Service\Reservation\ListerReservationsService;
use App\Service\Reservation\TrouverReservationService;
use App\Service\Reservation\CreerReservationService;
use App\Service\Reservation\AnnulerReservationService;
use App\DTO\CreerReservationDTOBuilder;
use App\Validation\ReservationValidator;
use App\Validation\ValidationResult;

class ReservationController extends AbstractController
{
    public function __construct(
        private ListerReservationsService $listerReservationsService,
        private TrouverReservationService $trouverReservationService,
        private CreerReservationService $creerReservationService,
        private AnnulerReservationService $annulerReservationService,
        private ReservationValidator $reservationValidator
    ) {}

    public function index()
    {
        $reservations = $this->listerReservationsService->execute();
        return $this->renderView('reservation/index.php', [
            'reservations' => $reservations,
            'title' => 'Réservations',
            'currentPage' => 'reservations'
        ]);
    }

    public function show(array $args)
    {
        $id = (int) ($args['id'] ?? 0);

        try {
            $reservation = $this->trouverReservationService->execute($id);
        } catch (\Exception $e) {
            $this->renderView('error/404.php', ['message' => $e->getMessage()]);
            return;
        }

        $this->renderView('reservation/show.php', [
            'reservation' => $reservation,
            'title' => 'Réservation - ' . ($reservation->id ?? '#'),
            'currentPage' => 'reservations'
        ]);
    }

    public function create()
    {
        $this->renderView('reservation/form.php', [
            'errors' => [],
            'old' => [],
            'title' => 'Nouvelle réservation',
            'currentPage' => 'reservations'
        ]);
    }

    public function store(array $formData)
    {
        $validationResult = $this->reservationValidator->validate($formData);
        
        if (!$validationResult->isValid()) {
            $this->renderView('reservation/form.php', [
                'errors' => $validationResult->errors(),
                'old' => $formData
            ]);
            return;
        }

        try {
            $dto = CreerReservationDTOBuilder::fromArray($validationResult->data())->build();
            $this->creerReservationService->execute($dto);
        } catch (\Exception $e) {
            $this->renderView('reservation/form.php', [
                'errors' => ['global' => $e->getMessage()],
                'old' => $formData
            ]);
            return;
        }

        header('Location: /reservations');
        exit;
    }

    public function cancel(array $args)
    {
        $id = (int) ($args['id'] ?? 0);

        try {
            $this->annulerReservationService->execute($id);
        } catch (\Exception $e) {
        }

        header('Location: /reservations');
        exit;
    }
}