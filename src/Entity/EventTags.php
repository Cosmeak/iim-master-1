<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\EventTagsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventTagsRepository::class)]
#[ApiResource]
class EventTags
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, event>
     */
    #[ORM\ManyToMany(targetEntity: event::class, inversedBy: 'eventTags')]
    private Collection $event_id;

    /**
     * @var Collection<int, tag>
     */
    #[ORM\ManyToMany(targetEntity: tag::class, inversedBy: 'eventTags')]
    private Collection $tag_id;

    public function __construct()
    {
        $this->event_id = new ArrayCollection();
        $this->tag_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, event>
     */
    public function getEventId(): Collection
    {
        return $this->event_id;
    }

    public function addEventId(event $eventId): static
    {
        if (!$this->event_id->contains($eventId)) {
            $this->event_id->add($eventId);
        }

        return $this;
    }

    public function removeEventId(event $eventId): static
    {
        $this->event_id->removeElement($eventId);

        return $this;
    }

    /**
     * @return Collection<int, tag>
     */
    public function getTagId(): Collection
    {
        return $this->tag_id;
    }

    public function addTagId(tag $tagId): static
    {
        if (!$this->tag_id->contains($tagId)) {
            $this->tag_id->add($tagId);
        }

        return $this;
    }

    public function removeTagId(tag $tagId): static
    {
        $this->tag_id->removeElement($tagId);

        return $this;
    }
}
