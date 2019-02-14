<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookingRepository")
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
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motive;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="Veuillez renseigner votre profession")
     */
    private $job;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $smoker;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $medical_past;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $sports;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $medication;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $allergies;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $sleep_schedule;

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

    public function getAllergies(): ?string
    {
        return $this->allergies;
    }

    public function setAllergies(?string $allergies): self
    {
        $this->allergies = $allergies;

        return $this;
    }

    public function getSleepSchedule(): ?string
    {
        return $this->sleep_schedule;
    }

    public function setSleepSchedule(string $sleep_schedule): self
    {
        $this->sleep_schedule = $sleep_schedule;

        return $this;
    }
}
