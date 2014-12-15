<?php

namespace Morannon\SMS;

interface SMSInterface
{
    /**
     * @return string
     */
    public function getMessageId();

    /**
     * @param string $messageId
     * @return $this
     */
    public function setMessageId($messageId);

    /**
     * Returns the text to send.
     *
     * @return string
     */
    public function getText();

    /**
     * Sets the text to be send.
     *
     * @param string
     * @return $this
     */
    public function setText($text);

    /**
     * Returns the sender name.
     *
     * @return string
     */
    public function getFrom();

    /**
     * Sets the sender name.
     *
     * @param string $from
     * @return $this
     */
    public function setFrom($from);

    /**
     * Returns the recipient number.
     *
     * @return string
     */
    public function getTo();

    /**
     * Sets the recipient number.
     *
     * @param string $to
     * @return $this
     */
    public function setTo($to);
}
 