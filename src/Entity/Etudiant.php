<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtudiantRepository::class)]
#[ORM\Table(name: "ETUDIANTS")]
class Etudiant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $numeroInscription;

    #[ORM\Column(type: 'string', length: 25)]
    private $nom;

    #[ORM\Column(type: 'string', length: 50)]
    private $prenoms;

    #[ORM\Column(type: 'string', length: 50)]
    private $adresse;

    #[ORM\Column(type: 'string', length: 10)]
    private $sexe;

    #[ORM\ManyToOne(targetEntity: Niveau::class, inversedBy: 'etudiants')]
    #[ORM\JoinColumn(nullable: false)]
    private $niveau;

    #[ORM\Column(type: 'date')]
    private $annee;

    #[ORM\OneToMany(mappedBy: 'etudiant', targetEntity: Note::class)]
    private $notes;

    public function __construct()
    {
        $this->notes = new ArrayCollection();
    }

    public function getNumeroInscription(): ?int
    {
        return $this->numeroInscription;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenoms(): ?string
    {
        return $this->prenoms;
    }

    public function setPrenom(string $prenoms): self
    {
        $this->prenoms = $prenoms;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection<int, Note>
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    public function addNote(Note $note): self
    {
        if (!$this->notes->contains($note)) {
            $this->notes[] = $note;
            $note->setEtudiant($this);
        }

        return $this;
    }

    public function removeNote(Note $note): self
    {
        if ($this->notes->removeElement($note)) {
            // set the owning side to null (unless already changed)
            if ($note->getEtudiant() === $this) {
                $note->setEtudiant(null);
            }
        }

        return $this;
    }

    public function getNiveau(): ?Niveau
    {
        return $this->niveau;
    }

    public function setNiveau(?Niveau $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getAnnee(): ?\DateTimeInterface
    {
        return $this->annee;
    }

    public function setAnnee(\DateTimeInterface $annee): self
    {
        $this->annee = $annee;

        return $this;
    }
}
