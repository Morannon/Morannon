<?php

namespace Morannon\Base\Response;

use Morannon\Base\SMS\SMSInterface;

class BaseSentResponse implements SentResponseInterface
{
    /**
     * @var SMSInterface
     */
    protected $sms;

    /**
     * @var string|null
     */
    protected $messageId;

    /**
     * @var int
     */
    protected $sentMessagesCount;

    /**
     * @var string|null
     */
    protected $internalId;

    /**
     * @var mixed
     */
    protected $data;

    /**
     * @param SMSInterface $sms
     * @param int $sentMessagesCount
     * @param string|null $messageId
     * @param string|null $internalId
     */
    public function __construct(SMSInterface $sms, $sentMessagesCount = 1, $messageId = null, $internalId = null)
    {
        $this->sms = $sms;
        $this->sentMessagesCount = $sentMessagesCount;
        $this->messageId = $messageId;
        $this->internalId = $internalId;
    }

    /**
     * {@inheritdoc}
     */
    public function getInternalId()
    {
        return $this->internalId;
    }

    /**
     * {@inheritdoc}
     */
    public function setInternalId($internalId)
    {
        $this->internalId = $internalId;

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

    /**
     * {@inheritdoc}
     */
    public function getSentMessagesCount()
    {
        return $this->sentMessagesCount;
    }

    /**
     * {@inheritdoc}
     */
    public function setSentMessagesCount($sentMessagesCount)
    {
        if (!is_integer($sentMessagesCount)) {
            throw new \InvalidArgumentException('param sentMessagesCount has to be an integer');
        }

        $this->sentMessagesCount = $sentMessagesCount;

        return $this;
    }

   /**
     * {@inheritdoc}
     */
    public function getSms()
    {
        return $this->sms;
    }

   /**
     * {@inheritdoc}
     */
    public function setSms(SMSInterface $sms)
    {
        if (null === $sms) {
            throw new \InvalidArgumentException('param sms must not be null');
        }

        $this->sms = $sms;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * {@inheritdoc}
     */
    public function setData($data)
    {
        $this->data = $data;
    }
}
 