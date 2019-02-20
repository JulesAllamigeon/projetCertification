<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookingRepository")
 * @UniqueEntity(fields="date", message="Cet horaire est déjà reservé")
 */
class Booking implements FormTypeInterface
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
<<<<<<< HEAD
     *
     * @ORM\Column(type="string",length=50)
     * @Assert\NotBlank(message="ce champs est obligatoire")
     */
    private $allergies;

    /**
     * @ORM\Column(type="integer", length=2)
     * @Assert\NotBlank(message="Ce champs est obligatoire")
     */
    private $sleep_schedule;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Consultation", mappedBy="user", cascade={"persist", "remove"})
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
    public function getAllergies() : ?string
    {
        return $this->allergies;
    }

    /**
     * @param mixed $allergies
     * @return Booking
     */
    public function setAllergies(string $allergies)
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
     * Builds the form.
     *
     * This method is called for each type in the hierarchy starting from the
     * top most type. Type extensions can further modify the form.
     *
     * @see FormTypeExtensionInterface::buildForm()
     *
     * @param FormBuilderInterface $builder The form builder
     * @param array $options The options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // TODO: Implement buildForm() method.
    }

    /**
     * Builds the form view.
     *
     * This method is called for each type in the hierarchy starting from the
     * top most type. Type extensions can further modify the view.
     *
     * A view of a form is built before the views of the child forms are built.
     * This means that you cannot access child views in this method. If you need
     * to do so, move your logic to {@link finishView()} instead.
     *
     * @see FormTypeExtensionInterface::buildView()
     *
     * @param FormView $view The view
     * @param FormInterface $form The form
     * @param array $options The options
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        // TODO: Implement buildView() method.
    }

    /**
     * Finishes the form view.
     *
     * This method gets called for each type in the hierarchy starting from the
     * top most type. Type extensions can further modify the view.
     *
     * When this method is called, views of the form's children have already
     * been built and finished and can be accessed. You should only implement
     * such logic in this method that actually accesses child views. For everything
     * else you are recommended to implement {@link buildView()} instead.
     *
     * @see FormTypeExtensionInterface::finishView()
     *
     * @param FormView $view The view
     * @param FormInterface $form The form
     * @param array $options The options
     */
    public function finishView(FormView $view, FormInterface $form, array $options)
    {
        // TODO: Implement finishView() method.
    }

    /**
     * Configures the options for this type.
     *
     * @param OptionsResolver $resolver The resolver for the options
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        // TODO: Implement configureOptions() method.
    }

    /**
     * Returns the prefix of the template block name for this type.
     *
     * The block prefix defaults to the underscored short class name with
     * the "Type" suffix removed (e.g. "UserProfileType" => "user_profile").
     *
     * @return string The prefix of the template block name
     */
    public function getBlockPrefix()
    {
        // TODO: Implement getBlockPrefix() method.
    }

    /**
     * Returns the name of the parent type.
     *
     * @return string|null The name of the parent type if any, null otherwise
     */
    public function getParent()
    {
        // TODO: Implement getParent() method.
    }

    public function getConsultation(): ?Consultation
    {
        return $this->consultation;
    }

    public function setConsultation(Consultation $consultation): self
    {
        $this->consultation = $consultation;

        // set the owning side of the relation if necessary
        if ($this !== $consultation->getUser()) {
            $consultation->setUser($this);
        }

        return $this;
    }
}
