<?php

namespace Morannon\SMS;

/**
 * Base SMS Message class implementation.
 */
class BaseSMS implements SMSInterface
{
    /**
     * @var string
     */
    protected $messageId;

    /**
     * Sender name.
     *
     * @var string
     */
    private $from;

    /**
     * Recipient number.
     *
     * @var string
     */
    private $to;

    /**
     * The text to be send.
     *
     * @var string
     */
    private $text;

    /**
     * Constructor for new SMS Message.
     *
     * @param string $from
     * @param string $text
     * @param string $to
     */
    public function __construct($from, $text, $to)
    {
        $this->from = $from;
        $this->text = $text;
        $this->to = $to;
    }

    /**
     * {@inheritdoc}
    */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * {@inheritdoc}
    */
    public function setFrom($from)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * {@inheritdoc}
    */
    public function getText()
    {
        return $this->text;
    }

    /**
     * {@inheritdoc}
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * {@inheritdoc}
    */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * {@inheritdoc}
     */
    public function setTo($to)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * {@inheritdoc}
     */
    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;

        return $this;
    }
}
 