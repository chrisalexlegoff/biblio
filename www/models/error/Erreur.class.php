<?php

class Erreur
{
    private string $message;

    public function __construct(string $message = "")
    {
        $this->message = $message;
    }

    /**
     * Get the value of message
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @param string $message
     *
     * @return self
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }
}
