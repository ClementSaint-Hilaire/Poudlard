<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtudiantRepository::class)]
class Etudiant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateNaiss = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $surnom = null;

    #[ORM\ManyToOne(inversedBy: 'etudiants')]
    private ?Promotion $promotion = null;

    #[ORM\ManyToOne(inversedBy: 'etudiants')]
    private ?Note $notes = null;

    #[ORM\OneToMany(mappedBy: 'etudiant', targetEntity: maison::class)]
    private Collection $maison;

    public function __construct()
    {
        $this->maison = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaiss(): ?\DateTimeInterface
    {
        return $this->dateNaiss;
    }

    public function setDateNaiss(\DateTimeInterface $dateNaiss): static
    {
        $this->dateNaiss = $dateNaiss;

        return $this;
    }

    public function getSurnom(): ?string
    {
        return $this->surnom;
    }

    public function setSurnom(?string $surnom): static
    {
        $this->surnom = $surnom;

        return $this;
    }

    public function getPromotion(): ?Promotion
    {
        return $this->promotion;
    }

    public function setPromotion(?Promotion $promotion): static
    {
        $this->promotion = $promotion;

        return $this;
    }

    public function getNotes(): ?Note
    {
        return $this->notes;
    }

    public function setNotes(?Note $notes): static
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * @return Collection<int, maison>
     */
    public function getMaison(): Collection
    {
        return $this->maison;
    }

    public function addMaison(maison $maison): static
    {
        if (!$this->maison->contains($maison)) {
            $this->maison->add($maison);
            $maison->setEtudiant($this);
        }

        return $this;
    }

    public function removeMaison(maison $maison): static
    {
        if ($this->maison->removeElement($maison)) {
            // set the owning side to null (unless already changed)
            if ($maison->getEtudiant() === $this) {
                $maison->setEtudiant(null);
            }
        }

        return $this;
    }
}
