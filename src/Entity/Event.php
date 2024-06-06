<?php

namespace App\Entity;

use App\Repository\EventRepository;
use CrEOF\Spatial\PHP\Types\Geography\Point;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $url = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $start_date = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $start_time = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $end_date = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $end_time = null;

    #[ORM\Column]
    private ?bool $is_full_day = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\ManyToMany(targetEntity: self::class, inversedBy: 'events')]
    private Collection $recursive_on;

    /**
     * @var Collection<int, self>
     */
    #[ORM\ManyToMany(targetEntity: self::class, mappedBy: 'recursive_on')]
    private Collection $events;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    /**
     * @var Collection<int, Calendar>
     */
    #[ORM\ManyToMany(targetEntity: Calendar::class, inversedBy: 'events')]
    private Collection $calendar_id;

    /**
     * @var Collection<int, File>
     */
    #[ORM\OneToMany(targetEntity: File::class, mappedBy: 'event_id')]
    private Collection $files;

    /**
     * @var Collection<int, Todo>
     */
    #[ORM\OneToMany(targetEntity: Todo::class, mappedBy: 'event_id')]
    private Collection $todos;

    #[ORM\Column(type: 'point', nullable: true)]
    private ?Point $localisation = null;

    /**
     * @var Collection<int, EventTags>
     */
    #[ORM\ManyToMany(targetEntity: EventTags::class, mappedBy: 'event_id')]
    private Collection $eventTags;

    public function __construct()
    {
        $this->recursive_on = new ArrayCollection();
        $this->events = new ArrayCollection();
        $this->calendar_id = new ArrayCollection();
        $this->files = new ArrayCollection();
        $this->todos = new ArrayCollection();
        $this->eventTags = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(?\DateTimeInterface $start_date): static
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getStartTime(): ?\DateTimeInterface
    {
        return $this->start_time;
    }

    public function setStartTime(?\DateTimeInterface $start_time): static
    {
        $this->start_time = $start_time;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(?\DateTimeInterface $end_date): static
    {
        $this->end_date = $end_date;

        return $this;
    }

    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->end_time;
    }

    public function setEndTime(?\DateTimeInterface $end_time): static
    {
        $this->end_time = $end_time;

        return $this;
    }

    public function isFullDay(): ?bool
    {
        return $this->is_full_day;
    }

    public function setFullDay(bool $is_full_day): static
    {
        $this->is_full_day = $is_full_day;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getRecursiveOn(): Collection
    {
        return $this->recursive_on;
    }

    public function addRecursiveOn(self $recursiveOn): static
    {
        if (!$this->recursive_on->contains($recursiveOn)) {
            $this->recursive_on->add($recursiveOn);
        }

        return $this;
    }

    public function removeRecursiveOn(self $recursiveOn): static
    {
        $this->recursive_on->removeElement($recursiveOn);

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(self $event): static
    {
        if (!$this->events->contains($event)) {
            $this->events->add($event);
            $event->addRecursiveOn($this);
        }

        return $this;
    }

    public function removeEvent(self $event): static
    {
        if ($this->events->removeElement($event)) {
            $event->removeRecursiveOn($this);
        }

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return Collection<int, Calendar>
     */
    public function getCalendarId(): Collection
    {
        return $this->calendar_id;
    }

    public function addCalendarId(Calendar $calendarId): static
    {
        if (!$this->calendar_id->contains($calendarId)) {
            $this->calendar_id->add($calendarId);
        }

        return $this;
    }

    public function removeCalendarId(Calendar $calendarId): static
    {
        $this->calendar_id->removeElement($calendarId);

        return $this;
    }

    /**
     * @return Collection<int, File>
     */
    public function getFiles(): Collection
    {
        return $this->files;
    }

    public function addFile(File $file): static
    {
        if (!$this->files->contains($file)) {
            $this->files->add($file);
            $file->setEventId($this);
        }

        return $this;
    }

    public function removeFile(File $file): static
    {
        if ($this->files->removeElement($file)) {
            // set the owning side to null (unless already changed)
            if ($file->getEventId() === $this) {
                $file->setEventId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Todo>
     */
    public function getTodos(): Collection
    {
        return $this->todos;
    }

    public function addTodo(Todo $todo): static
    {
        if (!$this->todos->contains($todo)) {
            $this->todos->add($todo);
            $todo->setEventId($this);
        }

        return $this;
    }

    public function removeTodo(Todo $todo): static
    {
        if ($this->todos->removeElement($todo)) {
            // set the owning side to null (unless already changed)
            if ($todo->getEventId() === $this) {
                $todo->setEventId(null);
            }
        }

        return $this;
    }

    public function getLocalisation(): Point
    {
        return $this->localisation;
    }

    public function setLocalisation(Point $localisation): self
    {
        $this->localisation = $localisation;

    /**
     * @return Collection<int, EventTags>
     */
    public function getEventTags(): Collection
    {
        return $this->eventTags;
    }

    public function addEventTag(EventTags $eventTag): static
    {
        if (!$this->eventTags->contains($eventTag)) {
            $this->eventTags->add($eventTag);
            $eventTag->addEventId($this);
        }

        return $this;
    }

    public function removeEventTag(EventTags $eventTag): static
    {
        if ($this->eventTags->removeElement($eventTag)) {
            $eventTag->removeEventId($this);
        }

        return $this;
    }
}
