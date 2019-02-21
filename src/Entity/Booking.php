<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookingRepository")
 * @UniqueEntity(fields="date", message="Cet horaire est déjà reservé")
 */
class Booking
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="bookings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="datetime", unique=true)
     * @Assert\NotBlank(message="La date du RDV n'est pas renseignée")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Veuillez selectionner un motif de consultation")
     */
    private $motive;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="Veuillez renseigner votre profession")
     */
    private $job;

    /**
     * @ORM\Column(type="string", length=3)
     * @Assert\NotBlank(message="Ce champs est obligatoire")
     */
    private $smoker;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="ce champs est obligatoire")
     */
    private $medical_past;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="ce champs est obligatoire")
     */
    private $sports;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="ce champs est obligatoire")
     */
    private $medication;

    /**
     *
<<<<<<< HEAD
     * @ORM\Column(type="string", length=50)
=======
     * @ORM\Column(type="string",length=50)
>>>>>>> master
     * @Assert\NotBlank(message="ce champs est obligatoire")
     */
    private $allergies;

    /**
     * @ORM\Column(type="integer", length=2)
     * @Assert\NotBlank(message="Ce champs est obligatoire")
     */
    private $sleep_schedule;

    /**
     * @ORM\Column(type="string", length=25)
     *
     */
    private $status = 'EN_ATTENTE';

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Consultation", mappedBy="booking", cascade={"persist", "remove"})
     */
    private $consultation;


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return mixed
     */
    public function getAllergies(): ?string
    {
        return $this->allergies;
    }

    /**
     * @param mixed $allergies
     * @return Booking
     */
    public function setAllergies(string $allergies):self
    {
        $this->allergies = $allergies;
        return $this;
    }


    /**
     * @param mixed $user
     * @return Booking
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }


    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getMotive(): ?string
    {
        return $this->motive;
    }

    public function setMotive(string $motive): self
    {
        $this->motive = $motive;

        return $this;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(string $job): self
    {
        $this->job = $job;

        return $this;
    }

    public function getSmoker(): ?string
    {
        return $this->smoker;
    }

    public function setSmoker(string $smoker): self
    {
        $this->smoker = $smoker;

        return $this;
    }

    public function getMedicalPast(): ?string
    {
        return $this->medical_past;
    }

    public function setMedicalPast(string $medical_past): self
    {
        $this->medical_past = $medical_past;

        return $this;
    }

    public function getSports(): ?string
    {
        return $this->sports;
    }

    public function setSports(string $sports): self
    {
        $this->sports = $sports;

        return $this;
    }

    public function getMedication(): ?string
    {
        return $this->medication;
    }

    public function setMedication(string $medication): self
    {
        $this->medication = $medication;

        return $this;
    }

    public function getSleepSchedule(): ?int
    {
        return $this->sleep_schedule;
    }

    public function setSleepSchedule(int $sleep_schedule): self
    {
        $this->sleep_schedule = $sleep_schedule;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     * @return Booking
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getConsultation(): ?Consultation
    {
        return $this->consultation;
    }

    public function setConsultation(Consultation $consultation): self
    {
        $this->consultation = $consultation;

        // set the owning side of the relation if necessary
        if ($this !== $consultation->getBooking()) {
            $consultation->setBooking($this);
        }

        return $this;
    }
}
