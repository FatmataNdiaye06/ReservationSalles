<?php
namespace App\DTO;

class CreerReservationDTOBuilder {
    private int $salleId;
    private string $responsable;
    private string $email;
    private string $motif;
    private \DateTimeImmutable $dateDebut;
    private \DateTimeImmutable $dateFin;

    public static function fromArray(array $data): self
    {
        return (new self())
            ->salleId((int) $data['salle_id'])
            ->responsable($data['responsable'])
            ->email($data['email'])
            ->motif($data['motif'])
            ->dateDebut(new \DateTimeImmutable($data['date_debut']))
            ->dateFin(new \DateTimeImmutable($data['date_fin']));
    }
    
    public function salleId(int $salleId): self { 
        $this->salleId = $salleId; 
        return $this;
    }
    public function responsable(string $responsable): self { 
        $this->responsable = trim($responsable); 
        return $this; 
    }    
    public function email(string $email): self { 
        $this->email = $email; 
        return $this; 
    }
    public function motif(string $motif): self { 
        $this->motif = $motif; 
        return $this; 
    }
    public function dateDebut(\DateTimeImmutable $dateDebut): self { 
        $this->dateDebut = $dateDebut; 
        return $this; 
    }
    public function dateFin(\DateTimeImmutable $dateFin): self { 
        $this->dateFin = $dateFin; 
        return $this; 
    }

    public function build(): CreerReservationDTO {
      if (
        !isset($this->salleId) || !isset($this->responsable) || 
        !isset($this->email) || !isset($this->motif) || 
        !isset($this->dateDebut) || !isset($this->dateFin)
    ) {
        throw new \InvalidArgumentException("Toutes les informations de la réservation sont obligatoires.");
    } 
      return new CreerReservationDTO(
        salleId: $this->salleId,
        responsable: $this->responsable,
        email: $this->email,
        motif: $this->motif,
        dateDebut: $this->dateDebut,
        dateFin: $this->dateFin
    );
    }
}