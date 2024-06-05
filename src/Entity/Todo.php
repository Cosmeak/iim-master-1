<?php

namespace App\Entity;

use App\Repository\TodoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TodoRepository::class)]
class Todo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'todos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user_id = null;

    #[ORM\ManyToOne(inversedBy: 'todos')]
    private ?Event $event_id = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\ManyToMany(targetEntity: self::class, inversedBy: 'todos')]
    private Collection $recursive_on;

    /**
     * @var Collection<int, self>
     */
    #[ORM\ManyToMany(targetEntity: self::class, mappedBy: 'recursive_on')]
    private Collection $todos;

    /**
     * @var Collection<int, File>
     */
    #[ORM\ManyToMany(targetEntity: File::class, inversedBy: 'todos')]
    private Collection $file_id;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $content = null;

    #[ORM\Column(length: 255)]
    private ?string $priority = null;

    #[ORM\Column]
    private ?bool $is_done = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    public function __construct()
    {
        $this->recursive_on = new ArrayCollection();
        $this->todos = new ArrayCollection();
        $this->file_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getEventId(): ?Event
    {
        return $this->event_id;
    }

    public function setEventId(?Event $event_id): static
    {
        $this->event_id = $event_id;

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
    public function getTodos(): Collection
    {
        return $this->todos;
    }

    public function addTodo(self $todo): static
    {
        if (!$this->todos->contains($todo)) {
            $this->todos->add($todo);
            $todo->addRecursiveOn($this);
        }

        return $this;
    }

    public function removeTodo(self $todo): static
    {
        if ($this->todos->removeElement($todo)) {
            $todo->removeRecursiveOn($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, File>
     */
    public function getFileId(): Collection
    {
        return $this->file_id;
    }

    public function addFileId(File $fileId): static
    {
        if (!$this->file_id->contains($fileId)) {
            $this->file_id->add($fileId);
        }

        return $this;
    }

    public function removeFileId(File $fileId): static
    {
        $this->file_id->removeElement($fileId);

        return $this;
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getPriority(): ?string
    {
        return $this->priority;
    }

    public function setPriority(string $priority): static
    {
        $this->priority = $priority;

        return $this;
    }

    public function isDone(): ?bool
    {
        return $this->is_done;
    }

    public function setDone(bool $is_done): static
    {
        $this->is_done = $is_done;

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
}
