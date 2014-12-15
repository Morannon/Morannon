<?php

namespace Morannon\Response;

use Morannon\SMS\SMSInterface;

interface SentResponseInterface
{
    /**
     * Gets the SMS.
     *
     * @return SMSInterface
     */
    public function getSMS();

    /**
     * Sets the SMS.
     *
     * @param SMSInterface $sms
     * @return $this
     */
    public function setSMS(SMSInterface $sms);

    /**
     * Gets the count, how many messages have been sent.
     *
     * @return int
     */
    public function getSentMessagesCount();

    /**
     * Sets the count, how many messages have been sent.
     *
     * @param int $count
     * @return $this
     */
    public function setSentMessagesCount($count);

    /**
     * Returns the internal ID of the message.
     *
     * @return string
     */
    public function getInternalId();

    /**
     * Sets the internal ID of the message.
     *
     * @param string $internalId
     * @return $this
     */
    public function setInternalId($internalId);

    /**
     * Sets the original response data.
     *
     * @param mixed $data
     * @return $this
     */
    public function setData($data);

    /**
     * Gets the original response data.
     *
     * @return mixed
     */
    public function getData();
}
 